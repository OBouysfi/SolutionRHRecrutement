@extends('client_portal.layouts.portal')

@section('title', __('generated.HumanJobs - Offres d\'emploi'))

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
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
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
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div id="country-selector" class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label><span >{{ __("generated.Pays") }}</span></label>
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

                                                <!-- Cities -->
                                                <div class="col-12 col-md-6 col-lg-3">
                                                    <div id="city-selector" class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label><span >{{ __("generated.Ville") }}</span></label>
                                                        <select class="chosenoptgroup w-100" id="filter-ville">
                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                            @if (isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id ?? '' }}"
                                                                            data-country="{{ $city->country?->id ?? '' }}">
                                                                        {{ __($city->name ?? '_' )}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Secteur d’activité -->
                                                <div class="col-12 col-md-6 col-lg-3">
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

                                                <!-- Missions en cours -->
                                                <div class="col-12 col-md-6 col-lg-3">
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

            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        {{-- <div class="card-header bg-gradient-theme-light">
                                            <div class="row align-items-center">
                                                <h6 class="fw-medium mb-0 translated_text">Offres d'emploi</h5>
                                            </div>
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
                                                        {{-- @can('mission-preview') --}}
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-light-theme translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Aperçu") }}">
                                                                <a href="{{ route('client-portal.jobOffer.preview') }}" target="_blank">
                                                                    <i class="bi bi-binoculars avatar icon-bw rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        {{-- @endcan --}}

                                                        <!-- Icône Partager -->
                                                        {{-- @can('mission-share') --}}
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
                                                        {{-- @endcan --}}
                                                        <!-- Icône Télécharger -->
                                                        {{-- @can('mission-download') --}}
                                                            <div class="col-auto">
                                                                <div class="avatar avatar-50 rounded bg-light-theme translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="{{ __("generated.Télécharger") }}" id="downloadExcel">
                                                                    <a href="#" type="button">
                                                                        <i class="bi bi-cloud-download avatar icon-bw rounded h5"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        {{-- @endcan --}}

                                                        <!-- Icône Imprimer -->
                                                        {{-- @can('mission-print') --}}
                                                            <div class="col-auto" data-bs-toggle="tooltip translated_text"
                                                                data-bs-placement="top" title="Imprimer">
                                                                <div class="avatar avatar-50 rounded bg-light-theme text-bw"
                                                                    target="_blank" onclick="printSection()">
                                                                    <i class="bi bi-printer avatar icon-bw rounded h5"></i>
                                                                </div>
                                                            </div>
                                                        {{-- @endcan --}}

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
                                                <table class="table offres-table" data-show-toggle="true" id="missionTable" style="width: 100%;">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                                        <tr style="vertical-align: middle;">
                                                            <th rowspan="2" >#</th>
                                                            <th rowspan="2" >{{ __("generated.N° client") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Client") }}</th>
                                                            <th rowspan="2" >{{ __("generated.Intitulé du poste") }}</th>
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


                                            <div class="row align-items-center mx-0 mb-3">
                                                <div class=" footable-paging-external footable-paging-right mt-3"
                                                    id="footable-pagination">
                                                    <div class="footable-pagination-wrapper">
                                                        <ul class="pagination"></ul>
                                                        <div class="divider"></div>
                                                        <span class="label label-default">1 <span >{{ __("generated.sur") }}</span> 1</span>
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
        @include('client_portal.inc.print')
    </div>
@endsection


@section('js_footer')
    @include('client_portal.inc.share')

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="{{ asset('assets/js/jobOffer/listing.js') }}"></script> --}}
    <script>
        var jobOfferListingData = "{{ route('client-portail.jobOffer.listing.data') }}";
    </script>

    @vite(['resources/js/jobOffer/listing.js'])
    @vite(['resources/js/profile/dateFillter.js'])

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- star export excel --}}
    <script>
        var exportUrl = '{{ route('export_excel_client_portal_jobOffre') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            const translations = {
                fr: {
                    fileTypeTitle: 'Quel type de fichier souhaitez-vous ?',
                    confirmButton: 'Excel',
                    denyButton: 'CSV',
                    cancelButton: 'Annuler',
                },
                en: {
                    fileTypeTitle: 'What type of file do you want?',
                    confirmButton: 'Excel',
                    denyButton: 'CSV',
                    cancelButton: 'Cancel',
                },
                es: {
                    fileTypeTitle: '¿Qué tipo de archivo desea?',
                    confirmButton: 'Excel',
                    denyButton: 'CSV',
                    cancelButton: 'Cancelar',
                },
                pt: {
                    fileTypeTitle: 'Que tipo de arquivo você deseja?',
                    confirmButton: 'Excel',
                    denyButton: 'CSV',
                    cancelButton: 'Cancelar',
                },
                ar: {
                    fileTypeTitle: 'ما نوع الملف الذي تريده؟',
                    confirmButton: 'إكسل',
                    denyButton: 'CSV',
                    cancelButton: 'إلغاء',
                },
                zh: {
                    fileTypeTitle: '您想要什么类型的文件？',
                    confirmButton: 'Excel',
                    denyButton: 'CSV',
                    cancelButton: '取消',
                },
            };

            const locale = document.documentElement.lang || "fr";
            const t = translations[locale] || translations.fr;

            Swal.fire({
                title: t.fileTypeTitle,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: t.confirmButton,
                cancelButtonText: t.cancelButton,
                showDenyButton: true,
                denyButtonText: t.denyButton,
                focusCancel: true,

            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = exportUrl + '?type=excel';
                } else if (result.isDenied) {
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


    {{-- <script type="text/javascript">


    /**
     *  Fonction pour afficher le drapeau dans l'élément sélectionné
     */

        $(window).on('load', function () {
            $(".chosenoptgroup").chosen({
                width: "100%",
                disable_search_threshold: 10
            });

            // Fonction pour ajouter les drapeaux dans la liste déroulante
            function updateDropdownImages() {
                setTimeout(function () {
                    $('.chosen-results li').each(function () {
                        const $li = $(this);
                        const index = $li.data('option-array-index');
                        const $option = $('#filter-pays option').eq(index);
                        const imageSrc = $option.data('image');
                        const text = $option.text();

                        if (imageSrc && !$li.find('img').length) {
                            $li.html(`
                                <span style="display: inline-flex; align-items: center;">
                                    <img src="${imageSrc}" height="14" style="margin-right: 6px;" />
                                    <span>${text}</span>
                                </span>
                            `);
                        }
                    });
                }, 10);
            }

            $('#filter-pays').on('chosen:showing_dropdown', updateDropdownImages);

            function updateSelectedImage() {
                const selectedOption = $('#filter-pays option:selected');
                const imageSrc = selectedOption.data('image');
                const text = selectedOption.text();

                const chosenSingle = $('#filter-pays').next('.chosen-container').find('.chosen-single');
                chosenSingle.find('img').remove();
                chosenSingle.find('span').css('display', 'inline');
                if (imageSrc) {
                    chosenSingle.prepend(`<img src="${imageSrc}" height="14" style="margin-right: 6px;" />`);
                }
            }

            $('#filter-pays').on('change', updateSelectedImage);
            updateDropdownImages();
            updateSelectedImage();
        });


    </script> --}}

@endsection
