@extends('layouts.master')

@section('title', __('generated.HumanJobs - Liste des métiers/postes'))

@section('css_header')
<style>
.table-striped > tbody > tr:nth-of-type(odd) > * {
  --bs-table-accent-bg:none !important;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper 
.dataTables_filter, .dataTables_wrapper .dataTables_info, 
.dataTables_wrapper .dataTables_processing, .dataTables_wrapper 
.dataTables_paginate {
    color: #333;
     margin-left:10px !important;
}
</style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Options du diplome") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="contact">
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Liste des options du diplome") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="row justify-content-center align-items-center">
                                                <!-- Titre -->
                                                <div class="col-12 col-md-4">
                                                    <h5 >{{ __("generated.Liste des options du diplome") }}</h5>
                                                </div>

                                                <!-- Boutons et actions -->
                                                <div class="col-12 col-md-8 d-flex justify-content-end">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <!-- Bouton Ajouter -->
                                                        <div class="col-auto translated_text" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="{{ __("generated.Ajouter une option") }}">
                                                            <div class="avatar avatar-50 rounded bg-light-blue">
                                                                <a href="#" class="btn p-0 border-0 bg-transparent"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <i
                                                                        class="bi bi-plus-square avatar  bg-light-gray rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Bouton Télécharger -->
                                                       <div class="col-auto">
                                                            <div class="avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Télécharger") }}" id="downloadExcel">
                                                                <a href="#" type="button">
                                                                    <i
                                                                        class="bi bi-cloud-download avatar icon-bw rounded h5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- Sélecteur -->
                                                        <div class="col-auto">
                                                            <div class="select-avatar avatar avatar-50 rounded bg-light-theme translated_text"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ __("generated.Nombre d'éléments par page") }}">
                                                                <select id="customLength"
                                                                    style="border: 0;background-color: transparent;color: var(--adminux-theme); width: 49px;">
                                                                    <option selected>10</option>
                                                                    <option>25</option>
                                                                    <option>50</option>
                                                                    <option>100</option>
                                                                </select>
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
            </div>
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                        <div class="card-body p-0">
                                            <div class="card-header bg-gradient-theme-light ">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <h5 >{{ __("generated.Options du diplome") }}</h5>
                                                    </div>
                                                    <div class="col-12 col-md-3 mt-2 mt-md-0 ms-auto">
                                                        <div class="input-group searchbar-full">
                                                            <span class="input-group-text text-theme">
                                                                <i class="bi bi-search"></i>
                                                            </span>
                                                            <input type="text" class="form-control form-control-sm" id="customSearchBox-diploma" placeholder="{{ __("generated.Search...") }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-1">
                                                    <table class="table table-striped align-middle"
                                                        data-show-toggle="true" id="diplomaOptionsTable" 
                                                        style="width:100%; border-top: 1px solid #e9e9e9  !important;">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                            <tr>
                                                                <th style="font-weight: 600;" >{{ __("generated.Intitulé du diplome") }}</th>
                                                                <th style="font-weight: 600;text-align: right;">{{ __("generated.Actions") }}</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row align-items-center mx-0 mb-3">
                                                <div class="col-6 ">

                                                </div>
                                                <div class="col-6 footable-paging-external footable-paging-right"
                                                    id="footable-pagination">
                                                    <div class="footable-pagination-wrapper">
                                                        <ul class="pagination">
                                                            <li class="footable-page-nav disabled" data-page="first"><a
                                                                    class="footable-page-link" href="#">«</a></li>
                                                            <li class="footable-page-nav disabled" data-page="prev">
                                                                <a class="footable-page-link" href="#">‹</a>
                                                            </li>
                                                            <li class="footable-page visible active" data-page="1"><a
                                                                    class="footable-page-link" href="#">1</a></li>
                                                            <li class="footable-page visible" data-page="2">
                                                                <a class="footable-page-link" href="#">2</a>
                                                            </li>
                                                            <li class="footable-page-nav" data-page="next"><a
                                                                    class="footable-page-link" href="#">›</a></li>
                                                            <li class="footable-page-nav" data-page="last"><a
                                                                    class="footable-page-link" href="#">»</a></li>
                                                        </ul>
                                                        <div class="divider"></div><span class="label label-default">1 sur
                                                            2</span>
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
        </div>
    </main>
    @include('setting.diplomaoption.inc.create')
    @include('setting.diplomaoption.inc.view')
    @include('setting.diplomaoption.inc.edit')
    @include('profile.inc.translation')

@endsection

@section('js_footer')
    <script>
        var diplomaoptionsData = "{{ route('api.diplomaoptions.listing') }}";
        var diplomaOptionsStore = "{{ route('api.diplomaoptions.store') }}";
        // var diplomaoptionsUpdate  = "{{-- route('api.diplomaoptions.update') --}}";
        var diplomaoptionDestroy = "{{ route('api.diplomaoptions.destroy', ['diplomaoption' => '__ID__']) }}";
        var diplomaoptionView = "{{ route('api.diplomaoptions.view', ['diplomaoption' => '__ID__']) }}";
    </script>
    <script>
        var exportUrl = '{{ route('diploma.export') }}';

        $(document).on('click', '#downloadExcel', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "{{ __('generated.Quel type de fichier souhaitez-vous ?') }}",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "{{ __('generated.Excel') }}",
                cancelButtonText: "{{ __('generated.Annuler') }}",
                showDenyButton: true,
                denyButtonText: "{{ __('generated.CSV') }}",
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // L'utilisateur a choisi Excel
                    window.location.href = exportUrl + '?type=excel';
                } else if (result.isDenied) {
                    // L'utilisateur a choisi CSV
                    window.location.href = exportUrl + '?type=csv';
                }
            });
        });
    </script>
   
    @vite(['resources/js/diplomaoption/listing.js', 'resources/js/diplomaoption/create-edit.js'])

@endsection
