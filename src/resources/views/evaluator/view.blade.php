@extends('layouts.master')

@section('title', __('generated.view_evaluator'))

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
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('generated.Paramètre') }}</h5>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
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
                </div> --}}
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{ __('generated.Evaluateurs') }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="row">
                <div class="tab-content" id="myTabContent" style="min-height: 800px;">
                    <div class="tab-pane fade show active" id="planner" role="tabpanel" aria-labelledby="planner-tab">
                        <div class="row mb-5 ">
                            <div class="tab-content py-3">
                                <div class="row justify-content-center mb-5">
                                    <div class="col-11">
                                        <div class="card border-0">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row mb-4">
                                                                    <div class="col-12">
                                                                        <h4 class="title custom-title">{{ __('generated.Evaluateur') }}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row  mt-5">

                                                                    <div class="col-6">
                                                                        <div class="row">
                                                                            <div class="col-12 mb-3">
                                                                                <label class="fw-bold">{{ __('generated.Prénom') }}</label> :
                                                                                {{ __($evaluator->first_name) }}
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <label class="fw-bold">{{ __('generated.Nom') }}</label> :
                                                                                {{ __($evaluator->last_name) }}
                                                                            </div>

                                                                            <div class="col-12 mb-3">
                                                                                <label class="fw-bold">{{ __('generated.Poste') }}</label> :
                                                                                {{ __($evaluator->profession->label) }}
                                                                            </div>
                                                                            <div class="col-12 mb-3">
                                                                                <label class="fw-bold">{{ __('generated.Email') }}</label> :
                                                                                {{ __($evaluator->email) }}
                                                                            </div>
                                                                            @if ($evaluator->typeCoefficients)
                                                                                @foreach ($evaluator->typeCoefficients as $typeCoefficient)
                                                                                    <div class="col-12 mb-3">
                                                                                        <label class="fw-bold">{{ __('generated.Type d’évaluation') }}</label> :
                                                                                        {{ __($typeCoefficient->evaluationType->name) }}
                                                                                    </div>
                                                                                    <div class="col-12 mb-3">
                                                                                        <label class="fw-bold">{{ __('generated.Coeficient') }}</label> :
                                                                                        {{ __($typeCoefficient->coefficient) }}
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
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
        </div>
        </div>

    </main>
@endsection

@section('js_footer')
    <script>
        var ApiClientCreateEvaluators = "{{ route('api.evaluator.create') }}";
    </script>
    @vite(['resources/js/evaluator/create-edit-evaluator.js'])
@endsection
