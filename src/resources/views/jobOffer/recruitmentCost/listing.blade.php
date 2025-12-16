@extends('layouts.master')

@section('title',  __('generated.Rapports financiers'))

@section('css_header')
    <style>
        /* .edit-subform {
                                                                                                                                                                                                                                                                                                                    display: none;
                                                                                                                                                                                                                                                                                                                } */

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

        .footer-tabs .nav-item>.nav-link {
            display: block !important;
        }

        #swal2_select_chosen,
        .swal2-select {
            display: none;
        }

        .file-upload {
            position: relative;
            width: 100%;
            /* max-width: 600px; */
            height: 150px;
            border: 2px dashed #cccccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: #f8f9fa; */
            cursor: pointer;
            transition: border-color 0.3s ease;
            flex-direction: column;
        }

        .file-upload:hover {
            border-color: rgba(38, 182, 234, 1);
        }

        .file-upload input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload label {
            font-size: 16px;
            color: #6c757d;
            pointer-events: none;
            margin-bottom: 10px;
            padding: 15px;
            text-align: center;
        }

        .file-preview {
            margin-top: 10px;
            width: 100px;
            height: 100px;
            display: none;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            border: 1px solid #cccccc;
        }


        .card .card-footer.footer-1 {
            background-color: rgba(38, 182, 234, 1);
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x)* 0.5);
        }

        .card .card-footer.footer-2 {
            background-color: #b7131bad;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x)* 0.5);
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
        .card .chosen-single {
            /* background-color: var(--adminux-theme-bg) !important; */
        }

        .form-control,
        .form-select {
            /* background-color: var(--adminux-theme-bg) !important; */
        }

        .btn-annuler:hover {
            background-color: #e4e5e7;
            color: #686767;
        }

        .btn-ajouter {
            background-color: #005dc7;
        }

        .btn-ajouter:hover {
            background-color: #005dc7 !important;
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
        .card .card-footer.footer-1 {
            background-color: #02438dba;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x)* 0.5);
        }

        .card .card-footer.footer-2 {
            background-color: #b7131bad;
            border-top: 0px solid transparent;
            margin-top: 1px;
            padding: calc(var(--bs-gutter-x)* 0.5);
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
        .card .chosen-single {
            /* background-color: var(--adminux-theme-bg) !important; */
        }

        .form-control,
        .form-select {
            background-color: #e2e7f1fa !important;
        }

        .btn-annuler:hover {
            background-color: #e4e5e7;
            color: #686767;
        }

        .btn-ajouter {
            background-color: #005dc7;
        }

        .btn-ajouter:hover {
            background-color: #02438d !important;
        }

        .dz-default.dz-message {
            margin-top: 8%;
        }

        .lettre-3 .dz-default.dz-message {
            margin-top: 4%;
        }

        .filter-block .col-3 {
            margin-right: 8px
        }

        .filter-empty {
            padding-top: 11px !important;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 2px 9px;
            /* background-color: var(--adminux-theme-bg); */
            border-radius: 7px;
            margin-top: -4px;
        }

        .poste-chosen .chosen-container.chosen-container-single a.chosen-single {
            padding: 3px 10px;
        }

        .poste-chosen .chosen-container.chosen-container-single div.chosen-drop {
            margin-left: -10px;
        }

        .poste-chosen .chosen-container-single .chosen-single div b {
            display: block;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 12px;
            margin-top: 0px;
        }

        .poste-chosen ul li {
            font-size: 13px !important;
        }

        #country-selector ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector2 ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector3 ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector4 ul li img {
            width: 30px !important;
            margin-right: 5px;
            height: 21px !important;
            border: 1px solid #999696 !important;
        }

        #country-selector .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector2 .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector3 .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector4 .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector .chosen-single span {
            float: left
        }

        #country-selector2 .chosen-single span {
            float: left
        }

        #country-selector3 .chosen-single span {
            float: left
        }

        #country-selector4 .chosen-single span {
            float: left
        }

        .poste-chosen .chosen-single span {
            font-size: 14px !important;
        }

        .input-box.active-grey .input-1 {
            border: 1px solid #dadce0;
        }

        .input-box.active-grey .input-1 {
            border: 1px solid #dadce0;
        }

        .input-box.active-grey .input-label {
            color: #80868b;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        .input-box.active-grey .input-label svg {
            position: relative;
            width: 11px;
            height: 11px;
            top: 2px;
            transition: 250ms;
        }

        .input-box {
            position: relative;
            margin: 10px 0;
        }

        .input-box .input-label {
            position: absolute;
            color: #80868b;
            font-size: 16px;
            font-weight: 400;
            max-width: calc(100% - (2 * 8px));
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            left: 8px;
            top: 13px;
            padding: 0 8px;
            transition: 250ms;
            user-select: none;
            pointer-events: none;
        }

        .input-box .input-label svg {
            position: relative;
            width: 15px;
            height: 15px;
            top: 2px;
            transition: 250ms;
        }

        .input-box .input-1 {
            box-sizing: border-box;
            height: 50px;
            width: 100%;
            border-radius: 4px;
            color: #202124;
            border: 1px solid #dadce0;
            padding: 13px 15px;
            transition: 250ms;
        }

        .input-box .input-1:focus {
            outline: none;
            border: 2px solid #169889;
            transition: 250ms;
        }

        .input-box.error .input-label {
            color: #f44336;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        .input-box.error .input-1 {
            border: 2px solid #f44336;
        }

        .input-box.focus .input-label,
        .input-box.active .input-label {
            color: #169889;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        [type=time]::-webkit-calendar-picker-indicator {
            color: #169889 !important;
        }

        .input-box.focus .input-label svg,
        .input-box.active .input-label svg {
            position: relative;
            width: 11px;
            height: 11px;
            top: 2px;
            transition: 250ms;
        }

        .input-box.active .input-1 {
            border: 2px solid #169889;
        }

        table thead tr th,
        table tbody tr td {
            border-color: rgb(0 0 0 / 22%);
        }

        .selected-row-table {
            outline: 2px solid #169889;
            outline-offset: 4px;
        }

        .title.custom-title {
            border-bottom: 0 !important;
            padding-bottom: 0px;
        }

        .title.custom-title:after {
            width: 63px !important;
        }

        .doughnutchart {
            position: relative;
            width: 160px;
            height: 160px;
            margin: 0 auto;
            text-align: center;
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1372px;
            }
        }

        td.no-border {
            border: 0 !important;
            /* width: 2px !important; */
            vertical-align: middle;


        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(27%) sepia(83%) saturate(3660%) hue-rotate(197deg) brightness(90%) contrast(101%);
            cursor: pointer;
        }

        select.chosenoptgroup.w-100 {
            background: none !important;
            border: none !important;
            padding: 3px 10px;
            border-radius: 7px;
            margin-top: 4px;
            padding-bottom: 4px;

            font-size: 14px !important;
        }

        .custom-camera-file-input {
            height: 40px;
            width: 40px;
            line-height: 25px;
        }

        .custem-camera-file-label {
            top: 90px;
            left: 69px;
        }

        table.dataTable .th-depense {
            vertical-align: middle !important;
            width: 224px !important;
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
            margin-right: 10px !important;
        }

        table.dataTable .th-separator {
            width: 2px !important;
            border: 0 !important;
        }

        table.dataTable .th-budget {
            vertical-align: middle !important;
            text-align: center !important;
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
        }

        table.dataTable .th-reel {
            vertical-align: middle !important;
            text-align: center !important;
            width: 224px !important;
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
        }

        table.dataTable .th-ecart {
            vertical-align: middle !important;
            text-align: center !important;
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
        }

        table.dataTable .th-empty-end {
            vertical-align: middle !important;
            width: 17px !important;
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
        }

        table.dataTable .th-date {
            text-align: center !important;
            /* border-top: 1px solid #000 !important; */
            border-bottom: 1px solid #000 !important;
        }

        table.dataTable .th-montant {
            text-align: right !important;
            width: 93px !important;
            /* border-top: 1px solid #000 !important; */
            border-bottom: 1px solid #000 !important;
        }

        table.dataTable .th-facture {
            text-align: center !important;
            /* border-top: 1px solid #000 !important; */
            border-bottom: 1px solid #000 !important;
        }
    </style>

