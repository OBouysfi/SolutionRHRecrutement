@extends('layouts.master')

@section('title', __('generated.Ajouter un client'))

@section('css_header')
<style>
    .card .card-footer.footer-1 {
        background-color: #2e9c65ba;
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
        background-color: var(--adminux-theme-bg) !important;
    }

    .form-control,
    .form-select {
        background-color: var(--adminux-theme-bg) !important;
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
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Clients") }}</h5>
            </div>
            <!-- <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar1" />
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                            class="bi bi-calendar-event"></i></span>
                </div>
            </div>
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Guide vidéo">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                </figure>
            </div>
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Chatbot">
                <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                    style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                    <img src="assets/img/icon/HJ_icon_green_black.png" alt="" style="display: none;">
                </figure>
            </div>
            <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur"
                style="margin-right: 40px;">
                <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                    id="showNotificationFaciliti">
                    <i class="bi bi-" style="font-size: 26px;">
                        <img src="assets/img/icon/faciliti.png"
                            style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                    </i>
                </button>
            </div> -->
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active translated_text" aria-current="page">{{ __("generated.Client") }} : {{ __($client->name) }}</li>

            </ol>
        </nav>
    </div>

    <!-- content -->
    <div class="container mt-4">

        <div class="row mb-5 justify-content-center">
            <div class="col-10">
                <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="font-size: 14px" class="nav-link active " id="general-info-tab" onclick="openTab('general-info')">{{ __("generated.Informations générales") }}</a>
                    </li>
                    <li class="nav-item" role="presentation2">
                        <a style="font-size: 14px" id="tax-info-tab" onclick="openTab('tax-info')" class="nav-link  ">{{ __("generated.Identifiant fiscale") }}</a>
                    </li>
{{--                    <li class="nav-item" role="presentation3">--}}
{{--                        <a style="font-size: 14px" id="filiales-tab" onclick="openTab('filiales')" class="nav-link ">Filiales</a>--}}
{{--                    </li>--}}
                    <li class="nav-item" role="presentation4" >
                        <a style="font-size: 14px" id="sites-tab" onclick="openTab('sites')"  class="nav-link  ">{{ __("generated.Sites") }}</a>
                    </li>
                    <li class="nav-item" role="presentation5" >
                        <a style="font-size: 14px" id="evaluateurs-tab" onclick="openTab('evaluateurs')"  class="nav-link  ">{{ __("generated.Evaluateurs") }}</a>
                    </li>
                    <li class="nav-item" role="presentation7" >
                        <a style="font-size: 14px" id="admin-user-tab" onclick="openTab('admin-user')"  class="nav-link  ">{{ __("generated.Admin_user") }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="tab-content py-3" id="myTabContent">

            @include('client.inc.consult.generalInformations', ['client' => $client])
            @include('client.inc.consult.finance', ['client' => $client])
            @include('client.inc.consult.site')
            @include('client.inc.consult.evaluator')
                @include('client.inc.consult.accountUser')



            </div>
        </div>
    </div>
</main>

@endsection
@section('js_footer')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var client = @json($client);
    var clientFinance = @json($clientFinance);
    var clientFiliale = @json($clientFiliales);
    var clientSite = @json($clientSites);

</script>
@vite([
    'resources/js/client/create-edit-client.js',
    'resources/js/client/create-edit-client-finance.js',
    'resources/js/client/create-edit-client-filiale.js',
    'resources/js/client/create-edit-client-site.js'
    ])
@endsection
<script>
    function openTab(tabId) {
        // Hide all tab content
        document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('active'));

        // Remove active state from all tab buttons
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));

        // Show the selected tab and activate its button
        document.getElementById(tabId).classList.add('active');
        document.querySelector(`a[onclick="openTab('${tabId}')"]`).classList.add('active');
    }
</script>
