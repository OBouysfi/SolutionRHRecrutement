@extends('layouts.master')

@section('title', 'Liste des questions')

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
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Test technique") }}</h5>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
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
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Liste des questions") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <div class="col-12">
                                                <h6 class="fw-medium mb-0 " style="text-align: center">{{ __("generated.Score") }}</h6>
                                            </div>
                                        </div>
                                        <div class="card-body" style="padding-top: 0px">
                                            <div class="row justify-content-center">
                                                <div class="col-auto">
                                                    <div class="doughnutchart mb-3 mt-3"
                                                        style="width: 120px !important;height: 120px !important;margin-bottom: 12px !important">
                                                        <canvas id="doughnutchart30"></canvas>
                                                        <div class="countvalue shadow">
                                                            <div class="w-100">
                                                                <h5 class="mb-1" style="font-size: 15px"
                                                                    id="score-display"></h5>
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
                <div class="col-6" style="width: 32%;margin-left: 5.5%;">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="list-group list-group-flush bg-none"
                                                        style="line-height: 1;">
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;padding-bottom: 17px;">
                                                            <div class="row">
                                                                <div class="col-auto ">id :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $candidate->id  ?? ' '}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __($candidate->first_name) }} {{ __($candidate->last_name) }}
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    <span >{{ __("generated.Créé le") }}</span>
                                                                    {{ __($candidate->created_date) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">{{ __("generated.Langue :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($test->language) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">{{ __("generated.Groupe :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($candidate->group) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">{{ __("generated.E-mail :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($candidate->email) }}
                                                                </div>
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
                    </div>
                </div>

                <div class="col-6 ms-auto" style="width: 32%;">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="list-group list-group-flush bg-none"
                                                        style="line-height: 1;">
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <img src="{{ asset('assets/img/icon/quiz/226051.webp') }}"
                                                                        style="width: 23px;margin-top: -4px;">
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($test->test_name) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">identifiant du test :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($test->id) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">{{ __("generated.Langue :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($test->language) }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">{{ __("generated.Date de passage :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    09-07-2024
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary"
                                                            style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto ">{{ __("generated.Durée du test :") }}</div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __($test->duration) }}
                                                                </div>
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
                    </div>
                </div>
            </div>
            <div class="row">
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
                                                        <i class="bi bi-play h4 custom-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Actions") }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <ul class="list-group list-group-flush bg-none">
                                                    <li class="list-group-item text-secondary"
                                                        style="border-top: 1px solid #00000016;">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-person"
                                                                    style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0">
                                                                <a style="color: #6f7880"> <span
                                                                        >{{ __("generated.Fiche du candidat") }}</span></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item text-secondary">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="bi bi-filetype-pdf"
                                                                    style="color: #2473cf !important;"></i>
                                                            </div>
                                                            <div class="col-auto ps-0" id="pdf-link">
                                                                <a href="#" style="color: #6f7880"><span
                                                                        >{{ __("generated.Rapport du test") }}</span></a>
                                                            </div>
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
                </div>
                <div style="width: 77%" class="col-9">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12" style="padding: 10px 23px;">
                                                    <table class="table " data-show-toggle="true">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;"
                                                            id="tableHeader">

                                                        </thead>
                                                        <tbody style="font-size: 13px" id="tableBody">

                                                        </tbody>
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

    </main>
@endsection


@section('js_footer')
    <script type="text/javascript">
        var ApiGetResultTestCandidate = "{{ route('api.testsTechniques.getResultTestCandidate') }}";
        var test = @json($test);
        var candidate = @json($candidate);
        var result = @json($result);

        $(window).on('load', function() {

            function addImagesToChosen() {
                $('.chosen-results li').each(function() {
                    var $chosenOption = $(this);
                    var index = $chosenOption.data('option-array-index');
                    var imageSrc = $('#country-selector option').eq(index).data('image');

                    if (imageSrc) {
                        if (!$chosenOption.find('img').length) {
                            $chosenOption.prepend('<img src="' + imageSrc + '" />');
                        }
                    }
                });
            }
            $('#country-selector').on('chosen:showing_dropdown', addImagesToChosen);
            $('#country-selector').on('change', function() {
                var value = $(this).find('option:selected').attr('value');
                $('.chosen-single span').html($(this).attr('label'));
                var selectedCountry = $(this).find('option:selected');
                var imgsrc = selectedCountry.attr('data-image');
                $('#country-selector .chosen-container .chosen-single img').attr('src', imgsrc);
                // Get the image URL from the data attribute
                //var imgSrc = selectedCountry.data('img-src');
                $('.ville-p').addClass('hidden');
                $('#' + value).removeClass('hidden');
            })

            $(".chosenoptgroup").chosen();
            $(".chosenoptgroup").on('change', function(event, el) {
                var textdisplay_element = $(".chosenoptgroup + .chosen-container .chosen-single > span");
                var selected_element = $(".chosenoptgroup option:selected");
                var selected_value = selected_element.val();
                if (selected_element.closest('optgroup').length > 0) {
                    var parent_optgroup = selected_element.closest('optgroup').attr('label');
                    textdisplay_element.text(parent_optgroup + ' ' + selected_value).trigger(
                        "chosen:updated");
                }
            });


            var selectedOption = $('#country-selector option:selected');
            var selectedImage = selectedOption.data('image');
            if (selectedImage) {
                $('#country-selector .chosen-container .chosen-single').prepend('<img src="' + selectedImage +
                    '" />');
            }
        });
    </script>
    <script type="text/javascript">
        function setFocus(on) {
            var element = document.activeElement;
            if (on) {
                setTimeout(function() {
                    element.parentNode.classList.add("focus");
                });
            } else {
                let box = document.querySelector(".input-box");
                box.classList.remove("focus");
                $("input").each(function() {
                    var $input = $(this);
                    var $parent = $input.closest(".input-box");
                    if ($input.val()) $parent.addClass("focus");
                    else $parent.removeClass("focus");
                });
            }
        }
        $(window).on('load', function() {
            $('#text-chosen').on('change', function(evt, params) {
                var selectedValue = $(this).val(); // Fetch the selected value
                if (selectedValue == 1) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la planification des entretiens.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les entretiens, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 2) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la planification des tests techniques.<br><br> Nous vous à sélectionner les candidats figurant sur la shortlist afin de planifier les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 3) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la planification des tests de personnalité.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 4) {
                    $('.content-ckeditor').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message a été généré automatiquement pour vous rappeler la programmation des quiz.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de planifier les quiz, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
            });

            $('#text-chosen2').on('change', function(evt, params) {
                var selectedValue = $(this).val(); // Fetch the selected value
                if (selectedValue == 1) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel pour la planification des entretiens.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les entretiens, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 2) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel concernant la planification des tests techniques.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 3) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel concernant la planification des tests de personnalité.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les tests, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
                if (selectedValue == 4) {
                    $('.content-ckeditor2').html('Cher client,<br><br>\n' +
                        '\n' +
                        '                                                Ce message constitue un second rappel concernant la planification des quiz.<br><br> Nous vous invitons à sélectionner les candidats figurant sur la shortlist afin de programmer les quiz, en précisant le mode, le lieu ou le lien correspondant.<br><br>\n' +
                        '\n' +
                        '                                                Cordialement,<br><br>\n' +
                        '                                                Soundousse BELYAZID<br>\n' +
                        '                                                Coordinatrice de projet recrutement'
                    );
                }
            });
            const video = document.getElementById("myVideo");
            const playPauseButton = document.getElementById("playPause");
            //const stopButton = document.getElementById("stop");
            const rewindButton = document.getElementById("rewind");
            //const fastForwardButton = document.getElementById("fastForward");
            const seekBar = document.getElementById("seekBar");
            const timeDisplay = document.getElementById("timeDisplay");
            const muteButton = document.getElementById("mute");
            const volumeBar = document.getElementById("volumeBar");
            const videoContainer = document.getElementById("myVideo")
                .parentElement; // Fullscreen on the video container
            const fullscreenButton = document.getElementById("fullscreen");

            // Fullscreen toggle function
            fullscreenButton.addEventListener("click", function() {
                if (!document.fullscreenElement) {
                    if (videoContainer.requestFullscreen) {
                        videoContainer.requestFullscreen();
                    } else if (videoContainer.mozRequestFullScreen) { // Firefox
                        videoContainer.mozRequestFullScreen();
                    } else if (videoContainer.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                        videoContainer.webkitRequestFullscreen();
                    } else if (videoContainer.msRequestFullscreen) { // IE/Edge
                        videoContainer.msRequestFullscreen();
                    }
                    //fullscreenButton.textContent = "Exit Fullscreen";
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) { // Firefox
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) { // Chrome, Safari, and Opera
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) { // IE/Edge
                        document.msExitFullscreen();
                    }
                    //fullscreenButton.textContent = "Fullscreen";
                }
            });

            // Play/Pause toggle
            playPauseButton.addEventListener("click", function() {
                if (video.paused) {
                    video.play();
                    playPauseButton.innerHTML = '<i class="bi bi-pause-fill h2"></i>';
                } else {
                    video.pause();
                    playPauseButton.innerHTML = '<i class="bi bi-play-fill h2"></i>';
                }
            });

            // Stop the video
            /*stopButton.addEventListener("click", function() {
                video.pause();
                video.currentTime = 0;
                playPauseButton.textContent = "Play";
            });*/

            // Rewind 10 seconds
            rewindButton.addEventListener("click", function() {
                video.currentTime -= 10;
            });

            // Fast forward 10 seconds
            /* fastForwardButton.addEventListener("click", function() {
                 video.currentTime += 10;
             });*/

            // Update the seek bar as the video plays
            video.addEventListener("timeupdate", function() {
                const value = (100 / video.duration) * video.currentTime;
                seekBar.value = value;
                updateDisplayTime(video.currentTime);
                seekBar.style.background =
                    `linear-gradient(to right, #025ec7 ${value}%, #a7a0a05c ${value}%)`;
            });

            // Seek video when user changes the seek bar
            seekBar.addEventListener("input", function() {
                const time = (seekBar.value * video.duration) / 100;
                video.currentTime = time;

            });

            // Mute/Unmute toggle
            muteButton.addEventListener("click", function() {
                video.muted = !video.muted;
                muteButton.innerHTML = video.muted ? '<i class="bi bi-volume-mute h4"></i>' :
                    '<i class="bi bi-volume-up h4"></i>';
                if (video.muted) {
                    volumeBar.value = 0;
                } else {
                    volumeBar.value = video.volume;
                }
            });
            volumeBar.style.background = `linear-gradient(to right, #025ec7 100%, #a7a0a05c 100%)`;
            // Adjust the volume
            volumeBar.addEventListener("input", function() {
                const value = volumeBar.value * 100
                video.volume = volumeBar.value;
                volumeBar.style.background =
                    `linear-gradient(to right, #025ec7 ${value}%, #a7a0a05c ${value}%)`;
            });

            // Update time display
            function updateDisplayTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = Math.floor(seconds % 60);
                timeDisplay.textContent = `${minutes}:${remainingSeconds.toString().padStart(2, "0")}`;
            }

            $(".volume-show").mouseenter(function() {
                $('#volumeBar').removeClass('hidden');
            });
            $(".volume-show").mouseleave(function() {
                $('#volumeBar').addClass('hidden');
            });
        })
    </script>
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

        .ck.ck-editor__main {
            height: 219px;
            overflow: hidden;
            overflow-y: scroll;
        }

        .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline p {
            text-align: justify;
        }

        .custom-color-icon i {
            color: #005dc7 !important;
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

        /******************Custom Video control ***********************/

        .custom-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .custom-controls i {
            color: #025ec7 !important;
        }

        .custom-controls.controls2 i {
            color: #04448d !important;
        }

        button,
        input[type="range"] {
            cursor: pointer;
        }

        input[type="range"] {
            width: 150px;
        }

        .controls1 input[type="range"] {
            width: 80%;
        }

        #timeDisplay {
            font-family: monospace;
        }

        #seekBar,
        #volumeBar {
            appearance: none;
            height: 3px;
            background: linear-gradient(to right, #025ec7 0%, #025ec7 0%, #a7a0a05c 0%, #a7a0a05c 100%);
            border-radius: 5px;
            outline: none;
            cursor: pointer;
        }

        #seekBar {

            width: 100%;
        }

        #seekBar::-webkit-slider-runnable-track,
        #volumeBar::-webkit-slider-runnable-track {
            height: 8px;
            border-radius: 5px;
        }

        #seekBar::-webkit-slider-thumb,
        #volumeBar::-webkit-slider-thumb {
            -webkit-appearance: none;
            background-color: #025ec7;
            /* Color of the thumb */
            height: 12px;
            width: 12px;
            border-radius: 50%;
            margin-top: -1px;
            cursor: pointer;
        }

        #seekBar::-moz-range-track,
        #volumeBar::-moz-range-track {
            height: 8px;
            border-radius: 5px;
        }

        #seekBar::-moz-range-thumb,
        #volumeBar::-moz-range-thumb {
            background-color: #025ec7;
            /* Color of the thumb */
            height: 16px;
            width: 16px;
            border-radius: 50%;
            cursor: pointer;
        }

        #seekBar::-ms-track,
        #volumeBar::-ms-track {
            background: transparent;
            border-color: transparent;
            color: transparent;
            height: 8px;
        }

        #seekBar::-ms-thumb,
        #volumeBar::-ms-thumb {
            background-color: #0b0f1f;
            /* Color of the thumb */
            height: 16px;
            width: 16px;
            border-radius: 50%;
            cursor: pointer;
        }

        #seekBar:focus,
        #volumeBar:focus {
            outline: none;
        }

        video {
            width: 100%;
            height: auto;
        }

        :fullscreen video {
            width: 100vw;
            height: 100vh;
        }

        video::-webkit-media-controls {
            display: none !important;
        }

        video::-moz-media-controls {
            display: none !important;
        }

        /****************************************/

        .cover-cusomer figure {
            width: 64px !important;
            height: 64px !important;
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
            border: 2px solid #005dc7;
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
            color: #005dc7;
            top: -8px;
            background: #fff;
            font-size: 11px;
            transition: 250ms;
        }

        [type=time]::-webkit-calendar-picker-indicator {
            color: #005dc7 !important;
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
            border: 2px solid #005dc7;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 2px 9px;
            background-color: var(--adminux-theme-bg);
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

        #country-selector .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector .chosen-single span {
            float: left
        }

        .poste-chosen .chosen-single span {
            font-size: 14px !important;
        }

        .h-150 {
            height: 77px !important;
            width: 192px !important;
            margin-top: 10px !important;
        }

        .poste-chosen .chosen-container.chosen-container-single {
            padding: 2px 9px;
            background-color: var(--adminux-theme-bg);
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

        #country-selector .chosen-single img {
            width: 30px !important;
            margin-right: 8px;
            float: left;
            height: 21px
        }

        #country-selector .chosen-single span {
            float: left
        }

        .poste-chosen .chosen-single span {
            font-size: 14px !important;
        }

        .email-chosen .chosen-single {
            padding: 9px 10px !important;
        }

        .chosen-withing .rounded .chosen-container.chosen-container-single {
            width: 100px !important;
        }

        .title.custom-title {
            border-bottom: 0 !important;
        }

        .title.custom-title:after {
            width: 63px !important;
        }

        .email-chosen div b {
            margin-top: 6px !important;
        }

        a.consulter-btn {
            background-color: #2b46c5
        }

        a.consulter-btn:hover {
            background-color: #000
        }

        .doughnutchart .countvalue {
            position: absolute;
            top: 3px !important;
            left: 10px !important;
            height: 80px;
            width: 80px;
            border-radius: 70px;
            display: flex;
            align-items: center;
            text-align: center;
            margin: 0 auto;
            background-color: transparent !important;
            z-index: 0;
        }

        @media (min-width: 1400px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1594px;
            }
        }
    </style>
