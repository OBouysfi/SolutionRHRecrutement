@extends('layouts.master')

@section('title', __('generated.update_evaluator'))

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
            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{ __('generated.Evaluateurs') }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">

            <div class="row">
                <div class="tab-content" id="myTabContent" style="min-height: 80px;">
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
                                                                <!-- here -->
                                                                <div class="row">
                                                                    <div class="tab-content" id="myTabContent"
                                                                        style="min-height: 80px;">
                                                                        <div class="tab-pane fade show active"
                                                                            id="planner" role="tabpanel"
                                                                            aria-labelledby="planner-tab">
                                                                            <div class="row align-items-center py-2">
                                                                                <form action="#" method="post"
                                                                                    id="editDataEvaluator"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="col-12"
                                                                                        id="EvaluatorsTabContent">
                                                                                        <input type="hidden"
                                                                                            name="evaluatorId[]"
                                                                                            placeholder="Numéro"
                                                                                            value="{{ __($evaluator->id) }}"
                                                                                            class="form-control border-start-0">
                                                                                        <div class="card border-0 card-evaluator"
                                                                                            data-index="0"
                                                                                             >
                                                                                            <div class="card-body p-0">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div
                                                                                                            class="card border-0">
                                                                                                            <div
                                                                                                                class="card-body">
                                                                                                                <div
                                                                                                                    class="row mb-3">
                                                                                                                    <div
                                                                                                                        class="col-12">
                                                                                                                        <div class="row mb-3">
                                                                                                                            <div class="col-2" style="width: 9%;">
                                                                                                                                <div class="col-auto position-relative">
                                                                                                                                <figure
                                                                                                                                    class="logo-manager-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                                                                                                    id="evaluatorImagePreview"
                                                                                                                                    style="background-image: url('{{ asset('storage/' . ($evaluator->path_logo ?? 'default.jpg')) }}');
                                                                                                                                            line-height: 0 !important;
                                                                                                                                            margin-top: 2px !important;
                                                                                                                                            ">
                                                                                                                                    <img src="{{ asset('storage/' . ($evaluator->path_logo ?? 'default.jpg')) }}"
                                                                                                                                        alt="evaluator Image"
                                                                                                                                        class="client-manager-logo custom-file-input">
                                                                                                                                </figure>
                                                                                                                                <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                                                                                    style="top: 78% !important;left: 60%;">
                                                                                                                                    <label
                                                                                                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn"
                                                                                                                                        style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;">


                                                                                                                                        <i
                                                                                                                                            class="bi bi-camera"></i>
                                                                                                                                        <input
                                                                                                                                            type="file"
                                                                                                                                            name="path_logo[]"
                                                                                                                                            class="custom-file-input clientEvaluatorLogolightinput"
                                                                                                                                            accept="image/*" />
                                                                                                                                    </label>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12 col-md-6 col-lg-3"
                                                                                                                                style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                                                                                                <div
                                                                                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                                                    <div
                                                                                                                                        class="form-floating">
                                                                                                                                        <input
                                                                                                                                            type="text"
                                                                                                                                            name="first_name[0]"
                                                                                                                                            value="{{ __($evaluator->first_name) }}"
                                                                                                                                            placeholder="Prénom"
                                                                                                                                            class="form-control border-start-0">
                                                                                                                                        <label>{{ __('generated.Prénom') }}</label>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="invalid-feedback mb-3">
                                                                                                                                    Add insert valid data
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12 col-md-6 col-lg-3"
                                                                                                                                style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                                                                                                <div
                                                                                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                                                    <div
                                                                                                                                        class="form-floating">
                                                                                                                                        <input
                                                                                                                                            type="text"
                                                                                                                                            name="last_name[0]"
                                                                                                                                            value="{{ __($evaluator->last_name) }}"
                                                                                                                                            placeholder="Nom"
                                                                                                                                            class="form-control border-start-0">
                                                                                                                                        <label>{{ __('generated.Nom') }}</label>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="invalid-feedback">
                                                                                                                                    Please
                                                                                                                                    enter
                                                                                                                                    valid
                                                                                                                                    input
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12 col-md-6 col-lg-3" style="width: 15%; margin-top: 26px; margin-right: -10px;">
                                                                                                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                                                    <div class="form-floating">
                                                                                                                                        <input
                                                                                                                                            type="email"
                                                                                                                                            name="email[0]"
                                                                                                                                            value="{{ __($evaluator->email ?? '') }}"
                                                                                                                                            placeholder="Email"
                                                                                                                                            class="form-control border-start-0"
                                                                                                                                        >
                                                                                                                                        <label>{{ __('generated.Email') }}</label>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="invalid-feedback">
                                                                                                                                    Please enter a valid email
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                                                                style="margin-top: 26px;width: 19%;margin-right: -10px;">
                                                                                                                                <div
                                                                                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                                                                                    <div
                                                                                                                                        class="custom-multiple-select poste-chosen rounded border select-search">
                                                                                                                                        <!-- <input type="text" name="profession_id[]" placeholder="Poste" class="form-control border-start-0"> -->
                                                                                                                                        <label>{{ __('generated.Poste') }}</label>
                                                                                                                                        <select
                                                                                                                                            name="profession_id[0]"
                                                                                                                                            class="chosenoptgroup w-100 form-control border-start-0">
                                                                                                                                            @foreach ($professions as $profession)
                                                                                                                                                <option
                                                                                                                                                    value="{{ __($profession->id) }}"
                                                                                                                                                    {{ $evaluator->profession_id == $profession->id ? 'selected' : '' }}>
                                                                                                                                                    {{ __($profession->label) }}
                                                                                                                                                </option>
                                                                                                                                            @endforeach
                                                                                                                                        </select>
                                                                                                                                        
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="invalid-feedback">
                                                                                                                                    Please
                                                                                                                                    enter
                                                                                                                                    valid
                                                                                                                                    input
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent"
                                                                                                                                style="padding-right: 0;margin-top: 26px;width: 29%;">
                                                                                                                                <div
                                                                                                                                    class="types_evaluation_div">
                                                                                                                                    @if ($evaluator->typeCoefficients)
                                                                                                                                        @foreach ($evaluator->typeCoefficients as $typeCoefficient)
                                                                                                                                            <div
                                                                                                                                                class="row mb-3 type_evaluation_div">
                                                                                                                                                <div class="col-12 "
                                                                                                                                                    style="width: 61%;margin-right: -10px;">
                                                                                                                                                    <div class="rounded border poste-chosen no-search"
                                                                                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                                                                                                        <label
                                                                                                                                                            style="margin-top: 0px;margin-left: 17px;color: #505050;font-size: 12px;margin-bottom: 0px">{{ __('generated.Type d’évaluation') }}</label>
                                                                                                                                                        <select
                                                                                                                                                            class="chosenoptgroup w-100 form-control border-start-0"
                                                                                                                                                            name="evaluation_type_id[0][]">
                                                                                                                                                            @foreach ($types_evaluations as $type)
                                                                                                                                                                <option
                                                                                                                                                                    value="{{ __($type->id) }}"
                                                                                                                                                                    {{ isset($typeCoefficient) && $typeCoefficient->evaluation_type_id == $type->id ? 'selected' : '' }}>
                                                                                                                                                                    {{ __($type->name) }}
                                                                                                                                                                </option>
                                                                                                                                                            @endforeach
                                                                                                                                                        </select>
                                                                                                                                                    </div>
                                                                                                                                                    <style>
                                                                                                                                                        .no-search .chosen-search {
                                                                                                                                                            display: none
                                                                                                                                                        }
                                                                                                                                                    </style>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-12 col-md-6 col-lg-2"
                                                                                                                                                    style="width: 28%;margin-right: -12px;">
                                                                                                                                                    <div class="rounded border poste-chosen no-search"
                                                                                                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                                                                                                                                                        <label
                                                                                                                                                            style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;margin-bottom: 4px">{{ __('generated.Coefficient') }}</label>
                                                                                                                                                        <input
                                                                                                                                                            type="number"
                                                                                                                                                            name="coefficient[0][]"
                                                                                                                                                            value="{{ __($typeCoefficient->coefficient) }}"
                                                                                                                                                            class="form-control border-start-0">
                                                                                                                                                    </div>
                                                                                                                                                    <style>
                                                                                                                                                        .no-search .chosen-search {
                                                                                                                                                            display: none
                                                                                                                                                        }
                                                                                                                                                    </style>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-12 col-md-6 col-lg-2 btn-existed-evaluator-card-delete hidden"
                                                                                                                                                    data-bs-toggle="tooltip"
                                                                                                                                                    data-bs-placement="top"
                                                                                                                                                    title="Guide vidéo"
                                                                                                                                                    style="width: 6%;margin-top: 16px;"
                                                                                                                                                    data-evaluator-id="{{ __($evaluator->id) }}">
                                                                                                                                                    <i class="bi bi-trash3"
                                                                                                                                                        style="font-size: 19px;color: #dd2255;"></i>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-12 col-md-6 col-lg-2 btn-type-evaluation-delete hidden"
                                                                                                                                                    style="width: 6%;margin-top: 16px;">
                                                                                                                                                    <i class="bi bi-trash3"
                                                                                                                                                        data-bs-toggle="tooltip"
                                                                                                                                                        data-bs-placement="top"
                                                                                                                                                        title="Guide vidéo"
                                                                                                                                                        style="font-size: 19px;color:rgb(221, 124, 34);"></i>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        @endforeach
                                                                                                                                    @endif
                                                                                                                                </div>

                                                                                                                                <div
                                                                                                                                    class="row">
                                                                                                                                    <div class="col-12"
                                                                                                                                        style="width: 61%;margin-right: -10px;">
                                                                                                                                    </div>
                                                                                                                                    <div class="col-12"
                                                                                                                                        style="width: 28%;margin-right: -24px;">
                                                                                                                                    </div>
                                                                                                                                    <div class="col-2"
                                                                                                                                        style="width: 6%;margin-top: 17px;">
                                                                                                                                        <button
                                                                                                                                            class="btn btn-theme mnw-100 bg-blue add-type-evaluation"
                                                                                                                                            type="button"
                                                                                                                                            style="float: right;font-size: 14px">{{ __('generated.Ajouter') }}</button>
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
                                                                                    <!-- <div style="padding: 0px 17px;" class="row mb-5 mt-2">
                                                                                            <div class="col-12" style="width: 36%">
                                                                                                <div class="form-check form-switch" style="margin-top: 15px;">
                                                                                                    <button class="btn btn-theme mnw-100 bg-green" style="float: right;font-size: 14px;margin-left: 10px" type="submit">Enregistrer</button>
                                                                                                    <button  class="btn btn-danger mnw-100 btn-existed-evaluator-card-delete" style="float: right;font-size: 14px;margin-left: 10px">Supprimer</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> -->
                                                                                    <div class="row mt-5 mb-4 justify-content-end"
                                                                                        style="float: right;margin-right: 11px">
                                                                                        <div class="col-auto">
                                                                                            <!-- submit button -->
                                                                                            <button class="btn btn-theme"
                                                                                                id="btn-add-general-informations"
                                                                                                data-form-id="general-informations"
                                                                                                type="submit">{{ __('generated.Modifier') }}</button>
                                                                                        </div>
                                                                                        <!-- <div class="col-auto">
                                                                                                <button class="btn btn-white btn-annuler btn-existed-evaluator-card-delete" type="button" data-evaluator-id="{{ __($evaluator->id) }}">Supprimer</button>
                                                                                            </div> -->
                                                                                    </div>
                                                                                </form>
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
        </div>

    </main>
