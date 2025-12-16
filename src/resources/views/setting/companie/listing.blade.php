@extends('layouts.master')

@section('title', __('generated.HumanJobs - Liste des Companies'))   

@section('css_header')
<style>
.table-striped > tbody > tr:nth-of-type(odd) > * {
  --bs-table-accent-bg:none !important;
}
</style>
@endsection

@section('content')
    <main class="main mainheight">

        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-3 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Entreprise") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
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
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Liste des Entreprises") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-3">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row justify-content-Justify align-items-center">
                                                <!-- Titre -->
                                                <div class="col-12 col-md-4">
                                                    <h5 >{{ __("generated.Liste des Entreprises") }}</h5>
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
            <div class="row mb-3 justify-content-center">
                <div class="col-12">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="col-12">
                            <div class="card border-0 p-3">
                                <div class="table-responsive">
                                    <table class="table table-striped w-100 translated_text" id="companiesTable" style="border-collapse:collapse">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold">#</th>
                                                <th class="fw-bold ">{{ __("generated.Nom de l'entreprise") }}</th>
                                                <th class="fw-bold ">{{ __("generated.Adresse") }}</th>
                                                <th class="fw-bold ">{{ __("generated.Code Postal") }}</th>
                                                <th class="fw-bold ">{{ __("generated.Ville") }}</th>
                                                <th class="fw-bold  ">{{ __("generated.Actions") }}</th>
                                            </tr>
                                        </thead>
                                        <tbody style="vertical-align: middle;">

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

    </main>
    @include('setting.companie.edit')
    @include('profile.inc.translation')



@endsection

@section('js_footer')
   
    <script>
        var companieData = "{{ route('api.companie.listing') }}";
        var companieUpdate = "{{ route('api.companie.update', ['id' => '__ID__']) }}";
    </script>

    @vite(['resources/js/companie/listing.js', 'resources/js/companie/edit.js'])

@endsection
