@extends('layouts.master')

@section('title', __('generated.Consulter Lettre de motivation'))

@section('css_header')

@endsection

@section('content')

<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-2 mb-sm-0">
                <h5 class="mb-0">{{ __("generated.Lettre de motivation") }}</h5>
            </div>
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
                    style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
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
                <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Lettre de motivation") }} : {{ __($profile->first_name) }} {{ __($profile->last_name) }}</li>
            </ol>
        </nav>
    </div>

    <!-- content -->
    <div class="container mt-4">
        <div class="row">
            <div class="card border-0" style="background: transparent; box-shadow: none;">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="card border-0" style="width: 657px;margin-right: 44px;">
                            <div class="card-body">
                                @php use Illuminate\Support\Str; @endphp
                                <div class="col-12 text-center">
                                    @if($profile->path_cover_letter)
                                    @php
                                    $coverLetterUrl = asset('storage/' . $profile->path_cover_letter);
                                    $extension = strtolower(pathinfo($profile->path_cover_letter, PATHINFO_EXTENSION));
                                    @endphp

                                    @if($extension === 'pdf')
                                    <iframe src="{{ __($coverLetterUrl) }}" width="100%" height="800px" style="border: none;"></iframe>

                                    @elseif(in_array($extension, ['doc', 'docx']))
                                    <a href="{{ __($coverLetterUrl) }}" class="btn btn-primary" target="_blank">
                                        Télécharger la lettre de motivation (Word)
                                    </a>
                                    @else
                                    <p>{{ __("generated.Format de lettre de motivation non supporté.") }}</p>
                                    @endif
                                    @else
                                    <p>{{ __("generated.Aucune lettre de motivation disponible.") }}</p>
                                    @endif

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
