@extends('layouts.master')

@section('title', 'Créer ou modifier un test')
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

        /* Optionnel : changer la couleur de l'icône en dark mode */
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
                    <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Créer ou modifier un test") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <form id="form-test" method="post" action="{{ route('api.testsTechniques.store.data') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-4 justify-content-center">
                    <div class="col-4">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <h6 class="title custom-title mb-4 ">{{ __("generated.Caractéristiques du test") }}</h6>

                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div class="form-group position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <select class="form-select border-0" id="click2e3"
                                                                        name="language" style="padding-top: 24px;">
                                                                        <option value="-1">{{ __("generated.Toutes les langues") }}</option>
                                                                        <option value="3">{{ __("generated.Allemand") }}</option>
                                                                        <option value="2">{{ __("generated.Anglais") }}</option>
                                                                        <option value="8">{{ __("generated.Arabe") }}</option>
                                                                        <option value="5">{{ __("generated.Espagnol") }}</option>
                                                                        <option value="1"
                                                                            selected>{{ __("generated.Français") }}</option>
                                                                        <option value="7">{{ __("generated.Grec") }}</option>
                                                                        <option value="6">{{ __("generated.Italien") }}</option>
                                                                        <option value="4">{{ __("generated.Néerlandais") }}</option>
                                                                    </select>
                                                                    <label class="hidlab ">{{ __("generated.Langue") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div class="form-group position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <select class="form-select border-0" id="click2e3"
                                                                        name="group" style="padding-top: 24px;">
                                                                        @foreach ($groups as $key => $grp)
                                                                            <option value="{{ $grp }}"
                                                                                {{ isset($test) && $test->group == $grp ? 'selected' : '' }}>
                                                                                {{ $grp }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label class="hidlab translated_text">Groupe</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div class="form-group position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <select class="form-select border-0" id="click2e3"
                                                                        name="category" style="padding-top: 24px;">

                                                                        @foreach ($categories as $key => $value)
                                                                            <option value="{{ $value }}"
                                                                                {{ isset($test) && $test->category == $key ? 'selected' : '' }}>
                                                                                {{ $value }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                    <label class="hidlab translated_text">Catégorie</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="list-group list-group-flush bg-none">
                                                            <li class="list-group-item text-secondary">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="ordered_questions"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9 ps-0">
                                                                        <p style="color: #6e777f;"
                                                                            >{{ __("generated.Questions Ordonné") }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item text-secondary">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="random_questions"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9 ps-0">
                                                                        <p style="color: #6e777f;"
                                                                            >{{ __("generated.Questions Aléatoire") }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item text-secondary">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="question_navigation"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9 ps-0">
                                                                        <p style="color: #6e777f;"
                                                                            >{{ __("generated.Navigation entre les questions") }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item text-secondary">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="show_question_list"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-9 ps-0">
                                                                        <p style="color: #6e777f;"
                                                                            >{{ __("generated.Afficher la liste des questions") }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item text-secondary">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox"
                                                                                name="show_read_question_button"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10 ps-0">
                                                                        <p style="color: #6e777f;"
                                                                            >{{ __("generated.Afficher le bouton permettant de lire la question") }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item text-secondary">
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" name="is_active"
                                                                                role="switch" id="rememeberme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10 ps-0">
                                                                        <p style="color: #6e777f;"><span
                                                                                >{{ __("generated.Activer") }}</span> /
                                                                            <span >{{ __("generated.Désactiver") }}</span>
                                                                        </p>
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
                    <div class="col-5">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div
                                                            class="form-group mb-1 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder="Nom du test"
                                                                    name="test_name"
                                                                    value="{{ isset($test) ? $test->test_name : '' }}"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Nom du test") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div
                                                            class="form-group mb-0 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <textarea style="height: 333px !important;" placeholder="{{ __("generated.Description") }}"
                                                                    class="form-control border-start-0 h-auto translated_text" name="description" rows="11">{{ isset($test) ? $test->description : '' }}
                                                            </textarea>
                                                                <label >{{ __("generated.Description") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <div
                                                            class="form-group mb-1 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder="Nom du test"
                                                                    value="{{ isset($test) ? $test->questions_number : '' }}"
                                                                    name="questions_number"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Nombre des questions") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div
                                                            class="form-group mb-1 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder="Nom du test"
                                                                    value="{{ isset($test) ? $test->duration : '' }}"
                                                                    name="duration"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Durée du test") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <div
                                                            class="form-group mb-1 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder=""
                                                                       value="{{ isset($test) ? $test->global_score : '' }}"
                                                                       name="global_score"
                                                                       class="form-control border-start-0 translated_text">
                                                                <label class="translated_text">Score Global</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div
                                                            class="form-group mb-1 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder=""
                                                                       value="{{ isset($test) ? $test->average_score : '' }}"
                                                                       name="average_score"
                                                                       class="form-control border-start-0 translated_text">
                                                                <label class="translated_text">Score moyen</label>
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
                    <div class="col-9 mt-4">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-12 col-md-6 col-lg-12 mt-3">
                                                        <h6 class="title custom-title mb-4 ">{{ __("generated.Message de début") }}</h6>
                                                        <div class="form-control border" id="ckeditor"
                                                            style="display: none;">
                                                        </div>
                                                        <div class="ck ck-reset ck-editor ck-rounded-corners"
                                                            role="application" dir="ltr" lang="en"
                                                            aria-labelledby="ck-editor__label_e58ab4108f6a453214e94130ec15dd7cf">
                                                            <textarea name="start_message" id="editor-start-message" style="display:none;">
                                                                {{ isset($test) ? $test->start_message : '' }}
                                                            </textarea>
                                                            <!-- hidden field to store CKEditor content -->

{{--                                                            <label class="ck ck-label ck-voice-label translated_text"--}}
{{--                                                                id="ck-editor__label_e58ab4108f6a453214e94130ec15dd7cf">Rich--}}
{{--                                                                Text Editor</label>--}}
{{--                                                            <div--}}
{{--                                                                class="ck ck-editor__top ck-reset_all"--}}
{{--                                                                role="presentation">--}}
{{--                                                                <div class="ck ck-sticky-panel">--}}
{{--                                                                    <div class="ck ck-sticky-panel__placeholder"--}}
{{--                                                                        style="display: none;"></div>--}}
{{--                                                                    <div class="ck ck-sticky-panel__content">--}}
{{--                                                                        <div class="ck ck-toolbar ck-toolbar_grouping"--}}
{{--                                                                            role="toolbar" aria-label="Editor toolbar">--}}
{{--                                                                            <div class="ck ck-toolbar__items">--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e2441d1ad084a78787080fded4a2cd1b0"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M10.187 17H5.773c-.637 0-1.092-.138-1.364-.415-.273-.277-.409-.718-.409-1.323V4.738c0-.617.14-1.062.419-1.332.279-.27.73-.406 1.354-.406h4.68c.69 0 1.288.041 1.793.124.506.083.96.242 1.36.478.341.197.644.447.906.75a3.262 3.262 0 0 1 .808 2.162c0 1.401-.722 2.426-2.167 3.075C15.05 10.175 16 11.315 16 13.01a3.756 3.756 0 0 1-2.296 3.504 6.1 6.1 0 0 1-1.517.377c-.571.073-1.238.11-2 .11zm-.217-6.217H7v4.087h3.069c1.977 0 2.965-.69 2.965-2.072 0-.707-.256-1.22-.768-1.537-.512-.319-1.277-.478-2.296-.478zM7 5.13v3.619h2.606c.729 0 1.292-.067 1.69-.2a1.6 1.6 0 0 0 .91-.765c.165-.267.247-.566.247-.897 0-.707-.26-1.176-.778-1.409-.519-.232-1.31-.348-2.375-.348H7z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s "><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Bold--}}
{{--                                                                                            (Ctrl+B)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e2441d1ad084a78787080fded4a2cd1b0">Bold</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e66a55b36a91c9f1623f63f31809dfce7"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m9.586 14.633.021.004c-.036.335.095.655.393.962.082.083.173.15.274.201h1.474a.6.6 0 1 1 0 1.2H5.304a.6.6 0 0 1 0-1.2h1.15c.474-.07.809-.182 1.005-.334.157-.122.291-.32.404-.597l2.416-9.55a1.053 1.053 0 0 0-.281-.823 1.12 1.12 0 0 0-.442-.296H8.15a.6.6 0 0 1 0-1.2h6.443a.6.6 0 1 1 0 1.2h-1.195c-.376.056-.65.155-.823.296-.215.175-.423.439-.623.79l-2.366 9.347z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Italic--}}
{{--                                                                                            (Ctrl+I)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text "--}}
{{--                                                                                        id="ck-editor__aria-label_e66a55b36a91c9f1623f63f31809dfce7">Italic</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_ead267b93ad1439d3671cee73d93a51cc"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m11.077 15 .991-1.416a.75.75 0 1 1 1.229.86l-1.148 1.64a.748.748 0 0 1-.217.206 5.251 5.251 0 0 1-8.503-5.955.741.741 0 0 1 .12-.274l1.147-1.639a.75.75 0 1 1 1.228.86L4.933 10.7l.006.003a3.75 3.75 0 0 0 6.132 4.294l.006.004zm5.494-5.335a.748.748 0 0 1-.12.274l-1.147 1.639a.75.75 0 1 1-1.228-.86l.86-1.23a3.75 3.75 0 0 0-6.144-4.301l-.86 1.229a.75.75 0 0 1-1.229-.86l1.148-1.64a.748.748 0 0 1 .217-.206 5.251 5.251 0 0 1 8.503 5.955zm-4.563-2.532a.75.75 0 0 1 .184 1.045l-3.155 4.505a.75.75 0 1 1-1.229-.86l3.155-4.506a.75.75 0 0 1 1.045-.184z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Link--}}
{{--                                                                                            (Ctrl+K)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_ead267b93ad1439d3671cee73d93a51cc">Link</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button--}}
{{--                                                                                    class="ck ck-button ck-disabled ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e7582babb494e204ce643b7043e928357"--}}
{{--                                                                                    aria-disabled="true">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m5.042 9.367 2.189 1.837a.75.75 0 0 1-.965 1.149l-3.788-3.18a.747.747 0 0 1-.21-.284.75.75 0 0 1 .17-.945L6.23 4.762a.75.75 0 1 1 .964 1.15L4.863 7.866h8.917A.75.75 0 0 1 14 7.9a4 4 0 1 1-1.477 7.718l.344-1.489a2.5 2.5 0 1 0 1.094-4.73l.008-.032H5.042z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Undo--}}
{{--                                                                                            (Ctrl+Z)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e7582babb494e204ce643b7043e928357">Undo</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button--}}
{{--                                                                                    class="ck ck-button ck-disabled ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_ec97fb6cf1fe110aa4cdcd2432ac884fc"--}}
{{--                                                                                    aria-disabled="true">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m14.958 9.367-2.189 1.837a.75.75 0 0 0 .965 1.149l3.788-3.18a.747.747 0 0 0 .21-.284.75.75 0 0 0-.17-.945L13.77 4.762a.75.75 0 1 0-.964 1.15l2.331 1.955H6.22A.75.75 0 0 0 6 7.9a4 4 0 1 0 1.477 7.718l-.344-1.489A2.5 2.5 0 1 1 6.039 9.4l-.008-.032h8.927z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Redo--}}
{{--                                                                                            (Ctrl+Y)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_ec97fb6cf1fe110aa4cdcd2432ac884fc">Redo</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_eaa0b38a69fde4cd8dfb2b01119290545"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0C1 4.784 1.777 4 2.75 4c.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75C1.784 7.5 1 6.723 1 5.75zm6 9c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0c0-.966.777-1.75 1.75-1.75.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75-.966 0-1.75-.777-1.75-1.75z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Bulleted--}}
{{--                                                                                            List</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_eaa0b38a69fde4cd8dfb2b01119290545">Bulleted--}}
{{--                                                                                        List</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e0efa7ecde16d70443e470bcd00aab006"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM3.5 3v5H2V3.7H1v-1h2.5V3zM.343 17.857l2.59-3.257H2.92a.6.6 0 1 0-1.04 0H.302a2 2 0 1 1 3.995 0h-.001c-.048.405-.16.734-.333.988-.175.254-.59.692-1.244 1.312H4.3v1h-4l.043-.043zM7 14.75a.75.75 0 0 1 .75-.75h9.5a.75.75 0 1 1 0 1.5h-9.5a.75.75 0 0 1-.75-.75z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Numbered--}}
{{--                                                                                            List</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e0efa7ecde16d70443e470bcd00aab006">Numbered--}}
{{--                                                                                        List</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e2379b611ff058e008f59bed6410fbc76"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M3 10.423a6.5 6.5 0 0 1 6.056-6.408l.038.67C6.448 5.423 5.354 7.663 5.22 10H9c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574zm8 0a6.5 6.5 0 0 1 6.056-6.408l.038.67c-2.646.739-3.74 2.979-3.873 5.315H17c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Block--}}
{{--                                                                                            quote</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e2379b611ff058e008f59bed6410fbc76">Block--}}
{{--                                                                                        quote</span>--}}
{{--                                                                                </button>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="ck ck-editor__main" role="presentation">--}}
{{--                                                                <div--}}

{{--                                                                    class="ck-blurred ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline"--}}
{{--                                                                    lang="en" dir="ltr" role="textbox"--}}
{{--                                                                    aria-label="Rich Text Editor, main"--}}
{{--                                                                    contenteditable="true">--}}
{{--                                                                    <p><br data-cke-filler="true">--}}
{{--                                                                    </p>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
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

                    <div class="col-9 mt-4">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-12 col-md-6 col-lg-12 mt-3">
                                                        <h6 class="title custom-title mb-4 ">{{ __("generated.Message de fin") }}</h6>
                                                        <div class="form-control border" id="ckeditor"
                                                            style="display: none;">
                                                        </div>
                                                        <div class="ck ck-reset ck-editor ck-rounded-corners"
                                                            role="application" dir="ltr" lang="en"
                                                            aria-labelledby="ck-editor__label_e58ab4108f6a453214e94130ec15dd7cf">

                                                            <textarea name="end_message" id="editor-end-message" style="display:none;">
                                                                {{ isset($test) ? $test->end_message : '' }}
                                                            </textarea>


                                                            {{--                                                            <label class="ck ck-label ck-voice-label translated_text"--}}
{{--                                                                id="ck-editor__label_e58ab4108f6a453214e94130ec15dd7cf">Rich--}}
{{--                                                                Text Editor</label>--}}
{{--                                                            <div--}}
{{--                                                                class="ck ck-editor__top ck-reset_all"--}}
{{--                                                                role="presentation">--}}
{{--                                                                <div class="ck ck-sticky-panel">--}}
{{--                                                                    <div class="ck ck-sticky-panel__placeholder"--}}
{{--                                                                        style="display: none;"></div>--}}
{{--                                                                    <div class="ck ck-sticky-panel__content">--}}
{{--                                                                        <div class="ck ck-toolbar ck-toolbar_grouping"--}}
{{--                                                                            role="toolbar" aria-label="Editor toolbar">--}}
{{--                                                                            <div class="ck ck-toolbar__items">--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e2441d1ad084a78787080fded4a2cd1b0"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M10.187 17H5.773c-.637 0-1.092-.138-1.364-.415-.273-.277-.409-.718-.409-1.323V4.738c0-.617.14-1.062.419-1.332.279-.27.73-.406 1.354-.406h4.68c.69 0 1.288.041 1.793.124.506.083.96.242 1.36.478.341.197.644.447.906.75a3.262 3.262 0 0 1 .808 2.162c0 1.401-.722 2.426-2.167 3.075C15.05 10.175 16 11.315 16 13.01a3.756 3.756 0 0 1-2.296 3.504 6.1 6.1 0 0 1-1.517.377c-.571.073-1.238.11-2 .11zm-.217-6.217H7v4.087h3.069c1.977 0 2.965-.69 2.965-2.072 0-.707-.256-1.22-.768-1.537-.512-.319-1.277-.478-2.296-.478zM7 5.13v3.619h2.606c.729 0 1.292-.067 1.69-.2a1.6 1.6 0 0 0 .91-.765c.165-.267.247-.566.247-.897 0-.707-.26-1.176-.778-1.409-.519-.232-1.31-.348-2.375-.348H7z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Bold--}}
{{--                                                                                            (Ctrl+B)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e2441d1ad084a78787080fded4a2cd1b0">Bold</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e66a55b36a91c9f1623f63f31809dfce7"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m9.586 14.633.021.004c-.036.335.095.655.393.962.082.083.173.15.274.201h1.474a.6.6 0 1 1 0 1.2H5.304a.6.6 0 0 1 0-1.2h1.15c.474-.07.809-.182 1.005-.334.157-.122.291-.32.404-.597l2.416-9.55a1.053 1.053 0 0 0-.281-.823 1.12 1.12 0 0 0-.442-.296H8.15a.6.6 0 0 1 0-1.2h6.443a.6.6 0 1 1 0 1.2h-1.195c-.376.056-.65.155-.823.296-.215.175-.423.439-.623.79l-2.366 9.347z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Italic--}}
{{--                                                                                            (Ctrl+I)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text "--}}
{{--                                                                                        id="ck-editor__aria-label_e66a55b36a91c9f1623f63f31809dfce7">Italic</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_ead267b93ad1439d3671cee73d93a51cc"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m11.077 15 .991-1.416a.75.75 0 1 1 1.229.86l-1.148 1.64a.748.748 0 0 1-.217.206 5.251 5.251 0 0 1-8.503-5.955.741.741 0 0 1 .12-.274l1.147-1.639a.75.75 0 1 1 1.228.86L4.933 10.7l.006.003a3.75 3.75 0 0 0 6.132 4.294l.006.004zm5.494-5.335a.748.748 0 0 1-.12.274l-1.147 1.639a.75.75 0 1 1-1.228-.86l.86-1.23a3.75 3.75 0 0 0-6.144-4.301l-.86 1.229a.75.75 0 0 1-1.229-.86l1.148-1.64a.748.748 0 0 1 .217-.206 5.251 5.251 0 0 1 8.503 5.955zm-4.563-2.532a.75.75 0 0 1 .184 1.045l-3.155 4.505a.75.75 0 1 1-1.229-.86l3.155-4.506a.75.75 0 0 1 1.045-.184z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Link--}}
{{--                                                                                            (Ctrl+K)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_ead267b93ad1439d3671cee73d93a51cc">Link</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button--}}
{{--                                                                                    class="ck ck-button ck-disabled ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e7582babb494e204ce643b7043e928357"--}}
{{--                                                                                    aria-disabled="true">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m5.042 9.367 2.189 1.837a.75.75 0 0 1-.965 1.149l-3.788-3.18a.747.747 0 0 1-.21-.284.75.75 0 0 1 .17-.945L6.23 4.762a.75.75 0 1 1 .964 1.15L4.863 7.866h8.917A.75.75 0 0 1 14 7.9a4 4 0 1 1-1.477 7.718l.344-1.489a2.5 2.5 0 1 0 1.094-4.73l.008-.032H5.042z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Undo--}}
{{--                                                                                            (Ctrl+Z)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e7582babb494e204ce643b7043e928357">Undo</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button--}}
{{--                                                                                    class="ck ck-button ck-disabled ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_ec97fb6cf1fe110aa4cdcd2432ac884fc"--}}
{{--                                                                                    aria-disabled="true">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="m14.958 9.367-2.189 1.837a.75.75 0 0 0 .965 1.149l3.788-3.18a.747.747 0 0 0 .21-.284.75.75 0 0 0-.17-.945L13.77 4.762a.75.75 0 1 0-.964 1.15l2.331 1.955H6.22A.75.75 0 0 0 6 7.9a4 4 0 1 0 1.477 7.718l-.344-1.489A2.5 2.5 0 1 1 6.039 9.4l-.008-.032h8.927z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Redo--}}
{{--                                                                                            (Ctrl+Y)</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_ec97fb6cf1fe110aa4cdcd2432ac884fc">Redo</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_eaa0b38a69fde4cd8dfb2b01119290545"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0C1 4.784 1.777 4 2.75 4c.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75C1.784 7.5 1 6.723 1 5.75zm6 9c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zm-6 0c0-.966.777-1.75 1.75-1.75.966 0 1.75.777 1.75 1.75 0 .966-.777 1.75-1.75 1.75-.966 0-1.75-.777-1.75-1.75z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Bulleted--}}
{{--                                                                                            List</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_eaa0b38a69fde4cd8dfb2b01119290545">Bulleted--}}
{{--                                                                                        List</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e0efa7ecde16d70443e470bcd00aab006"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M7 5.75c0 .414.336.75.75.75h9.5a.75.75 0 1 0 0-1.5h-9.5a.75.75 0 0 0-.75.75zM3.5 3v5H2V3.7H1v-1h2.5V3zM.343 17.857l2.59-3.257H2.92a.6.6 0 1 0-1.04 0H.302a2 2 0 1 1 3.995 0h-.001c-.048.405-.16.734-.333.988-.175.254-.59.692-1.244 1.312H4.3v1h-4l.043-.043zM7 14.75a.75.75 0 0 1 .75-.75h9.5a.75.75 0 1 1 0 1.5h-9.5a.75.75 0 0 1-.75-.75z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Numbered--}}
{{--                                                                                            List</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e0efa7ecde16d70443e470bcd00aab006">Numbered--}}
{{--                                                                                        List</span>--}}
{{--                                                                                </button>--}}
{{--                                                                                <button class="ck ck-button ck-off"--}}
{{--                                                                                    type="button" tabindex="-1"--}}
{{--                                                                                    aria-labelledby="ck-editor__aria-label_e2379b611ff058e008f59bed6410fbc76"--}}
{{--                                                                                    aria-pressed="false">--}}
{{--                                                                                    <svg class="ck ck-icon ck-button__icon"--}}
{{--                                                                                        viewBox="0 0 20 20">--}}
{{--                                                                                        <path--}}
{{--                                                                                            d="M3 10.423a6.5 6.5 0 0 1 6.056-6.408l.038.67C6.448 5.423 5.354 7.663 5.22 10H9c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574zm8 0a6.5 6.5 0 0 1 6.056-6.408l.038.67c-2.646.739-3.74 2.979-3.873 5.315H17c.552 0 .5.432.5.986v4.511c0 .554-.448.503-1 .503h-5c-.552 0-.5-.449-.5-1.003v-4.574z">--}}
{{--                                                                                        </path>--}}
{{--                                                                                    </svg>--}}
{{--                                                                                    <span--}}
{{--                                                                                        class="ck ck-tooltip ck-tooltip_s"><span--}}
{{--                                                                                            class="ck ck-tooltip__text translated_text">Block--}}
{{--                                                                                            quote</span></span><span--}}
{{--                                                                                        class="ck ck-button__label translated_text"--}}
{{--                                                                                        id="ck-editor__aria-label_e2379b611ff058e008f59bed6410fbc76">Block--}}
{{--                                                                                        quote</span>--}}
{{--                                                                                </button>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="ck ck-editor__main" role="presentation">--}}
{{--                                                                <div--}}

{{--                                                                    class="ck-blurred ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline"--}}
{{--                                                                    lang="en" dir="ltr" role="textbox"--}}
{{--                                                                    aria-label="Rich Text Editor, main"--}}
{{--                                                                    contenteditable="true">--}}
{{--                                                                    <p><br data-cke-filler="true">--}}
{{--                                                                    </p>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                       --}}
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

                    <div class="col-9 mt-4">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <div class="col-auto">
                                                        <h6 class="title custom-title ">{{ __("generated.Liste des questions") }}</h6>
                                                    </div>
                                                    <div class="col-auto ms-auto" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Ajouter une question">
                                                        <div class="avatar avatar-50 rounded bg-light-theme"
                                                            id="addQuestionButton">
                                                            <i
                                                                class="bi bi-plus-square avatar   rounded h5"></i>
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

                    <div class="col-9 mt-4" id="questionsContainer">
                        <!-- Questions dynamiques -->
                        @if (isset($test))
                            @if ($test->questions->isEmpty())
                                <p class="text-warning ">{{ __("generated.Aucune question pour ce test.") }}</p>
                            @else
                                <div class="accordion questionCard" id="questionsAccordion">

                                    @foreach ($test->questions as $questionIndex => $question)
                                        <div class="accordion-item mb-3">
                                            <h2 class="accordion-header" id="heading-{{ __($question->id) }}">
                                                <button class="accordion-button collapsed translated_text" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{ __($question->id) }}" aria-expanded="false"
                                                    aria-controls="collapse-{{ __($question->id) }}">
                                                    Question {{ $questionIndex + 1 }} : {{ __($question->question_text) }}
                                                </button>
                                            </h2>

                                            <div id="collapse-{{ __($question->id) }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading-{{ __($question->id) }}"
                                                data-bs-parent="#questionsAccordion">
                                                <div class="accordion-body">
                                                    <p>
                                                        <strong >{{ __("generated.Type de question :") }}</strong>
                                                        {{ $typesQuestions[$question->type] ?? 'Inconnu' }}
                                                    </p>

                                                    <input type="hidden" name="questions[{{ __($questionIndex) }}][type]"
                                                        value="{{ __($question->type) }}">
                                                    <input type="hidden" name="questions[{{ __($questionIndex) }}][id]"
                                                        value="{{ __($question->id) }}">

                                                    {{-- Tous les types de questions ont un champ éditable pour la question --}}
                                                    <div class="mb-4">
                                                        <label for="question-text-{{ __($question->id) }}"
                                                            class="form-label translated_text">Texte
                                                            de la question :</label>
                                                        <input type="text"
                                                            name="questions[{{ __($questionIndex) }}][question_text]"
                                                            id="question-text-{{ __($question->id) }}" class="form-control"
                                                            value="{{ __($question->question_text) }}" required>
                                                    </div>

                                                    {{-- Type de question = 1 ou 2 : QCM ou QCU --}}
                                                    @if ($question->type == 1 || $question->type == 2)
                                                        <h6 >{{ __("generated.Réponses :") }}</h6>
                                                        <div id="answers-container-{{ __($questionIndex) }}">
                                                            @forelse($question->answers as $answerIndex => $answer)
                                                                <div class="d-flex align-items-center mb-3"
                                                                    id="answer-{{ __($answer->id) }}">
                                                                    <input type="text"
                                                                        name="questions[{{ __($questionIndex) }}][options][{{ __($answerIndex) }}][answer_text]"
                                                                        class="form-control me-2 translated_text"
                                                                        value="{{ __($answer->answer_text) }}"
                                                                        placeholder="Texte de la réponse" required>

                                                                    @if ($question->type == 1)
                                                                        {{-- Si type QCM --}}
                                                                        <label class="form-check-label me-2">
                                                                            <input type="checkbox"
                                                                                name="questions[{{ __($questionIndex) }}][options][{{ __($answerIndex) }}][is_correct]"
                                                                                value="1"
                                                                                @if ($answer->is_correct) checked @endif>
                                                                            <span >{{ __("generated.Correcte") }}</span>
                                                                        </label>
                                                                    @elseif($question->type == 2)
                                                                        {{-- Si type QCU --}}
                                                                        <label class="form-check-label me-2">
                                                                            <input type="radio"
                                                                                name="questions[{{ __($questionIndex) }}][options][{{ __($answerIndex) }}][is_correct]"
                                                                                value="{{ __($answer->id) }}"
                                                                                @if ($answer->is_correct) checked @endif>
                                                                            <span >{{ __("generated.Correcte") }}</span>
                                                                        </label>
                                                                    @endif

                                                                    {{-- Bouton pour supprimer une réponse --}}
                                                                    <button type="button"
                                                                        class="btn btn-danger   removeOptionButton">
                                                                        <i class="bi bi-trash"></i>
                                                                    </button>
                                                                </div>
                                                            @empty
                                                                <p class="text-warning ">{{ __("generated.Aucune réponse disponible.") }}</p>
                                                            @endforelse
                                                        </div>

                                                        {{-- Bouton pour ajouter une nouvelle réponse --}}
                                                        <button type="button"
                                                            class="btn   btn-primary "
                                                            onclick="addAnswer({{ __($question->id) }})">Ajouter une réponse") }}</button>
                                                    @endif

                                                    {{-- Type de question = 3 : Vrai/Faux --}}
                                                    @if ($question->type == 3)
                                                        <h6 >{{ __("generated.Réponse :") }}</h6>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio"
                                                                    name="questions[{{ __($questionIndex) }}][correct_answer]"
                                                                    class="form-check-input" value="true"
                                                                    @if ($question->correct_answer === 'true') checked @endif>
                                                                <span >{{ __("generated.Vrai") }}</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio"
                                                                    name="questions[{{ __($questionIndex) }}][correct_answer]"
                                                                    class="form-check-input" value="false"
                                                                    @if ($question->correct_answer === 'false') checked @endif>
                                                                <span >{{ __("generated.Faux") }}</span>
                                                            </label>
                                                        </div>
                                                    @endif

                                                    {{-- Type de question = 4 : Classement --}}
                                                    @if ($question->type == 4)
                                                        <h6 >{{ __("generated.Éléments à classer :") }}</h6>
                                                        <div id="optionsContainer_{{ __($questionIndex) }}">
                                                            @forelse($question->answers as $answerIndex => $answer)
                                                                <input type="hidden" value="{{ __($answer->id) }}"
                                                                    name="questions[{{ __($questionIndex) }}][options][{{ __($answerIndex) }}][option_id]">
                                                                <div class="col-12 mt-3" id="option-{{ __($answerIndex) }}">
                                                                    <div
                                                                        class="mb-0 position-relative is-valid check-valid">
                                                                        <div class="form-floating">
                                                                            <div
                                                                                class="option d-flex align-items-center gap-3">
                                                                                {{-- Texte de l'élément --}}
                                                                                <input type="text"
                                                                                    name="questions[{{ __($questionIndex) }}][options][{{ __($answerIndex) }}][answer_text]"
                                                                                    value="{{ __($answer->answer_text) }}"
                                                                                    placeholder="Option"
                                                                                    class="form-control border-start-0 h-auto translated_text"
                                                                                    style="width: 36%" required>

                                                                                {{-- Ordre --}}
                                                                                <label>Ordre</label>
                                                                                <input type="number"
                                                                                    name="questions[{{ __($questionIndex) }}][options][{{ __($answerIndex) }}][order]"
                                                                                    value="{{ __($answer->order) }}"
                                                                                    class="form-control border-start-0 h-auto"
                                                                                    style="width: 20%" required>

                                                                                {{-- Supprimer l'élément existant --}}
                                                                                <button type="button"
                                                                                    class="btn btn-danger   removeOptionButton">
                                                                                    <i class="bi bi-trash"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <p class="text-warning ">{{ __("generated.Aucun élément disponible.") }}</p>
                                                            @endforelse
                                                        </div>

                                                        <button type="button"
                                                            class="btn  btn-primary addOptionClassementButton mt-3 "
                                                            data-index="{{ __($questionIndex) }}">{{ __("generated.Ajouter un élément") }}</button>
                                                    @endif
                                                    @if ($question->type == 5)
                                                        <h6 >{{ __("generated.Paires :") }}</h6>
                                                        <div id="pairs-container-{{ __($question->id) }}">
                                                            @forelse($question->answers as $pairIndex => $answer)
                                                                <div class="d-flex align-items-center mb-3">
                                                                    <input type="text"
                                                                        name="answers[{{ __($pairIndex) }}][left_item]"
                                                                        class="form-control me-2 translated_text"
                                                                        value="{{ $answer->left_item ?? '' }}"
                                                                        placeholder="Élément gauche" required>
                                                                    <input type="text"
                                                                        name="answers[{{ __($pairIndex) }}][right_item]"
                                                                        class="form-control me-2 translated_text"
                                                                        value="{{ $answer->right_item ?? '' }}"
                                                                        placeholder="Élément droit" required>
                                                                    <button type="button"
                                                                        class="btn btn-danger   "
                                                                        onclick="removeAnswer({{ __($answer->id) }})"> Supprimer") }}</button>
                                                                </div>
                                                            @empty
                                                                <p class="text-warning ">{{ __("generated.Aucune paire disponible.") }}</p>
                                                            @endforelse
                                                        </div>

                                                        <button type="button"
                                                            class="btn   btn-primary "
                                                            onclick="addPair({{ __($question->id) }})">Ajouter une paire") }}</button>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endif
                        @endif

                    </div>


                    <div class="col-9 mt-4">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row mb-1">
                                                    <div class="col-12 ms-auto" style="width: 36%">
                                                        <div class="form-check form-switch" style="margin-top: 4px;">
                                                            <button data-bs-toggle="modal" data-bs-target="#emailcompose"
                                                                class="btn btn-theme mnw-100 bg-blue "
                                                                style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Essayer votre test") }}</button>
                                                            <button class="btn btn-theme mnw-100 bg-green"
                                                                style="float: right;font-size: 14px;">
                                                                {{ isset($test) ? __("generated.Modifier") : __("generated.Enregistrer")  }}
                                                            </button>
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
            </form>
        </div>

    </main>
@endsection


@section('js_footer')
    <script>
        var typesQuestions = {!! json_encode($typesQuestions) !!};

        var apiCreateEditTest =
            "{{ isset($test) ? route('api.testsTechniques.edit.data', $test->id) : route('api.testsTechniques.store.data') }}";
    </script>

    @include('profile.inc.translation')

    @vite(['resources/js/technicalTest/create-edit.js'])
@endsection
