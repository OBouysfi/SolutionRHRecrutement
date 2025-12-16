@extends('layouts.master')

@section('title', "HumanJobs - Liste des Agences")

@section('css_header')

@endsection

@section('content')
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="col-12 col-md mb-3 mb-sm-0">
                <h5 class="mb-0 ">{{ __("generated.Agence") }}</h5>
                <span style="color: #444343;" class="title-of-post"></span>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.contact") }}">
                <a href="{{ route('support.index') }}" class="text-decoration-none">
                    <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.contact") }}">
                        <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                            <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                            </span>
                        </figure>
                    </div>
                </a>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.Guide vidéo") }}">
                <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                    <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                        <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                    </span>
                </figure>
            </div>
            <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.Chatbot") }}">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
            </div>
            <div class="col col-sm-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
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
                <li class="breadcrumb-item active " aria-current="page">{{ __("generated.Liste des Agences") }}</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-3">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 mb-4">
                    <div class="card-body p-0" style="background-color: #e4e8ee54">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body  theme-blue bg-gradient-theme-light">
                                        <div class="row justify-content-center align-items-center">
                                            <!-- Titre -->
                                            <div class="col-12 col-md-4">
                                                <h5 >{{ __("generated.Liste des Agences") }}</h5>
                                            </div>
                                        
                                            <!-- Boutons et actions -->
                                            <div class="col-12 col-md-8 d-flex justify-content-end">
                                                <div class="d-flex flex-wrap gap-2">
                                                    <!-- Bouton Ajouter -->
                                                    <div class="col-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Ajouter une affectation") }}">
                                                        <div class="avatar avatar-50 rounded bg-light-theme">
                                                            <a href="#" class="btn p-0 border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="bi bi-plus-square avatar   rounded h5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- Bouton Télécharger -->
                                                    <div class="col-auto translated_text" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Télécharger") }}">
                                                        <div class="avatar avatar-50 rounded bg-light-theme" id="downloadExcel">
                                                            <a href="#" type="button">
                                                                <i class="bi bi-cloud-download avatar   rounded h5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- Sélecteur -->
                                                    <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                                                        <div class="avatar avatar-50 rounded bg-light-theme">
                                                            <select id="customLength" style="border: 0; background-color: transparent; width: 49px; color: #005dc7;">
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
        <div class="row mb-3 justify-content-center">
            <div class="col-12">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="card border-0 p-3 p-md-4">
                            <div class="card-body p-0">
                                <!-- Tableau responsive -->
                                <div class="table-responsive">
                                    <table class="table table-striped w-100" id="agencesTable">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold ">{{ __("generated.Agence") }}</th>
                                                <th class="fw-bold ">{{ __("generated.Filiale") }}</th>
                                                <th class="fw-bold text-center ">{{ __("generated.Actions") }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="row align-items-center mx-0 mb-3">
                                    <div class="col-6"></div>
                                    <div class="col-6 footable-paging-external footable-paging-right footable-pagination"
                                        id="validated-agencesTable-pagination">
                                        <div class="footable-pagination-wrapper">
                                            <ul class="pagination" id="pagination-links"></ul>
                                            <div class="divider"></div>
                                            <span class="label label-default " id="pagination-info">{{ __("generated.1 sur 1") }}</span>
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
@include('setting.agence.create')
@include('setting.agence.view')
@include('setting.agence.edit')



@endsection

@section('js_footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

<script>
    var agenceData = "{{ route('api.agence.listing') }}";
    var agencestore = "{{ route('api.agence.store') }}";
    var agencesDestroy = "{{ route('api.agence.destroy', ['agence' => '__ID__']) }}"; 
    var agencesView = "{{ route('api.agence.view', ['id' => '__ID__']) }}";
    var agencesUpdateUrl = "{{ url('/api/agences/update/__ID__') }}";

</script>

<script>
    var exportUrl = '{{ route("agence.export") }}'; 
    
    $(document).on('click', '#downloadExcel', function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Quel type de fichier souhaitez-vous ?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Excel",
            cancelButtonText: "Annuler",
            showDenyButton: true,
            denyButtonText: "CSV",
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

@vite(['resources/js/agence/listing.js','resources/js/agence/create.js','public/assets/css/custom-style.css'])

@endsection