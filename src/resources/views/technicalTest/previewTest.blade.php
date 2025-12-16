@extends('layouts.master')

@section('title', __('generated.Aperçevoir un test'))
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
    </style>

@endsection

@section('content')

<main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 translated_text">{{ __("generated.Test technique") }}</h5>
                </div>
                {{-- <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div> --}}
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __('generated.Contact') }}">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ __('generated.Contact') }}">
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
                    data-bs-placement="top" title="{{ __('generated.Chatbot') }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('generated.Confort utilisateur') }}" style="margin-right: 40px;">
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
                    <li class="breadcrumb-item active translated_text" aria-current="page">{{  __("generated.Aperçu du test :") }} {{ $test->test_name }}</li>
                </ol>
            </nav>
        </div>


    <div class="container mt-4">
        @if(isset($test) && $test->questions->count())
            <div id="question-container">
                <!-- Initialisation du contenu de la première question -->
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="mb-4">{{ $test->test_name }}</h5>
                        <p class="mb-4">{{ $test->description }}</p>

                        <!-- Les questions et réponses seront affichées dynamiquement ici -->
                        <div id="question-content">
                            <div class="mb-4">
                                <div class="mb-2">
                                    <strong>{{ __('generated.Question') }} 1 :</strong>
                                    {{ $test->questions->first()->question_text }}
                                </div>
                                @if($test->questions->first()->type == 1)
                                    @foreach($test->questions->first()->answers as $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            <label class="form-check-label">{{ $answer->answer_text }}</label>
                                        </div>
                                    @endforeach
                                @elseif($test->questions->first()->type == 2)
                                    @foreach($test->questions->first()->answers as $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" disabled>
                                            <label class="form-check-label">{{ $answer->answer_text }}</label>
                                        </div>
                                    @endforeach
                                @elseif($test->questions->first()->type == 3)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" disabled>
                                        <label class="form-check-label">{{ __('generated.Vrai') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" disabled>
                                        <label class="form-check-label">{{ __('generated.Faux') }}</label>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Boutons de navigation -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" id="prev-btn" disabled>{{ __('generated.Précédent') }}</button>
                            <button type="button" class="btn btn-primary" id="next-btn">{{ __('generated.Suivant') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning">{{ __('generated.Aucune question à prévisualiser pour ce test.') }}</div>
        @endif
    </div>



</main>

@endsection


@section('js_footer')
    <script>
        var questions = @json($test->questions);
    </script>


    @vite(['resources/js/technicalTest/create-edit.js'])

@endsection
