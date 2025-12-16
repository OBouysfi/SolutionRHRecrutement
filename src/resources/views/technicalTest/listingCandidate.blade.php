@extends('layouts.master')

@section('title', 'Test Technique')

@section('css_header')
    <style>
        .custom-avatar {
            background-color: #dde9f7 !important;
        }

        .dark-mode .custom-avatar {
            background-color: transparent !important;
        }

        .custom-icon {
            color: #0a63c9;
        }

        /* Optionnel : changer la couleur de l’icône en dark mode */
        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 9px !important;
        }

        table.dataTable thead td img {
            max-width: 26%;
        }
    </style>

@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Test technique") }}</h5>
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
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active  text-primary" aria-current="page">{{ __("generated.Créer un test") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 ">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body  bg-gradient-theme-light">
                                            <div class="row align-items-center justify-content-between">
                                                <div class="col-6" style="padding-left: 22px">
                                                    <h5 >{{ __("generated.Gestion des candidats") }}</h5>
                                                </div>
                                                <!-- <div class="col-auto ms-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Sélectionner candidats" style="margin-right: -15px;">
                                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                                        <a href="#" target="_blank"><i class="bi bi-pencil-square avatar   rounded h5"></i></a>
                                                                    </div>
                                                                </div> -->
                                                @can('test-technique-delete-candidats')
                                                    <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ __("generated.Supprimer candidats") }}">
                                                        <div class="avatar avatar-50 rounded bg-light-theme delete-select-candidate"
                                                            id="delete-selected">
                                                            <i class="bi bi-trash avatar   rounded h5"></i>
                                                        </div>
                                                    </div>
                                                @endcan
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
                <div style="width: 23%" class="col-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="row align-items-center">

                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme custom-avatar">
                                                        <i class="bi bi-play h5 custom-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Actions") }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" style="min-height: 126px;">
                                            <div class="row">
                                                <ul class="list-group list-group-flush bg-none">
                                                    @can('test-technique-create-candidats')
                                                        <li class="list-group-item text-secondary"
                                                            style="border-top: 1px solid #00000016;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <i class="bi bi-plus-square"
                                                                        style="color: #2473cf !important;"></i>
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    <a href="{{ route('technicalTest.create.candidate') }}"
                                                                        style="color: #6f7880"><span
                                                                            >{{ __("generated.Ajouter un candidat") }}</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endcan
                                                    <li class="list-group-item text-secondary"
                                                        style="border-bottom: 1px solid #00000016;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-people"
                                                                    style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0 ">{{ __("generated.Actions sur le groupe") }}</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="row align-items-center">

                                                <div class="col-auto">
                                                    <div class="avatar avatar-40 rounded bg-light-theme custom-avatar">
                                                        <i class="bi bi-funnel h5 custom-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Filtres") }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" style="min-height: 126px;">
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <div class="input-group ">
                                                        <span class="input-group-text text-theme"><i
                                                                class="bi bi-search"></i></span>
                                                        <input type="text" name="search"
                                                            class="form-control translated_text" placeholder="{{ __("generated.Search...") }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">

                                                <div class="col-12">

                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                            style="border-radius: 8px !important;  ">
                                                            <label><span >{{ __("generated.Groupe") }}</span> </label>
                                                            <select required name="filter-group" id="filter-group"
                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                @foreach ($groups as $key => $groupe)
                                                                    <option value="{{ __($groupe) }}">
                                                                        {{ __($groupe) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12">

                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded border poste-chosen select-search"
                                                            style="border-radius: 8px !important;  ">
                                                            <label><span >{{ __("generated.Statut") }}</span> </label>
                                                            <select required name="filter-status" id="filter-status"
                                                                class="chosenoptgroup w-100 select-search-chosen">
                                                                @foreach ($status as $key => $statut)
                                                                    <option value="{{ __($statut) }}">
                                                                        {{ __($statut) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-12">
                                                    <ul class="list-group list-group-flush bg-none">
                                                        <li class="list-group-item text-secondary">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="form-check form-switch"
                                                                        style="margin-top: 20px">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="rememeberme">
                                                                    </div>
                                                                </div>
                                                                <div class="col-9 ps-0">
                                                                    <p style="color: #6e777f;"><span
                                                                            >{{ __("generated.Afficher uniquement les candidats ayant des tests à passer") }}</span> </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- <li class="list-group-item text-secondary">
                                                                            <div class="row">
                                                                                <div class="col-auto">
                                                                                    <div class="form-check form-switch" style="margin-top: 20px">
                                                                                        <input class="form-check-input" type="checkbox" role="switch" id="rememeberme">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-9 ps-0">
                                                                                    <p style="color: #6e777f;">Afficher les candidats associés à des groupes archivés</p>
                                                                                </div>
                                                                            </div>
                                                                        </li> -->
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
                <div style="width: 77%" class="col-9">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table id="candidatesTable" class="table" style="width: 100%;">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th
                                                                    style="font-weight: 600;text-align: left;width: 100px;">
                                                                    #</th>
                                                                <th style="font-weight: 600;text-align: left;width: 142px;"
                                                                    >{{ __("generated.Image") }}</th>
                                                                <th style="font-weight: 600;text-align: left;width: 142px;"
                                                                    >{{ __("generated.Groupe") }}</th>
                                                                <th style="font-weight: 600;width: 134px;"
                                                                    >{{ __("generated.Prénom") }}</th>
                                                                <th style="font-weight: 600;width: 147px;"
                                                                    >{{ __("generated.Nom") }}</th>
                                                                <th style="font-weight: 600;width: 114px;"
                                                                    >{{ __("generated.Adresse mail") }}</th>
                                                                <th style="font-weight: 600;width: 71px;"
                                                                    >{{ __("generated.Action") }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px">

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
@endsection


@section('js_footer')
    <!--Datatable-->

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>


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

        var ApiCandidatesListingeData = "{{ route('api.candidates.listing.data') }}";
        var ApiCandidateDelete = "{{ route('api.candidate.destroy') }}";
    </script>

    @vite(['resources/js/candidate/listing.js'])

@endsection
