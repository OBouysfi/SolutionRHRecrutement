@extends('candidate_portal.layouts.second')

@section('title', __('generated.Aperçu'))
@section('css_header')
    <style>
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
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('candidate-portal.Curriculum Vitae') }}</h5>
                </div>
                 <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
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
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('candidate-portal.Détail CV') }} : {{ $profile->first_name }} {{ $profile->last_name }}
                </li>
            </ol>
        </nav>
       


        <div id="print-section" class="d-none">
            @include('candidate_portal.profile.printProfile')
        </div>

        <div class="modal fade" id="emailcompose" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <h6 class="mb-4 text-center">{{ __('candidate-portal.Envoyez un lien de cette page par email.') }}</h6>
                        <!-- Formulaire pour envoyer l'email -->
                        <form action="{{ route('send.share.email') }}" method="POST">
                            @csrf
                            <input type="hidden" name="page_url" value="{{ url()->current() }}">
                            <input type="hidden" name="message" value="Voici le lien de la page que vous m'avez demandé :">

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('candidate-portal.À') }} :</label>
                                <input type="text" name="to" class="form-control"
                                    placeholder="{{ __('candidate-portal.Entrez les adresses email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('candidate-portal.CC') }} :</label>
                                <input type="text" name="cc" class="form-control"
                                    placeholder="{{ __('candidate-portal.Entrez les adresses en CC') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary">{{ __('candidate-portal.Objet') }} :</label>
                                <input type="text" name="subject" class="form-control"
                                    placeholder="{{ __('candidate-portal.Entrez le sujet de l\'email') }}" required>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="bi bi-trash h4 me-2"></i> {{ __('candidate-portal.Annuler') }}
                                </button>
                                <button class="btn btn-theme" type="submit">
                                    <i class="bi bi-send me-2"></i> {{ __('candidate-portal.Envoyer') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-lg-3 mb-4">
                    <div class="card border-0" style="height: 100%;">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-auto ms-auto" style="margin-right: 3px;">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical" style="font-size: 19px"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" style="min-width: 10px;">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('candidate-portal.profile.edit') }}" target="_blank">
                                                    {{ __('candidate-portal.Modifier') }}
                                                </a>
                                            </li>
                                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#emailcompose">{{ __('candidate-portal.Partager') }}</a></li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    onclick="printExternalPage('{{ route('candidate-portal.profile.cv.print', $profile->id) }}')">{{ __('candidate-portal.Imprimer') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-7 mb-2">
                                    <figure class="avatar coverimg custom-cv-img vm"
                                        style="background-image: url('
                                            @if ($profile->path_picture) {{ asset('storage/' . $profile->path_picture) }}
                                            @else
                                                {{ $profile->sexe == 'Homme' ? asset('assets/img/male-perso-default.webp') : asset('assets/img/female-perso-default.jpg') }} @endif
                                        ');">
                                        <img src="
                                            @if ($profile->path_picture) {{ asset('storage/' . $profile->path_picture) }}
                                            @else
                                                {{ $profile->sexe == 'Homme' ? asset('assets/img/male-perso-default.webp') : asset('assets/img/female-perso-default.jpg') }} @endif
                                        "
                                            alt="" style="display: none;">
                                    </figure>
                                </div>

                                <div class="row justify-content-center mt-3">
                                    <p style="text-align: center;font-weight: 700;font-size: 25px;margin-bottom: 2px;">
                                        {{ $profile->first_name && $profile->last_name ? $profile->first_name . ' ' . $profile->last_name : '_' }}
                                    </p>

                                    <p class="text-secondary" style="text-align: center;">
                                        {{ $profile->profession->label ?? ' - ' }}</p>
                                </div>
                                <div class="row justify-content-center" style="margin-top: 14px !important;">
                                    <div class="col">
                                        <ul class="nav justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link px-2" href="{{ __($profile->url_facebook) }}"
                                                    target="_blank">
                                                    <i class="bi bi-facebook h3"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-2" href="{{ __($profile->url_twitter) }}"
                                                    target="_blank">
                                                    <i class="bi bi-twitter-x h3"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-2" href="{{ __($profile->url_linkedin) }}"
                                                    target="_blank">
                                                    <i class="bi bi-linkedin h3"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body pb-0 custom-color-icon"
                                        style="padding-left: 36px;margin-top: 40px;">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-telephone h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">{{ __('candidate-portal.Téléphone') }}</p>
                                                <p>{{ $profile->phone_primary ?? ' - ' }}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-envelope h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">{{ __('candidate-portal.E-mail') }}</p>
                                                <p>{{ $profile->email ?? '_' }}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-calendar2-heart h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">{{ __('candidate-portal.Date de naissance') }}</p>
                                                <p>{{ \Carbon\Carbon::parse($profile->birth_date)->format('d/m/Y') ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-geo h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">{{ __('candidate-portal.Lieu de naissance') }}</p>
                                                <p>{{ __($profile->birth_place) }}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-globe h5 text-theme mb-0"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1">{{ __('candidate-portal.Nationalité') }}</p>
                                                <p>{{ __($profile?->nationality_name?->name) }}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-auto">
                                                <i class="bi bi-person-hearts h5 text-theme mb-0">
                                                </i>
                                            </div>
                                            <div class="col">
                                                <p class="text-secondary small mb-1 ">
                                                    {{ __('candidate-portal.Situation familiale') }}</p>
                                                <p>{{ $profile?->family_situation ?? ' - ' }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                               <div class="row mt-5">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card border-0 mb-4">
                                            <div class="card-body">
                                                <a
                                                    href="{{ route('candidate-portal.detail.matching.cover.letter.preview', $profile?->id) }}">
                                                    <div class="row gx-3 align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-blue text-white">
                                                                <i class="bi bi-file-earmark-text h5 vm"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-1 ">
                                                                {{ __('generated.Lettre de motivation') }}</h6>
                                                            <p class="text-secondary ">{{ __('generated.Candidat') }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card border-0 mb-4">
                                            <div class="card-body">
                                                <a href="{{ route('candidate-portal.detail.matching.cv.preview', $profile?->id) }}">
                                                    <div class="row gx-3 align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-red text-white">
                                                                <i class="bi bi-layout-text-sidebar-reverse h5 vm"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-1 ">
                                                                {{ __('generated.Curriculum Vitae') }}</h6>
                                                            <p class="text-secondary ">{{ __('generated.Candidat') }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9 mb-4">
                    <div class="card border-0">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist"
                                style="width: 100%; border-radius: 0; font-size: 18px;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="cv-tab" data-bs-toggle="tab"
                                        data-bs-target="#cv" type="button" role="tab" aria-controls="cv"
                                        aria-selected="true">{{ __('candidate-portal.CV') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cvvideo-tab" data-bs-toggle="tab"
                                        data-bs-target="#cvvideo" type="button" role="tab" aria-controls="cvvideo"
                                        aria-selected="false">{{ __('candidate-portal.CV vidéo') }} </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card border-0 mt-5">
                        <div class="card-body">
                            <div class="tab-content" id="navtabscard30Content">
                                <!-- Tab Content: CV -->
                                <div class="tab-pane fade show active" id="cv" role="tabpanel"
                                    aria-labelledby="cv-tab">
                                    <div class="row mb-5 mt-2">
                                        <ul class="nav nav-tabs nav-adminux nav-lg justify-content-center" id="myTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="informations-tab"
                                                    data-bs-toggle="tab" data-bs-target="#informations" type="button"
                                                    role="tab" aria-controls="informations"
                                                    aria-selected="true">{{ __('candidate-portal.Informations') }}</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="formations-tab" data-bs-toggle="tab"
                                                    data-bs-target="#formations" type="button" role="tab"
                                                    aria-controls="formations" aria-selected="false"> {{ __('candidate-portal.Formations') }} </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="experiences-tab" data-bs-toggle="tab"
                                                    data-bs-target="#experiences" type="button" role="tab"
                                                    aria-controls="experiences" aria-selected="false">{{ __('candidate-portal.Expériences') }}</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="competences-tab" data-bs-toggle="tab"
                                                    data-bs-target="#competences" type="button" role="tab"
                                                    aria-controls="competences" aria-selected="false">{{ __('candidate-portal.Compétences') }} </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="langues-tab" data-bs-toggle="tab"
                                                    data-bs-target="#langues" type="button" role="tab"
                                                    aria-controls="langues" aria-selected="false">{{ __('candidate-portal.Langues') }} </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="recommandations-tab" data-bs-toggle="tab"
                                                    data-bs-target="#recommandations" type="button" role="tab"
                                                    aria-controls="recommandations"
                                                    aria-selected="false">{{ __('candidate-portal.Recommandations') }}</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="lettre-tab" data-bs-toggle="tab"
                                                    data-bs-target="#lettre" type="button" role="tab"
                                                    aria-controls="lettre" aria-selected="false">{{ __('candidate-portal.Lettre de motivation') }} </button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="informations" role="tabpanel"
                                            aria-labelledby="informations-tab">
                                            @include('candidate_portal.profile.inc.listing.informations')
                                            @include('candidate_portal.profile.inc.listing.mobility')
                                        </div>
                                        <div class="tab-pane fade" id="formations" role="tabpanel"
                                            aria-labelledby="formations-tab">
                                            @include('candidate_portal.profile.inc.listing.formations')
                                        </div>
                                        <div class="tab-pane fade" id="experiences" role="tabpanel"
                                            aria-labelledby="experiences-tab">
                                            @include('candidate_portal.profile.inc.listing.experiences')
                                        </div>
                                        <div class="tab-pane fade" id="competences" role="tabpanel"
                                            aria-labelledby="competences-tab">
                                            @include('candidate_portal.profile.inc.listing.technicalCompetences')
                                            @include('candidate_portal.profile.inc.listing.personalCompetences')
                                        </div>
                                        <div class="tab-pane fade" id="langues" role="tabpanel"
                                            aria-labelledby="langues-tab">
                                            @include('candidate_portal.profile.inc.listing.languages')
                                        </div>
                                        <div class="tab-pane fade" id="recommandations" role="tabpanel"
                                            aria-labelledby="recommandations-tab">
                                            @include('candidate_portal.profile.inc.listing.recommandations')
                                        </div>
                                        <div class="tab-pane fade" id="lettre" role="tabpanel"
                                            aria-labelledby="lettre-tab">
                                            @include('candidate_portal.profile.inc.listing.coverLetter')
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Content: CV Vidéo -->
                                <div class="tab-pane fade" id="cvvideo" role="tabpanel" aria-labelledby="cvvideo-tab">
                                    @include('candidate_portal.profile.inc.listing.cvVideo')
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
@include('profile.inc.translation')

    <script>
        function saveTabAndGo(tabId) {
            localStorage.setItem('activeTab', tabId); // Save selected tab
            window.location.href = '/candidate-portal/profiles'; // Redirect to the next page
        }
    </script>

    <script type="text/javascript">
        window.printPage = function() {
            var printContent = document.getElementById('print-section').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();


            function onafterprint() {
                document.body.innerHTML = originalContent;
                window.location.reload();
            };
            onafterprint();
        }

        $(window).on('load', function() {
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
    
    <script>
        function printExternalPage(url) {
            const printWindow = window.open(url, '_blank');
            printWindow.focus();

            printWindow.onload = function () {
                printWindow.print();
            };
        }

        function downloadPDF() {
            const element = document.getElementById('printable-content');

            const opt = {
                margin:       0.5,
                filename:     'job_offer.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save();
        }
    </script>

@endsection
