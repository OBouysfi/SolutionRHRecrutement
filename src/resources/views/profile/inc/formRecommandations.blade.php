@extends('layouts.recommandation')

@section('title', __('generated.HumanJobs - Recommmandations'))

@section('css_header')

@endsection

@section('content')
    
        <!-- content -->
        <div class="container mt-5 ">
            {{-- <div class="row mb-5">
                <div class="col-5">
                    <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist"
                        style="font-size: 16px">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active translated_text" id="automatique-tab" data-bs-toggle="tab" href="#automatique"
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
                {{-- @include('profile.inc.createAuto') --}}
                @include('profile.inc.RecommendationTemplate')
                {{-- </div> --}}
            </div>
        </div>

@endsection
@section('js_footer')
    <script type="text/javascript" src="{{ asset('assets/js/profile/listing.js') }}"></script>
    <!-- JS Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputElm = document.querySelector('#techTags');
            tagify = new Tagify(inputElm);
        });
    </script> --}}
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
    {{-- <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const select1 = document.getElementById('has_driving_license');
        //     const licenseTypeContainer = document.getElementById('license-type-container');

        //     function toggleLicenseTypes() {
        //         if (select1.value === 'true') {
        //             licenseTypeContainer.style.display = 'block';
        //             licenseTypeContainer.classList.remove('d-none');
        //         } else {
        //             licenseTypeContainer.style.display = 'none';
        //             licenseTypeContainer.classList.add('d-none');
        //             console.log('frff'); 
        //         }
        //     }
        //     // Run on page load
        //     toggleLicenseTypes();

        //     // Listen to changes
        //     select1.addEventListener('change', toggleLicenseTypes);
        // });


        // document.addEventListener('DOMContentLoaded', function() {
        //     const select = document.getElementById('has_driving_license');
        //     const licenseTypeContainer = document.getElementById('license-type-container');

        //     function toggleLicenseTypes() {
        //         if (select.value === 'true') {
        //             licenseTypeContainer.style.display = 'block';
        //             licenseTypeContainer.classList.remove('d-none');
        //         } else {
        //             licenseTypeContainer.style.display = 'none';
        //             licenseTypeContainer.classList.add('d-none');
        //         }
        //     }

        //     toggleLicenseTypes();
        //     select.addEventListener('change', toggleLicenseTypes);
        // });
    </script>
    <script>
        var ProfileListingRoute = "{{ route('profile.listing') }}";

        const countries = @json($countries);
        const cities = @json($cities);
        const posts = @json($posts);
        const levels = @json($levels);
        const diplomas = @json($diplomas);
        const evaluationTypes = @json($evaluationTypes);
        const diplomaOptions = @json($diplomaOptions);
        const mentions = @json(App\Enums\Profile\MentionEnum::getAll());
        const langSkillLevels = @json(App\Enums\Skill\LanguageLevelEnum::getAll());
        const LevelSkillEnum = @json(App\Enums\Skill\LevelSkillEnum::getAll());

        $(document).ready(function() {
            $('select').chosen({
                width: '100%',
                no_results_text: "Aucun résultat trouvé",
                placeholder_text_single: "Sélectionnez un choix",
            });

            // if (document.querySelector('#cover_letter_ckeditor')) {
            //     /* ck editor */
            //     ClassicEditor
            //         .create(document.querySelector('#cover_letter_ckeditor'), {
            //             language: 'fr'
            //         })
            //         .catch(error => {
            //             console.error(error);
            //         });
            // }
        });
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
                            $('.chosen-results li img').width(30).css('margin-right', '10px');
                        }
                    }
                });
            }
            $('.Flag_Country').on('chosen:showing_dropdown', addImagesToChosen);
        });
    </script> --}}

    {{-- <script src="{{ asset('assets/js/profile/create-edit') }}"></script> --}}
    <script>
        apiUploadCv = "{{ route('profile.uploadCv') }}";
        apiUploadCoverLetter = "{{ route('profile.uploadCoverLetter') }}";
        apiUploadVideo = "{{ route('profile.uploadVideo') }}";
        apiChangeProfileCover = "{{ route('profile.changeCover') }}";
        apiChangeProfileAavatar = "{{ route('profile.changeAvatar') }}";
        apiStoreGeneralInfo = "{{ route('profile.store.informations') }}";
    </script>
    @vite(['resources/js/profile/create-edit.js'])
@endsection