@endsection

@section('js_footer')
    <script>
        var evaluator = @json($evaluator);

        var ApiClientEditEvaluator = "{{ route('api.evaluator.edit', $evaluator->id) }}";
    </script>
    @vite(['resources/js/evaluator/create-edit-evaluator.js'])

    <script>
             $(document).on("change", ".clientEvaluatorLogolightinput", function () {
        let input = this;

        if (input.files && input.files[0]) {
            let file = input.files[0];

            // Check if the file is an image
            if (!file.type.startsWith("image/")) {
                alert(window.translations.alert);
                return;
            }

            let reader = new FileReader();

            reader.onload = function (e) {
                let imageUrl = e.target.result; // Get the image URL from FileReader

                // Find the closest figure and corresponding image within the same container
                let $container = $(input).closest(".position-relative"); // Adjust selector if needed
                let $figure = $container.find(".logo-manager-figure");
                let $img = $figure.find("img.client-manager-logo");

                // Update the image preview
                $img.attr("src", imageUrl);

                // Update the avatar figure background
                $figure.css({
                    "background-image": `url(${imageUrl})`,
                    "background-size": "cover",
                    "background-position": "center",
                });
            };

            reader.readAsDataURL(file); // Read the image as a data URL
        } else {
            // If no file is selected, reset the image
            let $container = $(input).closest(".position-relative");
            let $figure = $container.find(".logo-manager-figure");
            let $img = $figure.find("img.client-manager-logo");

            $img.attr("src", "default-avatar.png");
            $figure.css("background-image", "none");
        }
    });
    </script>
@endsection
