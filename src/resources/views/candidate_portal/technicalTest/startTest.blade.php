@extends('candidate_portal.layouts.second')

@section('title', __('candidate-portal.Fiche du candidat'))

@section('css_header')
@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">{{ __('candidate-portal.Test technique') }}</h5>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="contact">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="contact">
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
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __('candidate-portal.Chatbot') }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #005dc7;">
                        <img src="{{ asset('assets/img/icon/HJ_icon_green_black.png') }}" alt=""
                            style="display: none;">
                    </figure>
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('candidate-portal.Fiche du candidat') }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class=" col-sm-12 col-md-6 mb-3">
                    <div class="card border-0 h-100"  >
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-12">
                                    <div class="card border-0 h-100">
                                        <div class="card-body">
                                            <div class="row h-100">
                                                <div class="col-12 col-sm-12 col-md-5" >
                                                    <ul class="list-group list-group-flush bg-none">
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.ID') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $candidate->id ?? '' }}
                                                                </div>
                                                                <input type="hidden" id="candidate_id" value="{{ $candidate->id ?? ' ' }}">
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    Ahmed BENAISSA
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ __('candidate-portal.Créé le') }} {{ optional($candidate?->created_at)->format('d-m-y') ?? '—' }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Groupe') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $candidate->group  ?? '—'  }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 ms-auto">
                                                    <ul class="list-group list-group-flush bg-none">
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Langue') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $candidate->language ?? '—'   }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.E-mail') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $candidate->email  ?? '—'  }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Invitation envoyée') }}
                                                                </div>
                                                                <div class="col-auto" style="font-size: 12px">
                                                                    Python - Avancé (09/07/24)<br>React - Intermédiaire
                                                                    (09/07/24)
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
                <div class=" col-sm-12 col-md-6 mb-3">
                    <div class="card border-0 h-100"  >
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-12">
                                    <div class="card border-0 h-100">
                                        <div class="card-body">
                                            <div class="row h-100">
                                                <div class="col-12 col-sm-12 col-md-5" >
                                                    <ul class="list-group list-group-flush bg-none">
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.ID') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $test->id ?? '' }}
                                                                </div>
                                                                <input type="hidden" id="test_id" value="{{ $test->id ?? ' ' }}">
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Nom du test') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $test->test_name ?? '—' }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Date limite') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ optional($test->deadline)->format('d-m-Y') ?? '—' }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-6 ms-auto">
                                                    <ul class="list-group list-group-flush bg-none">
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Durée') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $test->duration ?? '—' }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Type') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    {{ $test->type ?? '—' }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item text-secondary" style="font-size: 13px;">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    {{ __('candidate-portal.Statut') }} :
                                                                </div>
                                                                <div class="col-auto ps-0">
                                                                    <span class="badge rounded-pill bg-success">
                                                                        {{ __('candidate-portal.Actif') }}
                                                                    </span>
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
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="mb-4">{{ $test->test_name }}</h5>
                    <p class="mb-4">{{ $test->description }}</p>

                    <div id="question-content">
                        <div class="mb-4">
                            <div class="mb-2">
                                <strong>Question 1 :</strong>
                                {{ $test->questions->first()->question_text }}
                            </div>
                            @if ($test->questions->first()->type == 1)
                                @foreach ($test->questions->first()->answers as $answer)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" disabled>
                                        <label class="form-check-label">{{ $answer->answer_text }}</label>
                                    </div>
                                @endforeach
                            @elseif($test->questions->first()->type == 2)
                                @foreach ($test->questions->first()->answers as $answer)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" disabled>
                                        <label class="form-check-label">{{ $answer->answer_text }}</label>
                                    </div>
                                @endforeach
                            @elseif($test->questions->first()->type == 3)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" disabled>
                                    <label class="form-check-label">{{ __('candidate-portal.true') }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" disabled>
                                    <label class="form-check-label">{{ __('candidate-portal.false') }}</label>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" id="prev-btn"
                            disabled>{{ __('candidate-portal.previous') }}</button>
                        <button type="button" class="btn btn-primary"
                            id="next-btn">{{ __('candidate-portal.next') }}</button>
                        <button id="submit-btn" class="btn btn-success"
                            style="display: none;">{{ __('candidate-portal.submit') }}</button>

                    </div>
                </div>
            </div>
        </div>



    </main>
@endsection


@section('js_footer')
    <script>
        var questions = @json($test->questions);
        var candidateId = "{{ $candidate->id }}";

        var apiSubmitTest = "{{ route('api.testsTechniques.submit') }}";
    </script>


    @vite(['resources/js/technicalTest/start-test.js'])

@endsection