@endsection

@section('content')
    <!-- Begin page content -->
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Rapports financiers") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
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
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000 !important;000;">
                        <img src="assets/img/icon/hj_icon.svg" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Confort utilisateur") }}" style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="assets/img/icon/faciliti.png"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Rapports financiers") }}</li>
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
                                            <div class="row g-2">
                                                <!-- Date début -->
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input type="date" id="start_date" name="start_date"
                                                                    class="form-control border-start-0">
                                                                <label >{{ __("generated.Date début") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Date fin -->
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input type="date" id="end_date" name="end_date"
                                                                    class="form-control border-start-0">
                                                                <label >{{ __("generated.Date fin") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Devise -->
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div id="profession-selector"
                                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                                            style="border-radius: 8px !important; ">
                                                            <label >{{ __("generated.Devise") }}</label>
                                                            <select class="chosenoptgroup w-100 select-search-chosen"
                                                                name="devise" id="devise">
                                                                <option class=" translated_text" value="" selected>
                                                                </option>
                                                                @foreach ($devises as $key => $devise)
                                                                    <option class=" translated_text"
                                                                        value="{{ $key }}">
                                                                        {{ __($devise['label']) }} ({{ __($devise['code']) }})
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
        <div class="row justify-content-center ">
            <div class="col-12">
                <div class="container mt-4">

                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row justify-content-center ">
                                                <div class="col-12 col-md-6 col-lg-4 ms-auto my-auto">
                                                    <div class="d-flex flex-wrap justify-content-end gap-2">
                                                        <!-- Ajouter -->
                                                        <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ __("generated.Ajouter") }}">
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#ModalCreateRecruitment" target="_blank"
                                                                style="cursor: pointer;">
                                                                <i class="bi bi-plus-lg"></i>
                                                            </a>
                                                        </div>

                                                        {{-- <!-- Aperçu -->
                                                        <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ __("generated.Aperçu") }}">
                                                            <a href="rapports-financiers-apercu.html" target="_blank">
                                                                <i class="bi bi-binoculars"></i>
                                                            </a>
                                                        </div>

                                                        <!-- Partager -->
                                                        <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ __("generated.Partager") }}">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#emailcompose">
                                                                <i class="bi bi-share"></i>
                                                            </a>
                                                        </div>

                                                        <!-- Télécharger -->
                                                        <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ __("generated.Télécharger") }}">
                                                            <a href="#">
                                                                <i class="bi bi-cloud-download"></i>
                                                            </a>
                                                        </div>

                                                        <!-- Imprimer -->
                                                        <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ __("generated.Imprimer") }}">
                                                            <i class="bi bi-printer"></i>
                                                        </div>

                                                        <!-- Select -->
                                                        <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="{{ __("generated.Afficher") }}">
                                                            <select
                                                                class="form-select border-0 bg-light-blue text-primary p-0 text-center"
                                                                style="width: 49px; font-size: 14px;">
                                                                <option  selected>{{ __("generated.10") }}</option>
                                                                <option >{{ __("generated.25") }}</option>
                                                                <option >{{ __("generated.50") }}</option>
                                                                <option >{{ __("generated.100") }}</option>
                                                            </select>
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
                    <div class="row mb-4 justify-content-center" style="margin-bottom: 45px !important;">
                        <div class="col-10">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body" style="padding: 10px 34px;">
                                                            <div class="row mb-4">
                                                                <div class="col-12">
                                                                    <h5 class="title custom-title ">{{ __("generated.Rapports financiers") }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-center ">
                                                                <div class="col-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table"
                                                                            id="recruitment-costs-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class=" th-depense"
                                                                                        rowspan="2">{{ __("generated.Dépense") }}</th>
                                                                                    <th class="translated_text th-separator"
                                                                                        rowspan="2"></th>
                                                                                    <th class=" th-budget"
                                                                                        rowspan="2">{{ __("generated.Budget") }}</th>
                                                                                    <th class="translated_text th-separator"
                                                                                        rowspan="2"></th>
                                                                                    <th class=" th-reel"
                                                                                        colspan="3">{{ __("generated.Réel") }}</th>
                                                                                    <th class="translated_text th-separator"
                                                                                        rowspan="2"></th>
                                                                                    <th class=" th-ecart"
                                                                                        rowspan="2">{{ __("generated.Ecart") }}</th>
                                                                                    <th class="translated_text th-empty-end"
                                                                                        rowspan="2"></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th class=" th-date">{{ __("generated.Date") }}</th>
                                                                                    <th class=" th-montant">{{ __("generated.Montant") }}</th>
                                                                                    <th class=" th-facture">{{ __("generated.Facture") }}</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>

                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th 
                                                                                        style="border-top:1px solid #000!important; border-bottom:1px solid #000!important; font-weight:700; vertical-align:middle;">{{ __("generated.Total") }}</th>

                                                                                    <th class=" translated_text"
                                                                                        style="border:none;"
                                                                                        style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    </th>

                                                                                    <!-- col 3: Budget -->
                                                                                    <th class=" translated_text"
                                                                                        id="total-budget"
                                                                                        style="text-align:center; border-top:1px solid #000!important; border-bottom:1px solid #000!important; font-weight:700;">
                                                                                    </th>

                                                                                    <!-- col 4 (spacer) -->
                                                                                    <th class=" translated_text"
                                                                                        style="border:none;"
                                                                                        style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    </th>

                                                                                    <!-- col 5 (Date) -->
                                                                                    <th class=" translated_text"
                                                                                        style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    </th>

                                                                                    <!-- col 6: Montant -->
                                                                                    <th class=" translated_text"
                                                                                        id="total-amount"
                                                                                        style="text-align: right;border-top: 1px solid #000;border-bottom: 1px solid #000;font-weight: 700;vertical-align: middle">
                                                                                    </th>

                                                                                    <!-- col 7 (Facture) -->
                                                                                    <th class=" translated_text"
                                                                                        style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    </th>

                                                                                    <!-- col 8 (spacer) -->
                                                                                    <th class=" translated_text"
                                                                                        style="border:none;"
                                                                                        style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    </th>

                                                                                    <!-- col 9: Ecart -->
                                                                                    <th class=" translated_text"
                                                                                        id="total-difference"
                                                                                        style="text-align:center; border-top:1px solid #000!important; border-bottom:1px solid #000!important; font-weight:700;">
                                                                                    </th>
                                                                                    <th class=" translated_text"
                                                                                        style="text-align: center;border-bottom: 1px solid #000;vertical-align: middle">
                                                                                    </th>

                                                                                </tr>
                                                                            </tfoot>




                                                                        </table>
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
        </div>

    </main>
    <!-- Modal  Create Recruitment Cost-->
    @include('jobOffer.recruitmentCost.create')
    <!-- Edit  Create Recruitment Cost-->
    @include('jobOffer.recruitmentCost.edit')

@endsection
@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script>
        var recruitmentCostListingData = "{{ route('api.recruitmentCost.listing') }}";
        var recruitmentCostAddgData = "{{ route('api.recruitmentCost.store') }}";
        var routeToListing = "{{ route('rapportFinance.listing') }}";
        var recruitmentCostDelete = "{{ route('api.recruitmentCost.destroy', ['id' => 'id']) }}";
        var recruitmentCostEdit = "{{ route('api.recruitmentCost.update', ['id' => '__ID__']) }}";
    </script>
    <script>
        //  change and update image dynamically
        document.getElementById('fileInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar').style.backgroundImage = 'url(' + e.target.result + ')';
                    document.getElementById('avatarImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.getElementById('fileInputEdit').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarEdit').style.backgroundImage = 'url(' + e.target.result +
                        ')';
                    document.getElementById('avatarImageedit').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    @vite(['resources/js/recruitmentCost/listing.js', 'resources/js/recruitmentCost/create-edit.js'])



@endsection
