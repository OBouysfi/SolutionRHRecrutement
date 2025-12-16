@extends('layouts.master')

@section('title', 'Test Presonnalité')

@section('css_header')
    <style>
        .modal-backdrop {
            display: none !important;
        }

        /* Target the entire DataTable table */
        #candidates-table {
            border-top: 1px solid #e9e9e9;  /* Add gray border on the top */
            border-bottom: 1px solid #e9e9e9;  /* Add gray border at the bottom */
        }

        /* Target table header */
        #candidates-table thead {
            border-top: 1px solid #e9e9e9;  /* Add border to the top of the table header */
        }

        /* Target table cells to add border */
        #candidates-table th, #candidates-table td {
            border-top: 1px solid #e9e9e9;  /* Add a border on top of each table cell */
            border-bottom: 1px solid #e9e9e9;  /* Add a border at the bottom of each table cell */
        }

        /* Optionally, you can add some spacing between table cells */
        #candidates-table th, #candidates-table td {
            padding: 10px;
        }
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
                    <h5 class="mb-0 ">{{ __("generated.Test personnalité") }}</h5>
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
                 <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Gestion des contacts") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="tab-content" id="nav-navtabscard139">
                <div class="tab-pane fade show active" id="tab119" role="tabpanel" aria-labelledby="tab119-tab">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body bg-gradient-theme-light">
                                    <div class="row">
                                        <div class="col-6" style="padding-left: 22px">
                                            <h5 class="mt-2 ">{{ __("generated.Contacts") }}</h5>
                                        </div>
                                        @can('contact-test-personnelle-create')
                                            <div class="col-auto ms-auto translated_text" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="{{ __("generated.Inviter des contacts") }}"
                                                style="margin-top: 5px;">

                                                <button class="btn btn-theme " type="button"
                                                    data-bs-toggle="modal" data-bs-target="#addCondidates">{{ __("generated.Inviter des contacts") }}</button>

                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('contact-test-personnelle-listing')
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 table-responsive">
                                                                <table class="table " id="candidates-table" data-show-toggle="true" style="width: 100%;">
                                                                    <thead
                                                                        style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                        <tr style="vertical-align: middle;">
                                                                            <th style="font-weight: 600;width: 134px;">#</th>
                                                                            <th style="font-weight: 600;width: 134px;" >{{ __("generated.Matricule") }}</th>
                                                                            <th style="font-weight: 600;width: 134px;" >{{ __("generated.Prénom") }}</th>
                                                                            <th style="font-weight: 600;width: 147px;" >{{ __("generated.Nom") }}</th>
                                                                            <th style="font-weight: 600;width: 114px;" >{{ __("generated.Adresse mail") }}</th>
                                                                            <th style="font-weight: 600;width: 114px;" >{{ __("generated.Invité le") }}</th>
                                                                            <th style="font-weight: 600;width: 114px;" >{{ __("generated.Action") }}</th>

                                                                        </tr>

                                                                    </thead>

                                                                    <tbody style="font-size: 13px">
                                                                    </tbody>

                                                                </table>

                                                                <div class="row align-items-center mx-0 mb-3">
                                                                    <div class="col-6"></div>
                                                                    <div class="col-6 footable-paging-external footable-paging-right mt-3"
                                                                        id="candidates-footable-pagination">
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
                        </div>
                    @endcan
                </div>

            </div>

        </div>

        @include('personalityTest.candidate.inc.addCondidates', ['localCondidates' => $localCondidates])

    </main>

@endsection


@section('js_footer')

    @include('profile.inc.translation')
    
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
        }[locale] || "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";


        var ApiInviteCandidate = "{{ route('api.personalityTest.candidats.invite') }}";
        var ApiListingCandidate = "{{ route('api.personalityTest.candidats.listing') }}";


        
        $(document).ready(function() {
            let candidatesDataTable;
            getData();



            function getData() {
                candidatesDataTable = $('#candidates-table').DataTable({
                    ajax: {
                        url: ApiListingCandidate,
                        data: function (d) {
                            d.filters = {
                                search: $('#customSearchBox').val(),
                                department_id: $('.filter-by-department').val(),
                                name: $('.filter-by-service-name').val()
                            };
                        },
                        dataSrc: function (json) {
                            return json.data;
                        },
                    },
                    columns: [
                        { data: 'image' },
                        { data: 'id' },
                        { data: 'first_name' },
                        { data: 'last_name' },
                        { data: 'email' },
                        { data: 'invited_at' },
                        { data: 'actions' },
                    ],

                    dom: '<"d-none"B>frtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    lengthChange: false,
                    searching: false,
                    ordering: false,

                    language: {
                        url: dataTablesLangUrl,
                        info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                        emptyTable: "Aucune donnée disponible dans le tableau",
                        infoEmpty: "Affichage de 0 à 0 sur 0 entrée"
                    },
                    drawCallback: function (settings) {
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

                const paginationWrapper = $('#candidates-footable-pagination .pagination');
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
                $('#candidates-footable-pagination .label').text(`${currentPage} sur ${totalPages}`);

                // Rebind pagination events
                addPaginationEventListenersCandidates();
            }

            function addPaginationEventListenersCandidates() {
                // Pagination buttons (first, prev, next, last)
                $('#candidates-footable-pagination .footable-page-nav').off('click').on('click', function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('disabled')) return;

                    const action = $(this).data('page');
                    if (action === 'first') {
                        candidatesDataTable.page('first').draw('page'); // Trigger draw for first page
                    }
                    if (action === 'prev') {
                        candidatesDataTable.page('previous').draw('page'); // Trigger draw for previous page
                    }
                    if (action === 'next') {
                        candidatesDataTable.page('next').draw('page'); // Trigger draw for next page
                    }
                    if (action === 'last') {
                        candidatesDataTable.page('last').draw('page'); // Trigger draw for last page
                    }
                });

                // Page number links
                $('#candidates-footable-pagination .footable-page').off('click').on('click', function (e) {
                    e.preventDefault();
                    const page = $(this).data('page') - 1; // 0-based index
                    candidatesDataTable.page(page).draw('page'); // Trigger draw for specific page
                });
            }

            // on click of button invite-btn
            $(document).on('click', '.invite-btn', function() {
                console.log("collaborators");

                // hide invite-btn and show loading-btn
                $(this).hide();
                $('.loading-btn').show();

                var collaborators = $('#collaborators').val();
                console.log(collaborators);

                $.ajax({
                    url: ApiInviteCandidate,
                    type: 'POST',
                    data: {
                        'collaborators': collaborators,
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: window.translations.invitation_sent,
                            text: response.message,
                        }).then((result) => {
                            candidatesDataTable.ajax.reload();
                        });

                        // show invite-btn and hide loading-btn
                        $('.invite-btn').show();
                        $('.loading-btn').hide();
                    },
                    error: function(error) {

                        Swal.fire({
                            icon: 'warning',
                            title: window.translations.invitation_error,
                            text: error.message,
                        });

                        // close modal addCondidates
                        $('#addCondidates').modal('hide');

                        // show invite-btn and hide loading-btn
                        $('.invite-btn').show();
                        $('.loading-btn').hide();

                    }

                });
            })

        });
    </script>

@endsection
