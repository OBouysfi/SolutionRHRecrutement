@extends('layouts.master')

@section('title', 'Ajouter un évaluateur')

@section('css_header')
    <style>
        .squered-pill {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            text-align: center;
            line-height: 2px;
            background-color: rgba(38, 182, 234, .3);
            border: none;
            color: #005dc7;
            padding: 8px !important;
        }

        .squered-pill i {
            color: #005dc7;
            padding: 5px
        }

        .squered-pill:hover,
        .squered-pill:active,
        .squered-pill:focus {
            background-color: rgba(38, 182, 234, 1);
            outline: none;
            border: none;
        }


        .card .card-footer.footer-1 {
            background-color: #2e9c65ba;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x) * 0.5);
        }

        .card .card-footer.footer-2 {
            background-color: #b7131bad;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x) * 0.5);
        }

        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
            height: 312px !important;
        }

        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline p {
            text-align: justify;
        }

        .custom-color-icon i {
            color: #005dc7 !important;
        }

        .dropdown-menu .form-control,
        .dropdown-menu .form-select,
        .dropdown-menu .input-group-text,
        .dropdown-menu .chosen-choices,
        .dropdown-menu .chosen-single,
        .modal-dialog .form-control,
        .modal-dialog .form-select,
        .modal-dialog .input-group-text,
        .modal-dialog .chosen-choices,
        .modal-dialog .chosen-single,
        .card .form-control,
        .card .form-select,
        .card .input-group-text,
        .card .chosen-choices,
        .card .poste-chosen,
        .card .chosen-single {
             
        }

        .form-control,
        .form-select {
             
        }

        .btn-annuler:hover {
            background-color: #e4e5e7;
            color: #686767;
        }

        .btn-ajouter {
            background-color: #005dc7;
        }

        .btn-ajouter:hover {
            background-color: #2e9c65 !important;
        }

        .dz-default.dz-message {
            margin-top: 8%;
        }

        .lettre-3 .dz-default.dz-message {
            margin-top: 4%;
        }


        .title.custom-title {
            border-bottom: 0 !important;
        }

        .title.custom-title:after {
            width: 63px !important;
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1470px;
            }
        }
    </style>
    <style>
        .custom-file-input {
            display: none;
        }

        .btn-light {
            background-color: #f8f9fa;
            color: #005dc7;
            border: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-align: center;
            cursor: pointer;
        }

        .btn i:first-child {
            margin-right: 0 !important;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
        }

        .dataTables_wrapper .dataTables_length, .dataTables_wrapper 
        .dataTables_filter, .dataTables_wrapper .dataTables_info, 
        .dataTables_wrapper .dataTables_processing, .dataTables_wrapper 
        .dataTables_paginate {
            color: #333;
            margin-left:10px !important;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __("generated.Paramètre") }}</h5>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip"
                     data-bs-placement="top"
                     title="contact">
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
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip"
                     data-bs-placement="top" title="Guide vidéo">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                    </figure>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip"
                     data-bs-placement="top" title="Chatbot">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{asset('assets/img/icon/hj_icon.svg')}}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top"
                     title="Confort utilisateur" style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Evaluateurs") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mt-3 mb-4">
                <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="planner-tab" data-bs-toggle="tab" data-bs-target="#planner"
                            type="button" role="tab" aria-controls="planner" aria-selected="true">
                            {{ __("generated.Cabinet de recrutement") }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" type="button"
                            role="tab" aria-controls="posts" aria-selected="false" tabindex="-1">
                             {{ __("generated.listing_evaluateur") }}
                        </button>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="tab-content" id="myTabContent" style="min-height: 800px;">
                    <!-- Planner Tab Content -->
                    <div class="tab-pane fade show active" id="planner" role="tabpanel" aria-labelledby="planner-tab">
                        @if(isset($company))
                        <div class="col-12">
                            <div class="card border-0 mb-4">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row mb-3" style="padding-left: 30px;">
                                                                <div class="col-2" style="width: 9%;">
                                                                    <div class="col-auto position-relative">
                                                                        <figure class="avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                                            style="line-height: 0 !important; margin-top: 2px !important; background-repeat: no-repeat; background-size: 80px;">
                                                                            <img src="{{ asset('assets/img/logo-entreprise/Artus.jpg') }}"
                                                                                class="client-logo" id="view-user-logo" alt="">
                                                                        </figure>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-3"
                                                                    style="width: 24.9%; margin-top: 26px; margin-right: -10px;">
                                                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <input type="text" placeholder="{{ __("generated.RaisonRaison sociale") }}"
                                                                                value="{{ __($company->business_name) }}" class="form-control border-start-0">
                                                                            <label>{{ __("generated.Raison sociale") }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">{{ __("generated.Add insert valid data") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-3"
                                                                    style="width: 27%; margin-top: 26px; margin-right: -10px;">
                                                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <input type="text" placeholder="{{ __("generated.Adresse") }}"
                                                                                value="{{ __($company->address) }}" class="form-control border-start-0">
                                                                            <label>{{ __("generated.Adresse") }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-2"
                                                                    style="margin-top: 26px; width: 12%; margin-right: -10px;">
                                                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <input type="text" placeholder="{{ __("generated.Code postal") }}"
                                                                                value="{{ __($company->postal_code) }}" required class="form-control border-start-0">
                                                                            <label>{{ __("generated.Code postal") }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-2"
                                                                    style="width: 12%; margin-top: 26px; margin-right: 4px;">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div class="custom-multiple-select custom-multiple-select rounded border poste-chosen"
                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                            <label>{{ __("generated.Ville") }}</label>
                                                                            <select class="chosenoptgroup w-100" name="profession_id[0]">
                                                                                <option>{{ __("generated.Sélectionnez un choix") }}</option>
                                                                                @foreach($cities as $city)
                                                                                <option value="{{ __($city->id) }}" {{ isset($company) && $company->city_id == $city->id ? 'selected' : '' }}>
                                                                                    {{ __($city->name) }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-2"
                                                                    style="width: 12%; margin-top: 26px; margin-right: 4px;">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div id="country-selector" class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                            <label>{{ __("generated.Pays") }}</label>
                                                                            <select class="chosenoptgroup w-100" name="profession_id[0]">
                                                                                <option>{{ __("generated.Pays") }}</option>
                                                                                @foreach($countries as $country)
                                                                                <option value="{{ __($country->id) }}" data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png"
                                                                                    {{ isset($company) && $company->city->country_id == $country->id ? 'selected' : '' }}>
                                                                                    {{ __($country->name) }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
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
                        @endif

                        <form action="#" method="post" id="addEditDataEvaluator" enctype="multipart/form-data">
                            @csrf
                            <div class="row align-items-center py-2">
                                @if(isset($company))
                                <input type="hidden" name="company_id" value="{{ __($company->id) }}">
                                @endif
                                <div class="col-12" id="EvaluatorsTabContent">
                                    <div class="card border-0 card-evaluator" data-index="0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row mb-4">
                                                                <div class="col-10">
                                                                    <h4 class="title custom-title">{{ __("generated.Evaluateur") }}</h4>
                                                                </div>
                                                                <div class="col-2 text-end">
                                                                    <button class="btn btn-theme mnw-100 bg-blue" type="button" style="font-size: 14px">
                                                                        {{ __("generated.Ajouter un évaluateur") }}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3" style="padding-left: 10px;">
                                                                <div class="col-2" style="width: 9%;">
                                                                    <div class="col-auto position-relative">
                                                                        <figure class="logo-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                                            style="background-size: 80px; line-height: 0 !important; margin-top: 2px !important;">
                                                                            <img src="{{ asset('assets/img/icon/empty-logo2.png') }}"
                                                                                class="client-logo custom-file-input" alt="" />
                                                                        </figure>
                                                                        <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                            style="top: 78% !important; left: 60%;">
                                                                            <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                                                <i class="bi bi-camera"></i>
                                                                                <input type="file" name="path_logo[]" class="custom-file-input evaluatorLogolightinput"
                                                                                    id="evaluatorLogolightinput" accept="image/*" />
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-3" style="width: 15%; margin-top: 26px; margin-right: -10px;">
                                                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <input type="text" name="first_name[0]" placeholder="{{ __("generated.Prénom") }}"
                                                                                class="form-control border-start-0">
                                                                            <label>{{ __("generated.Prénom") }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3">{{ __("generated.Add insert valid data") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-3" style="width: 15%; margin-top: 26px; margin-right: -10px;">
                                                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <input type="text" name="last_name[0]" placeholder="{{ __("generated.Nom") }}"
                                                                                class="form-control border-start-0">
                                                                            <label>{{ __("generated.Nom") }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-3" style="width: 16%; margin-top: 26px; margin-right: -10px;">
                                                                    <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <input type="text" name="email[]" placeholder="{{ __("generated.Email") }}"
                                                                                class="form-control border-start-0 translated_text">
                                                                            <label>{{ __("generated.Email") }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-3" style="width: 16%; margin-top: 26px; margin-right: -10px;">
                                                                    <div class="form-group check-valid is-valid">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important; background-color: var(--adminux-theme-bg) !important;">
                                                                            <label>{{ __("generated.Poste") }}</label>
                                                                            <select class="chosenoptgroup w-100 form-select border-0"
                                                                                style="border-radius: var(--adminux-rounded);" name="profession_id[0]">
                                                                                <option>{{ __("generated.Sélectionnez un choix") }}</option>
                                                                                @foreach($professions as $profession)
                                                                                <option value="{{ __($profession->id) }}">{{ __($profession->label) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                </div>

                                                                <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent"
                                                                    style="padding-right: 0; margin-top: 26px; width: 30%;">
                                                                    <div class="types_evaluation_div">
                                                                        <div class="row mb-3 type_evaluation_div">
                                                                            <div class="col-12" style="width: 61%; margin-right: -10px;">
                                                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                                    <div class="form-floating">
                                                                                        <select class="form-select border-0" name="evaluation_type_id[][]">
                                                                                            @foreach($types_evaluations as $type)
                                                                                            <option value="{{ __($type->id) }}">{{ __($type->name) }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <label>{{ __("generated.Type d'évaluation") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none;
                                                                                    }
                                                                                </style>
                                                                            </div>

                                                                            <div class="col-12 col-md-6 col-lg-2" style="width: 28%; margin-right: -12px;">
                                                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                                    <div class="form-floating">
                                                                                        <input type="number" name="coefficient[0][0]" placeholder="{{ __("generated.Coefficient") }}"
                                                                                            class="form-control border-start-0">
                                                                                        <label>{{ __("generated.Coefficient") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="invalid-feedback">{{ __("generated.Please enter valid input") }}</div>
                                                                            </div>

                                                                            <div class="col-12 col-md-6 col-lg-2 add-type-evaluation" style="width: 6%; margin-top: 16px;">
                                                                                <i class="bi bi-plus-square" style="color: #005DC7; font-size: 25px;"></i>
                                                                            </div>

                                                                            <div class="col-12 col-md-6 col-lg-2 btn-type-evaluation-delete hidden" style="width: 6%; margin-top: 16px;">
                                                                                <i class="bi bi-trash text-red" style="font-size: 25px;"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div> <!-- row mb-3 -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5 mt-2" style="padding: 0px 17px;">
                                <div class="col-12">
                                    <button class="btn btn-theme mnw-100 bg-info float-end" type="submit" style="font-size: 14px;">
                                        {{ __("generated.Enregistrer") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Posts Tab Content -->
                    <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                        <div class="card border-0">
                        <div class="card-body p-2 ">
                            <!------------------------Table-------------------------->
                            <div class="tableall alltable">
                                <!-- Ajout de la classe table-responsive pour permettre le défilement horizontal -->
                                <div class="table table-responsive">
                                    <table id="Table-listing-evaluator" class="table offres-table Intégrale"
                                    data-show-toggle="true" style="width: 100%; border-top: 1px solid #e9e9e9 !important;">
                                    <thead style="font-size: 13px; text-align: center;">
                                        <tr style="vertical-align: middle;">
                                            <th>#</th>
                                            <th>{{ __('generated.Nom') }}</th>
                                            <th>{{ __('generated.Prénom') }}</th>
                                            <th>{{ __('generated.Email') }}</th>
                                            <th>{{ __('generated.Type d’évaluation') }}</th>
                                            <th>{{ __('generated.Poste') }}</th>
                                            <th>{{ __('generated.Coeficient') }}</th>
                                            <th>{{ __('generated.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody style="vertical-align: middle; font-size: 13px; text-align: center;">
                                        {{-- Les données seront chargées dynamiquement via DataTables --}}
                                    </tbody>
                                </table>
                                </div>
                               <div class="row align-items-center mx-0 mb-4">
                                    <div class="col-5 ">

                                    </div>
                                    <div class="col-7  footable-paging-external footable-paging-right"
                                        id="footable">
                                        <div class="footable-pagination-wrapper">
                                            <ul class="pagination">
                                                <li class="footable-page-nav disabled" data-page="first">
                                                    <a class="footable-page-link" href="#">«</a>
                                                </li>
                                                <li class="footable-page-nav disabled" data-page="prev">
                                                    <a class="footable-page-link" href="#">‹</a>
                                                </li>
                                                <li class="footable-page visible active" data-page="1"><a
                                                        class="footable-page-link" href="#">1</a>
                                                </li>
                                                <li class="footable-page visible" data-page="2">
                                                    <a class="footable-page-link" href="#">2</a>
                                                </li>
                                                <li class="footable-page-nav" data-page="next"><a
                                                        class="footable-page-link" href="#">›</a>
                                                </li>
                                                <li class="footable-page-nav" data-page="last"><a
                                                        class="footable-page-link" href="#">»</a>
                                                </li>

                                            </ul>

                                            </li>
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
        </div>

    </main>
@endsection

@section('js_footer')
    <!-- JS Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/profile/listing.js') }}"></script>

    <script>
        function delete_evaluator(evaluatorId) {
            Swal.fire({
                title: "{{ __('generated.are_you_sure') }}",
                text: "{{ __('generated.delete_confirmation_text') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "{{ __('generated.yes_delete') }}",
                cancelButtonText: "{{ __('generated.cancel') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/api/evaluators/${evaluatorId}`, {
                        method: 'DELETE',
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire("{{ __('generated.deleted') }}", data.message, "success");
                            const table = $('#Table-listing-evaluator').DataTable();
                            const row = table.row($(`[data-id="${evaluatorId}"]`).closest('tr'));
                            row.remove().draw(false);
                            
                        } else {
                            Swal.fire("{{ __('generated.error') }}", data.message || "{{ __('generated.something_went_wrong') }}", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Delete error:", error);
                        Swal.fire("{{ __('generated.error') }}", "{{ __('generated.delete_failed') }}", "error");
                    });
                }
            });
        }
    </script>
    <script>
        var evaluatorData = "{{ route('api.evaluator.listing.data') }}";
        var ApiClientCreateEvaluators = "{{ route('api.evaluator.create') }}";
        var professions = @json($professions);
        var types_evaluations = @json($types_evaluations);
        window.emptyLogoUrl = "{{ asset('assets/img/icon/empty-logo2.png') }}";

    </script>
    @vite(['resources/js/evaluator/create-edit-evaluator.js', 'resources/js/evaluator/listing-evaluator.js'])
@endsection
