@extends('candidate_portal.layouts.second')

@section('title', 'Ajouter un CV')

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
            /* background-color: var(--adminux-theme-bg); */
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
            /* color: #6c757d; */
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

        /* .dropdown-menu .form-control,
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
            } */

        /* .form-control,
            .form-select {
                background-color: var(--adminux-theme-bg) !important;
            } */

        .btn-annuler:hover {
            background-color: #e4e5e7;
            color: #686767;
        }

        /* .btn-ajouter {
                                                                                        background-color: #005dc7;
                                                                                    }

                                                                                    .btn-ajouter:hover {
                                                                                        background-color: #005dc7 !important;
                                                                                    } */

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

        /* .btn-light {
                                                                                        background-color: var(--adminux-theme-bg);
                                                                                        color: #005dc7;
                                                                                        border: 1px solid #ced4da;
                                                                                        padding: 0.375rem 0.75rem;
                                                                                        font-size: 1rem;
                                                                                        display: inline-flex;
                                                                                        align-items: center;
                                                                                        gap: 5px;
                                                                                        text-align: center;
                                                                                        cursor: pointer;
                                                                                    } */

        .btn i:first-child {
            margin-right: 0 !important;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
        }

        @media (max-width: 768px) {
            .file-upload label {
                font-size: 12px !important;
            }
        }


        .action-check {
            border: 1px solid #ccc;
            background-color: white;
            transition: background-color 0.3s, border-color 0.3s;
            border-radius: 10px;
        }

        input[type="radio"]:checked+.action-check {
            background-color: #4c9ee1;
            color: white;
            border-color: #4c9ee1;
            border-radius: 10px;
        }

        .chosen-container .chosen-choices li.search-choice {
            background: #4c9ee1 !important;
            border-color: #4c9ee1 !important;
        }

        .input-group .chosen-container {
            width: 100% !important;
            max-width: 100% !important;
        }


        .tagify__input,
        .tagify__tag {
            margin: -5px 0 0 0 !important;
        }

        .tagify__tag {
            border: 2px solid #26b6ea;
            border-radius: 6px
        }
    </style>
    <style>
        form .position-absolute {
            top: 90px !important;
        }

        .custom-image-logo {
            top: 90px !important;
            right: 15px !important;
        }

        .card {
            box-shadow: none !important;
        }

        .rounded.poste-chosen .chosen-single {
            background: none !important;
        }

        .chosen-choices,
        .card .chosen-single,
        .form-control {
            background: transparent !important;
            background-color: transparent !important;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 translated_text">{{ __('candidate-portal.CVthèque') }}</h5>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar1" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('candidate-portal.contact') }}">
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
                    title="{{ __('candidate-portal.Guide vidéo') }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('candidate-portal.Chatbot') }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('candidate-portal.Confort utilisateur') }}"
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
                    <li class="breadcrumb-item active translated_text" aria-current="page">{{ __('candidate-portal.Ajouter un CV') }}</li>
                </ol>
            </nav>
        </div>

        <!-- content -->
        <div class="container mt-4">
            {{-- <div class="row mb-5">
                <div class="col-5">
                    <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist"
                        style="font-size: 16px">
                        <li class="nav-item translated_text" role="presentation">
                            <a class="nav-link active" id="automatique-tab" data-bs-toggle="tab" href="#automatique"
                                role="tab" aria-controls="automatique" aria-selected="true">Automatique</a>
                        </li>
                        <li class="nav-item translated_text" role="presentation">
                            <a class="nav-link" id="manuel-tab" data-bs-toggle="tab" href="#manuel" role="tab"
                                aria-controls="manuel" aria-selected="false">Manuel</a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <div class="row">
                {{-- <div class="tab-content py-3" id="myTabContent" style="background-color: #fff"> --}}
                {{-- @include('candidate-portal.profile.inc.createAuto') --}}
                @include('candidate_portal.profile.inc.createManual')
                {{-- </div> --}}
            </div>
        </div>
    </main>
@endsection
@section('js_footer')
@include('profile.inc.translation')

    <!-- JS Select2 -->

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.15.4/tagify.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.15.4/tagify.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        var inputElem = document.getElementById("technical-skills")
        document.addEventListener("DOMContentLoaded", function() {
            // var input = document.querySelector("#tags-input");
            // var tagify = new Tagify(inputElem, {
            //     whitelist: ["Laravel", "PHP", "JavaScript", "Vue.js"], // Optional predefined tags
            //     maxTags: 10,
            //     dropdown: {
            //         enabled: 1 // Show suggestions when typing
            //     }
            // });

            // // Handle Tagify Events (Optional)
            // tagify.on('add', function(e) {
            //     console.log("Added tag:", e.detail.data.value);
            // });
        });
    </script>
    <script>
        'use strict';

        let coverLetterEditor; 

        $(window).on('load', function () {
            ClassicEditor
                .create(document.querySelector('#cover_letter_ckeditor'), {
                    language: 'fr',
                    toolbar: {
                        items: [
                            'bold',
                            'italic',
                            'link',
                            'undo',
                            'redo',
                            'bulletedList',
                            'numberedList',
                            'blockQuote'
                        ]
                    },
                })
                .then(editor => {
                    coverLetterEditor = editor; 
                })
                .catch(error => {
                    console.error(error);
                });
        });

        function updateCKEditorAndSave(editorId, endpoint, id) {
            if (coverLetterEditor) {
                document.querySelector('#' + editorId).value = coverLetterEditor.getData();
            }

            saveForm(endpoint, id);
        }
    </script>
    <script>
        const numberInputs = document.querySelectorAll(".custom-number-input");

        numberInputs.forEach(input => {
            input.addEventListener("input", (e) => {
                let value = e.target.value.replace(/\s/g, ''); // remove spaces

                if (!isNaN(value) && value !== '') {
                    e.target.value = new Intl.NumberFormat('fr-FR').format(value);
                } else {
                    e.target.value = '';
                }
            });
        });
    </script>
    <script>
        const countries = @json($countries);
        const cities = @json($cities);
        const posts = @json($posts);
        const levels = @json($levels);
        const diplomas = @json($diplomas);
        const diplomaOptions = @json($diplomaOptions);
        const mentions = @json(App\Enums\Profile\MentionEnum::getAll());
        const langSkillLevels = @json(App\Enums\Skill\LanguageLevelEnum::getAll());
        const LevelSkillEnum = @json(App\Enums\Skill\LevelSkillEnum::getAll());

        $(document).ready(function() {
            $('select').chosen({
                width: '100%',
                no_results_text: "{{ __('generated.Aucun résultat trouvé') }}",
                placeholder_text_single: "{{ __('generated.Sélectionnez un choix') }}",
            });
        });
    </script>
    <script>
        apiUploadCv = "{{ route('profile.uploadCv') }}";
        apiUploadCoverLetter = "{{ route('profile.uploadCoverLetter') }}";
        apiUploadVideo = "{{ route('profile.uploadVideo') }}";
        apiChangecandidate-portalCover = "{{ route('profile.changeCover') }}";
        apiChangecandidate-portalAavatar = "{{ route('profile.changeAvatar') }}";
        apiStoreGeneralInfo = "{{ route('profile.store.informations') }}";
    </script>
    <script>
        $(document).ready(function() {
            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('.Flag_Country option').eq(index).data('image');
                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('.Flag_Country').on('chosen:showing_dropdown', addImagesToChosen);
        });
    </script>
    @vite(['resources/js/candidatePortal/profile/create-edit.js'])
@endsection
