@extends('layouts.master')

@section('title', __('generated.Matching'))

@section('css_header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <style>
        @media (min-width: 1400px) {
        .container-xxl, .container-xl, 
        .container-lg, .container-md, 
        .container-sm, .container {
            max-width: 1625px;  }
        }
        .chosenoptgroup {
            background: var(--adminux-theme-bg);
            border: none;
            padding: 2px 9px;
        }

        .circle-progress {
            position: relative;
            width: 50px;
            height: 50px;
            margin: 0 auto;
        }

        .circle-progress .progressbar-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8em;
            color: inherit;
        }

        .btnScoreFilter:hover {
            background-color: #005dc7 !important;
            color: #fff !important;
            border-color: #005dc7 !important;
            transition: all 0.3s ease;
        }

        .btnScoreFilter {
            background-color: #005dc7 !important;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <div class="d-none" id="print-section">
            @include('matching.inc.print')
        </div>

        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Matching") }}</h5>
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
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
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
            <div class="row mt-3 mb-0">
                <div class="col-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row justify-content-center align-items-center">
                                                <!-- Titre CVthèque -->
                                                <div class="col-auto"> <!-- Utilisation de col-auto pour le titre -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 >{{ __("generated.Scoring") }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Icônes et sélecteur -->
                                                <div class="col-auto ms-md-auto">
                                                    <div class="row g-2 align-items-center">
                                                        <!-- Icône Aperçu -->
                                                        @can('profile-preview')
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Aperçu") }}">
                                                                    <a href="{{ route('matching.preview') }}" target="_blank">
                                                                        <i
                                                                            class="bi bi-binoculars avatar  icon-bw rounded h5"></i>
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
                                                                    <a href="#" type="button">
                                                                        <i
                                                                            class="bi bi-cloud-download avatar icon-bw  rounded h5"></i>
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
                                                                            class="bi bi-printer avatar icon-bw  rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <div class="col-auto">
                                                            <div class="select-avatar avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Nombre d'éléments par page") }}">
                                                                <select id="customLength"
                                                                    style="border: 0;background-color: transparent; width: 49px;color: var(--adminux-theme);">
                                                                    <option selected>10</option>
                                                                    <option>25</option>
                                                                    <option>50</option>
                                                                    <option>100</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="col col-4 col-md-2 d-none" style="cursor: pointer" id="ProfileReturnToPreview">
                                                            <div class="avatar avatar-50 rounded bg-light-theme show-detail d-flex align-items-center"
                                                                data-detail="0" title="Retour à l'aperçu">
                                                                <a><i class="bi bi-arrow-return-left"></i></a>
                                                            </div>
                                                        </div> --}}
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
        <!-- content -->
        <div class="container">

            <div class="tab-content py-1" id="myTabContent">
                <!-- personal info tab-->
                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card border-0 mb-0 mt-0 py-2">
                                                        <div class="card-body filter-block">
                                                            <div class="row gap-3">
                                                                <div class="col-12">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-radius: 8px !important;">
                                                                            <label class="translated_text">{{ __("generated.Client") }}</label>
                                                                            <select class="chosenoptgroup w-100"
                                                                                id="filter-client">
                                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                                @foreach ($clients as $client)
                                                                                    <option value="{{ $client->id }}">
                                                                                        {{ $client->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-radius: 8px !important;">
                                                                            <label class="translated_text">{{ __("generated.Offre d'emploi") }}</label>
                                                                            <select class="chosenoptgroup w-100"
                                                                                id="filter-job-offer">
                                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                                @foreach ($jobOffers as $jobOffer)
                                                                                    <option value="{{ $jobOffer->id }}"
                                                                                        data-client-id="{{ $jobOffer?->client_id }}">
                                                                                        {{ $jobOffer->title }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-radius: 8px !important;">
                                                                            <label class="translated_text">{{ __("generated.Statut de l'offre d'emploi") }}</label>
                                                                            <select class="chosenoptgroup w-100"
                                                                                id="filter-status-job-offer">
                                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                                @foreach ($status_jobOffres as $key => $status_jobOffre)
                                                                                    <option value="{{ $key }}" class="translated_text">{{ $status_jobOffre ?? ' - ' }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-radius: 8px !important;">
                                                                            <label class="translated_text">{{ __("generated.Poste") }}</label>
                                                                            <select class="chosenoptgroup w-100"
                                                                                id="filter-profession">
                                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                                @foreach ($professions as $profession)
                                                                                    <option value="{{ $profession->id }}">
                                                                                        {{ $profession->label ?? ' - ' }}
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
                        </div>
                        <div class="col-md-7">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card border-0 p-1">
                                                        <div class="card-body filter-block p-3">
                                                            <div class="rounded border poste-chosen p-4">
                                                                <label class="mb-2 text-bw" style="font-size: 12px;"><span
                                                                        >{{ __("generated.Score de matching") }}</span>
                                                                    (%)</label>

                                                                <div class="price-graph mb-2">
                                                                    <div class="bar-container" id="bars"></div>
                                                                </div>

                                                                <div class="range-slider mb-2">
                                                                    <div class="track"></div>
                                                                    <div class="range" id="range"></div>
                                                                    <input type="range" min="0" max="100"
                                                                        value="0" id="minSlider">
                                                                    <input type="range" min="0" max="100"
                                                                        value="100" id="maxSlider">
                                                                </div>

                                                                <div class="price-display">
                                                                    <div class="price-box" id="minPrice">%0</div>

                                                                    <div class="price-box" id="maxPrice">%100+</div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-end mt-4 ms-auto">
                                                                <button type="button"
                                                                    class="btn btn-theme   me-2 "
                                                                    id="applyFiltersBtn">{{ __("generated.Appliquer") }}</button>
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
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header bg-gradient-theme-light ">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <h5 >{{ __("generated.Matching") }}</h5>
                                                        </div>
                                                        <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                            <div class="input-group searchbar-full">
                                                                <span class="input-group-text text-theme">
                                                                    <i class="bi bi-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control form-control-sm" id="customSearchBoxMatching" placeholder="{{ __("generated.Search...") }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <!------------------------All Profils Table-------------------------->
                                                    <div class="tableall alltable" style="width: 100%; overflow-x: auto;margin:5px">
                                                        {{-- <div style="margin: 0 auto; display: table;"> --}}
                                                            <table class="table offres-table Intégrale " id="matchingTable"
                                                                data-show-toggle="true" style="width:100%; border-collapse:collapse">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr style="vertical-align: middle;">
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;">#
                                                                        </th>
                                                                        <th rowspan="2" style="font-weight: 600;"
                                                                            >{{ __("generated.Référence") }}</th>
                                                                        <th rowspan="2" style="font-weight: 600;"
                                                                            >{{ __("generated.Prénom") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 147px;"
                                                                            >{{ __("generated.Nom") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 147px;"
                                                                            >{{ __("generated.Diplôme") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 181px;"
                                                                            >{{ __("generated.Option") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 105px;"
                                                                            >{{ __("generated.Expérience") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 172px;"
                                                                            >{{ __("generated.Poste actuel") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 178px;"
                                                                            >{{ __("generated.Poste souhaité") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: center;width: 10px;">
                                                                        </th>
                                                                        <th colspan="2"
                                                                            style="font-weight: 600;text-align: center;"
                                                                            >{{ __("generated.Date") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: right;width: 71px;"
                                                                            >{{ __("generated.Score") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: right;width: 71px;"
                                                                            >{{ __("generated.Shortlist") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: right;width: 71px;"
                                                                            >{{ __("generated.Action") }}</th>
                                                                    </tr>
                                                                    <tr style="vertical-align: middle;">
                                                                        <th style="font-weight: 600;width: 100px;"
                                                                            >{{ __("generated.Dépôt CV") }}</th>
                                                                        <th style="font-weight: 600;"
                                                                            >{{ __("generated.Modification") }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="vertical-align: middle; font-size: 13px;">
                                                                </tbody>
                                                            </table>
                                                        {{-- </div> --}}

                                                        <div class="row align-items-center mx-0 mb-4">
                                                            <div class="col-5"></div>
                                                            <div class="col-7 footable-paging-external footable-paging-right"
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
                                                                            data-page="1">
                                                                            <a class="footable-page-link"
                                                                                href="#">1</a>
                                                                        </li>
                                                                        <li class="footable-page visible" data-page="2">
                                                                            <a class="footable-page-link"
                                                                                href="#">2</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="next">
                                                                            <a class="footable-page-link"
                                                                                href="#">›</a>
                                                                        </li>
                                                                        <li class="footable-page-nav" data-page="last">
                                                                            <a class="footable-page-link"
                                                                                href="#">»</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="divider"></div>
                                                                    <span class="label label-default">1 <span
                                                                            >{{ __("generated.sur") }}</span> 2</span>
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

    @include('translation')
@endsection


@section('js_footer')

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- JS Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').chosen({
                width: '100%',
                no_results_text: "Aucun résultat trouvé",
                placeholder_text_single: "Sélectionnez un choix",
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

    <script>
        var exportUrl = '{{ route('matching.export') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            Swal.fire({
                title: window.translations.type_fichier,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: window.translations.excel,
                cancelButtonText: window.translations.cancel,
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
        var matchingListingData = "{{ route('api.matching.data') }}";
        var addToShortlistUrl = "{{ route('add.to.shortlist') }}";
    </script>
    @vite(['resources/js/matching/listing.js'])
    <script>
        document.getElementById('applyFiltersBtn').addEventListener('click', function() {
            $('#modalFiltres').modal('hide');
            $('#matchingTable').DataTable().ajax.reload();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const barContainer = document.getElementById('bars');
            const minSlider = document.getElementById('minSlider');
            const maxSlider = document.getElementById('maxSlider');
            const range = document.getElementById('range');
            const minPriceDisplay = document.getElementById('minPrice');
            const maxPriceDisplay = document.getElementById('maxPrice');

            // Prix min et max pour l'échelle
            const minPriceValue = 0;
            const maxPriceValue = 100;

            // Générer des hauteurs aléatoires pour l'histogramme similaire à l'image
            const barHeights = [
                10, 5, 0, 15, 0, 25, 0, 10, 20, 15, 25, 20, 30, 35, 40, 50, 45, 60, 55,
                50, 45, 40, 40, 35, 30, 35, 30, 25, 20, 15, 10, 5, 10, 5, 0, 5, 10, 5, 0, 5
            ];

            const bars = [];

            // Créer les barres
            barHeights.forEach(height => {
                const bar = document.createElement('div');
                bar.className = 'bar';
                bar.style.height = height + 'px';
                barContainer.appendChild(bar);
                bars.push(bar);
            });

            // Fonction pour mettre à jour l'affichage
            function updateRange() {
                const minVal = parseInt(minSlider.value);
                const maxVal = parseInt(maxSlider.value);

                // Mettre à jour la position et la largeur de la plage colorée
                range.style.left = (minVal) + '%';
                range.style.width = (maxVal - minVal) + '%';

                // Calculer et afficher les prix
                const minPrice = Math.round(minVal / 100 * (maxPriceValue - minPriceValue) + minPriceValue);
                const maxPrice = Math.round(maxVal / 100 * (maxPriceValue - minPriceValue) + minPriceValue);

                minPriceDisplay.textContent = '%' + minPrice;
                maxPriceDisplay.textContent = maxPrice >= maxPriceValue ? '%' + maxPriceValue + '+' : '%' +
                    maxPrice;

                // Mise à jour des couleurs des barres
                bars.forEach((bar, index) => {
                    const barPosition = (index / (bars.length - 1)) * 100;
                    if (barPosition >= minVal && barPosition <= maxVal) {
                        bar.classList.remove('inactive');
                    } else {
                        bar.classList.add('inactive');
                    }
                });
            }

            // S'assurer que le curseur min ne dépasse pas le curseur max
            minSlider.addEventListener('input', function() {
                const minVal = parseInt(minSlider.value);
                const maxVal = parseInt(maxSlider.value);

                if (minVal > maxVal - 5) {
                    minSlider.value = maxVal - 5;
                }

                updateRange();
            });

            // S'assurer que le curseur max ne descend pas en dessous du curseur min
            maxSlider.addEventListener('input', function() {
                const minVal = parseInt(minSlider.value);
                const maxVal = parseInt(maxSlider.value);

                if (maxVal < minVal + 5) {
                    maxSlider.value = minVal + 5;
                }

                updateRange();
            });

            // Initialiser l'affichage
            updateRange();
        });
    </script>
@endsection
