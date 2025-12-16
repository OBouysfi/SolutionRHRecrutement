@extends('layouts.master')

@section('title', __('generated.Personnalisation'))

@section('css_header')

@endsection

@section('content')
<main class="main mainheight">
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0">{{ __("generated.Paramètre") }}</h5>
            </div>
            {{-- <div class="col col-sm-auto">
                <div class="input-group input-group-md">
                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                    <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                </div>
            </div> --}}
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                 title="{{ __("generated.contact") }}">
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
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                </figure>
            </div>
            <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.Chatbot") }}">
                <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                    style="background-image: url(&quot;../assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                    <img src="{{asset('../assets/img/icon/HJ_icon_green_black.png')}}" alt="" style="display: none;">
                </figure>
            </div>
            <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
                    style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{asset('../assets/img/icon/faciliti.png')}}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-theme">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Personnalisation") }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row mb-4">
            <div class="col text-center">
                <h3>{{ __("generated.Prenez-vous") }} <span class="text-gradient">{{ __("generated.plaisir à travailler") }}</span> {{ __("generated.dans votre environnement") }} <span class="text-gradient">{{ __("generated.préféré") }} </span>?</h3>
                <p class="lead text-secondary" style="opacity: 0.8;">{{ __("generated.Pourquoi pas dans l'application") }} ? {{ __("generated.Personnalisez-la maintenant") }}.</p>
            </div>
        </div>
        <div class="row mb-5 md-xl-5 align-items-center">
            <div class="col-auto mx-auto col-xxl-auto px-5 position-relative mt-4">
                <div class="personalise-colors personalise-preview  bg-gradient-theme-light">
                    <div class="colors-wrapper">
                        <div class="main-overlay-bg mt-0">
                            <div class="sidebar-wrap"></div>
                            <div class="main-content-bg">
                                <div class="line">{{ __("generated.Cette zone") }} </div>
                                <div class="line text-secondary">{{ __("generated.Couleurs prédéfinies") }}</div>
                                <div class="card border-0 p-2">
                                    <div class="line">{{ __("generated.Essayez-le") }} !</div>
                                    <div class="button-bg bg-theme"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center no-rtl">
                    <div class="col-auto ">{{ __("generated.Clair") }}</div>
                    <div class="col-auto px-0">
                        <div class="form-check form-switch sunmoon">
                            <input class="form-check-input" type="checkbox" role="switch" id="btn-layout-modes-dark">
                            <label class="form-check-label" for="btn-layout-modes-dark">
                                <i class="bi bi-brightness-low sun"></i>
                                <i class="bi bi-moon-stars moon"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">{{ __("generated.Sombre") }}</div>
                </div>
            </div>
            <div class="col-12 col-xxl">
                <ul class="personalise-color-list">
                    <li data-title="theme-blue">
                        <div class="personalise-colors bg-blue">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-blue"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Bleu") }}</p>
                    </li>
                    <li data-title="theme-indigo">
                        <div class="personalise-colors bg-indigo">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-indigo"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Indigo") }}</p>
                    </li>
                    <li data-title="theme-purple">
                        <div class="personalise-colors bg-purple">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-purple"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Violet") }}</p>
                    </li>
                    <li data-title="theme-pink">
                        <div class="personalise-colors bg-pink">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-pink"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Rose") }}</p>
                    </li>
                    <li data-title="theme-red">
                        <div class="personalise-colors bg-red">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-red"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Rouge") }}</p>
                    </li>
                    <li data-title="theme-orange">
                        <div class="personalise-colors bg-orange">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-orange"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Orange") }}</p>
                    </li>
                    <li data-title="theme-yellow">
                        <div class="personalise-colors bg-yellow">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-yellow"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Jaune") }}</p>
                    </li>
                    <li data-title="theme-green">
                        <div class="personalise-colors bg-green">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-green"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Vert") }}</p>
                    </li>
                    <li data-title="theme-teal">
                        <div class="personalise-colors bg-teal">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-teal"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Turquoise") }}</p>
                    </li>
                    <li data-title="theme-cyan">
                        <div class="personalise-colors bg-cyan">
                            <div class="colors-wrapper">
                                <div class="main-overlay-bg">
                                    <div class="main-content-bg">
                                        <div class="line">{{ __("generated.Texte ici") }}</div>
                                        <div class="line text-secondary">{{ __("generated.Ligne de texte deux ici") }}</div>
                                        <div class="card border-0 p-2">
                                            <div class="line">{{ __("generated.Texte ici") }}</div>
                                            <div class="button-bg bg-cyan"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center">{{ __("generated.Cyan") }}</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Mixed match -->
        <div class="row mb-4">
            <div class="col text-center">
                <h3>{{ __("generated.Les utilisateurs") }} <span class="text-gradient">{{ __("generated.choisissent le meilleur") }}</span> {{ __("generated.choix") }}.</h3>
                <p class="lead text-secondary">{{ __("generated.Personnalisez et optez pour le meilleur") }} !</p>
                <p class="lead text-secondary"></p>
            </div>
        </div>

        <!-- Colors Background Sidebar settings -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="accordion accordion-theme" id="personalizeAccord">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="personalizeAccorHdOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#personalizeAccordOne" aria-expanded="false" aria-controls="personalizeAccordOne">
                                {{ __("generated.Couleur du thème") }}
                            </button>
                        </h2>
                        <div id="personalizeAccordOne" class="accordion-collapse collapse" aria-labelledby="personalizeAccorHdOne" data-bs-parent="#personalizeAccord">
                            <div class="accordion-body">
                                <div class="row" id="theme-select">
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2 active" data-title="theme-blue">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-blue"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Bleu") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-indigo">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-indigo"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Indigo") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-purple">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-purple"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Violet") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-pink">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-pink"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Rose") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-red">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-red"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Rouge") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-orange">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-orange"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Orange") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-yellow">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-yellow"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Jaune") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-green">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-green"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Vert") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-teal">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-teal"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Turquoise") }}</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="select-box text-center mb-2" data-title="theme-cyan">
                                            <div class="avatar avatar-60">
                                                <span class="avatar avatar-40 bg-cyan"></span>
                                            </div>
                                            <p class="small">{{ __("generated.Cyan") }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="personalizeAccordHThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#personalizeAccordThree" aria-expanded="false" aria-controls="personalizeAccordThree">
                                {{ __("generated.Couleur du menu") }}
                            </button>
                        </h2>
                        <div id="personalizeAccordThree" class="accordion-collapse collapse" aria-labelledby="personalizeAccordHThree" data-bs-parent="#personalizeAccord">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="personalise-colors personalise-preview-sidebar" data-title="">
                                            <div class="colors-wrapper">
                                                <figure class="coverimg h-100 w-100 position-absolute mb-0 main-bg" style="background-image: url(&quot;../assets/img/bg-10.jpg&quot;);">
                                                    <img src="../assets/img/bg-14.jpg" alt="">
                                                </figure>
                                                <div class="main-overlay-bg">
                                                    <div class="main-content-bg">
                                                        <div class="line">{{ __("generated.Barre latérale") }}</div>
                                                        <div class="line text-secondary">{{ __("generated.Couleur par défaut") }}</div>
                                                        <div class="card border-0 p-2">
                                                            <div class="line">{{ __("generated.Essayez-le") }} !</div>
                                                            <div class="button-bg bg-theme"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="personalise-colors personalise-preview-sidebar sidebar-filled" data-title="sidebar-filled">
                                            <div class="colors-wrapper">
                                                <figure class="coverimg h-100 w-100 position-absolute mb-0 main-bg" style="background-image: url(&quot;../assets/img/bg-10.jpg&quot;);">
                                                    <img src="../assets/img/bg-14.jpg" alt="">
                                                </figure>
                                                <div class="main-overlay-bg">
                                                    <div class="sidebar-preview main"></div>
                                                    <div class="main-content-bg">
                                                        <div class="line">{{ __("generated.Barre latérale") }}</div>
                                                        <div class="line text-secondary">{{ __("generated.Couleur du thème") }}</div>
                                                        <div class="card border-0 p-2">
                                                            <div class="line">{{ __("generated.Essayez-le") }} !</div>
                                                            <div class="button-bg bg-theme"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="personalise-colors personalise-preview-sidebar" data-title="sidebar-filled-theme">
                                            <div class="colors-wrapper">
                                                <figure class="coverimg h-100 w-100 position-absolute mb-0 main-bg" style="background-image: url(&quot;../assets/img/bg-10.jpg&quot;);">
                                                    <img src="../assets/img/bg-14.jpg" alt="">
                                                </figure>
                                                <div class="main-overlay-bg">
                                                    <div class="sidebar-preview bg-theme"></div>
                                                    <div class="main-content-bg">
                                                        <div class="line">{{ __("generated.Barre latérale") }}</div>
                                                        <div class="line text-secondary">{{ __("generated.Couleur du thème") }}</div>
                                                        <div class="card border-0 p-2">
                                                            <div class="line">{{ __("generated.Essayez-le") }} !</div>
                                                            <div class="button-bg bg-theme"></div>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="personalizeAccordHFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#personalizeAccordFour" aria-expanded="false" aria-controls="personalizeAccordFour">
                                {{ __("generated.Style du menu") }}
                            </button>
                        </h2>
                        <div id="personalizeAccordFour" class="accordion-collapse collapse" aria-labelledby="personalizeAccordHFour" data-bs-parent="#personalizeAccord">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="sidebarstyle card border-0 shadow-sm" data-title="sidebar-pushcontent">
                                            <div class="card-body bg-none">
                                                <img src="../assets/img/supportive-pages/sidebar-pushcontent.png" alt="" class="w-100 rounded border mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col text-center">
                                                        <h5>{{ __("generated.Pousser le contenu") }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="sidebarstyle card border-0 shadow-sm" data-title="sidebar-overlay">
                                            <div class="card-body bg-none">
                                                <img src="../assets/img/supportive-pages/sidebar-overlay.png" alt="" class="w-100 rounded border mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col text-center">
                                                        <h5>{{ __("generated.Superposition") }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="sidebarstyle card border-0 shadow-sm" data-title="sidebar-fullscreen">
                                            <div class="card-body bg-none">
                                                <img src="../assets/img/supportive-pages/sidebar-pushcontent.png" alt="" class="w-100 rounded border mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col text-center">
                                                        <h5>{{ __("generated.Plein écran") }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto py-3 py-lg-0">
                                        <div class="sidebarstyle card border-0 shadow-sm" data-title="sidebar-icon-only">
                                            <div class="card-body bg-none">
                                                <img src="../assets/img/supportive-pages/sidebar-pushcontent.png" alt="" class="w-100 rounded border mb-3">
                                                <div class="row align-items-center">
                                                    <div class="col text-center">
                                                        <h5>{{ __("generated.Juste les Icones") }}</h5>
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

        <!-- RTL -->
        <div class="row justify-content-center align-items-center no-rtl">
            <!-- avoid rtl direction in some cases when rtl selected by adding "no-rtl" class -->
            <div class="col-auto ">{{ __("generated.LTR") }}</div>
            <div class="col-auto px-0">
                <div class="form-check form-switch rtlcheck">
                    <input class="form-check-input" type="checkbox" role="switch" id="btn-layout-RTL">
                    <label class="form-check-label" for="btn-layout-RTL">
                        <i class="bi bi-justify-left ltrjustify"></i>
                        <i class="bi bi-justify-right rtljustify"></i>
                    </label>
                </div>
            </div>
            <div class="col-auto">{{ __("generated.RTL") }}</div>
        </div>

    </div>

</main>

@endsection

@section('js_footer')
    
@endsection
