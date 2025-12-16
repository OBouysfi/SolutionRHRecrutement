@extends('layouts.master')

@section('title', 'Test Presonnalité')

@section('css_header')
    <style>
        .dataTables_paginate {
            display: none !important;
        }
    </style>
@endsection

@section('content')

    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __('generated.Test personnalité') }}</h5>
                </div>

                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __('generated.contact') }}">
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
                    data-bs-placement="top" title="{{ __('generated.Chatbot') }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('generated.Confort utilisateur') }}" style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __('generated.Modèles prédictifs') }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body bg-gradient-theme-light">
                            <div class="row">
                                <div class="col-6" style="padding-left: 22px">
                                    <h5 class="pt-2 ">{{ __('generated.Modèles prédictifs') }}</h5>
                                </div>
                                @can('modele-predictif-create')
                                    <div class="col-auto ms-auto translated_text" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="{{ __('generated.Créer un modèle prédictif') }}"
                                        style="margin-top: 5px;">
                                        <a href="{{ route('personalityTest.predictiveModel.create') }}" class="btn btn-theme"
                                            target="_blank"><span>{{ __('generated.Créer un modèle prédictif') }}</span></a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('modele-predictif-listing')
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table " data-show-toggle="true"
                                                            id="predictiveModelsTable">
                                                            <thead style="font-size: 14px;border-top: 1px solid #e9e9e9;">
                                                                <tr style="vertical-align: middle;">

                                                                    <th>{{ __('generated.Intitule') }}</th>
                                                                    <th>{{ __('generated.Statut') }}</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody style="font-size: 13px">

                                                            </tbody>
                                                        </table>

                                                        <div class="row align-items-center mx-0 mb-3">
                                                            <div class="col-6"></div>
                                                            <div class="col-6 footable-paging-external footable-paging-right mt-3"
                                                                id="predictiveModels-footable-pagination">
                                                                <div class="footable-pagination-wrapper">
                                                                    <ul class="pagination"></ul>
                                                                    <div class="divider"></div>
                                                                    <span class="label label-default">1
                                                                        <span>{{ __('generated.sur') }}</span> 1</span>
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
            @endcan
        </div>

    </main>

@endsection


@section('js_footer')

    <script>
        // Detect current locale (Laravel usually sets this in a meta tag or JS variable)
        const locale = document.documentElement.lang || 'fr'; // fallback to 'fr'

        // Map locale to DataTables language file
        const dataTablesLangUrl = {
            fr: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
            en: "//cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
            es: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
            zh: "//cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
            pt: "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
            ar: "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json"
        } [locale] || "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";


        var ApiListingPredictiveModels = "{{ route('api.personalityTest.predictiveModel.listing') }}";

        $(document).ready(function() {
            let predictiveModelsDataTable;
            getData();



            function getData() {
                predictiveModelsDataTable = $('#predictiveModelsTable').DataTable({
                    ajax: {
                        url: ApiListingPredictiveModels,
                        data: function(d) {
                            d.filters = {
                                // search: $('#customSearchBox').val(),
                                // department_id: $('.filter-by-department').val(),
                                // name: $('.filter-by-service-name').val()
                            };
                        },
                        dataSrc: function(json) {
                            return json.data;
                        },
                    },
                    columns: [{
                            data: 'label'
                        },
                        {
                            data: 'status'
                        },
                    ],

                    dom: '<"d-none"B>frtip',
                    autoWidth: true,
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    lengthChange: false,
                    searching: false,
                    ordering: false,

                    language: {
                        url: dataTablesLangUrl,
                        info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                    },

                    drawCallback: function(settings) {
                        updateCustomPaginationCandidates(settings);
                    },
                });
            }


            function updateCustomPaginationCandidates(settings) {
                const pageInfo = settings.json;
                if (!pageInfo) return; // Safety check
                const recordsTotal = pageInfo.recordsTotal;
                const pageLength = settings._iDisplayLength;
                const totalPages = Math.ceil(recordsTotal / pageLength);
                const currentPage = Math.floor(settings._iDisplayStart / pageLength) + 1; // 1-based index

                const paginationWrapper = $('#predictiveModels-footable-pagination .pagination');
                paginationWrapper.empty(); // Clear old pagination

                // First & Prev buttons
                paginationWrapper.append(`
                    <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="first">
                        <a class="footable-page-link" href="#">«</a>
                    </li>
                    <li class="footable-page-nav ${currentPage === 1 ? 'disabled' : ''}" data-page="prev">
                        <a class="footable-page-link" href="#">‹</a>
                    </li>
                `);

                // Page Numbers
                let startPage = Math.max(1, currentPage - 4);
                let endPage = Math.min(totalPages, startPage + 9);

                if (endPage - startPage < 9) {
                    startPage = Math.max(1, endPage - 9);
                }

                for (let i = startPage; i <= endPage; i++) {
                    paginationWrapper.append(`
                        <li class="footable-page visible ${i === currentPage ? 'active' : ''}" data-page="${i}">
                            <a class="footable-page-link" href="#">${i}</a>
                        </li>
                    `);
                }

                // Next & Last buttons
                paginationWrapper.append(`
                    <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="next">
                        <a class="footable-page-link" href="#">›</a>
                    </li>
                    <li class="footable-page-nav ${currentPage === totalPages ? 'disabled' : ''}" data-page="last">
                        <a class="footable-page-link" href="#">»</a>
                    </li>
                `);

                // Update label
                $('#predictiveModels-footable-pagination .label').text(`${currentPage} sur ${totalPages}`);

                // Rebind pagination events
                addPaginationEventListenersPredictiveModels();
            }

            function addPaginationEventListenersPredictiveModels() {
                // Pagination buttons (first, prev, next, last)
                $('#predictiveModels-footable-pagination .footable-page-nav').off('click').on('click', function(e) {
                    e.preventDefault();
                    if ($(this).hasClass('disabled')) return;

                    const action = $(this).data('page');
                    if (action === 'first') {
                        predictiveModelsDataTable.page('first').draw('page'); // Trigger draw for first page
                    }
                    if (action === 'prev') {
                        predictiveModelsDataTable.page('previous').draw(
                        'page'); // Trigger draw for previous page
                    }
                    if (action === 'next') {
                        predictiveModelsDataTable.page('next').draw('page'); // Trigger draw for next page
                    }
                    if (action === 'last') {
                        predictiveModelsDataTable.page('last').draw('page'); // Trigger draw for last page
                    }
                });

                // Page number links
                $('#predictiveModels-footable-pagination .footable-page').off('click').on('click', function(e) {
                    e.preventDefault();
                    const page = $(this).data('page') - 1; // 0-based index
                    predictiveModelsDataTable.page(page).draw('page'); // Trigger draw for specific page
                });
            }
        });
    </script>

@endsection
