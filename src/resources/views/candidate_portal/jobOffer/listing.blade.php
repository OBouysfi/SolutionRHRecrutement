@extends('candidate_portal.layouts.second')

@section('title', __('generated.Offres d\'emploi'))
@section('css_header')
    <style>
        .single {
            background-color: transparent !important;
        }


        .dark .single {
            background-color: var(--adminux-theme-bg) !important;
        }
    </style>
    <style>
        .chosenoptgroup {
            background: var(--adminux-theme-bg);
            border: none;
            padding: 2px 9px;
        }

        .circle-progress {
            position: relative;
            width: 50px;
            height: 50px;
            margin: 0 auto;
        }

        .circle-progress .progressbar-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8em;
            color: inherit;
        }

        .chosen-results img {
            width: 30px;
            height: auto;
            margin-right: 5px;
            vertical-align: middle;
        }
       
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 joboffer-title ">{{ __("generated.Offres d'emploi") }}</h5>
                    <h5 class="mb-0 d-none matching-title ">{{ __("generated.Matching") }}</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>
                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i
                                class="bi bi-calendar-event"></i></span>
                    </div>
                </div>
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
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
                </div>
                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __("generated.Confort utilisateur") }}"
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
                    <li class="breadcrumb-item active joboffer-title  text-bw" aria-current="page">{{ __("generated.Liste des offres d'emploi") }}</li>
                    <li class="breadcrumb-item active d-none matching-title  text-bw" aria-current="page">{{ __("generated.Scoring") }}</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body filter-block">
                                            <div class="row">
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div
                                                            class="custom-multiple-select rounded  poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;">
                                                            <label class=" text-bw">{{ __("generated.Pays") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-pays">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ __($country->id) }}" class="translated_var"
                                                                        data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                        {{ __($country->name) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div 
                                                            class="custom-multiple-select rounded  poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label class=" text-bw">{{ __("generated.Ville") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-ville">
                                                                <option value="Tous" selected >{{ __("generated.Tous") }}</option>
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ __($city?->id) }}" class="translated_var"
                                                                        data-region-id="{{ __($city?->region?->country_id) }}">
                                                                        {{ __($city->name) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded  poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.poste") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-poste">
                                                                <option value="Tous" class=" text-bw">{{ __("generated.Tous") }}</option>
                                                                @foreach ($posts as $post)
                                                                    <option value="{{ __($post->id) }}" class="translated_var">
                                                                        {{ $post->label ?? ' - ' }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="form-group check-valid is-valid">
                                                        <div class="custom-multiple-select rounded  poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label class=" text-bw">{{ __("generated.Secteur d’activité") }}</label>
                                                            <select class="chosenoptgroup w-100" id="filter-activityarea">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @foreach ($activityareas as $activityarea)
                                                                    <option value="{{ __($activityarea->id) }}" class="translated_var">
                                                                        {{ __($activityarea->label) }}
                                                                    </option>
                                                                @endforeach
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
            <div class="row mb-5">
                <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="navtabscard139"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <a style="font-size: 14px" class="nav-link active " id="offres-tab"
                                data-bs-toggle="tab" href="#offres" role="tab">{{ __("generated.Offres d'emploi") }}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a style="font-size: 14px" class="nav-link " id="matching-tab"
                                data-bs-toggle="tab" href="#matching" role="tab">{{ __("generated.Matching") }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Contenu des Tabs -->
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="offres" role="tabpanel">
                    <div class="row mb-5 justify-content-center">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">

                                                        <div class="col">
                                                            <h5 >{{ __("generated.Offres d'emploi") }}</h5>
                                                        </div>
                                                        <div class="col">
                                                              <div class="input-group searchbar-full">
                                                                    <span class="input-group-text text-theme">
                                                                        <i class="bi bi-search"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control form-control-sm" id="customSearchBox-jobOffer" placeholder="{{ __("generated.Search...") }}">
                                                                </div>
                                                        </div>
                                                        <div class="col"
                                                            style="width: 9%;height: 50px !important;margin-top: auto;margin-bottom: auto; margin-left: auto;">
                                                            <div class="row  mb-3 d-flex justify-content-end">

                                                                <div class="col-auto" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title="">
                                                                    <div
                                                                        class="avatar avatar-50 rounded bg-light-theme   ">
                                                                        <select
                                                                            style="border: 0;background-color: transparent;width: 49px;color: #005dc7;"
                                                                            id="customLength">
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
                                                <div class="card-body table-responsive">
                                                    <table class="table offres-table  w-100" data-show-toggle="true"
                                                        id="candidate_portal" style="border-top: 1px solid #e9e9e9  !important;">
                                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                            <tr style="vertical-align: middle; text-align:center">
                                                                <th rowspan="2" style="font-weight: 600;width: 80px">#
                                                                </th>
                                                                <th rowspan="2" style="font-weight: 600;"
                                                                    >{{ __("generated.N° client") }}</th>
                                                                <th rowspan="2" style="font-weight: 600;"
                                                                    >{{ __("generated.Client") }}</th>
                                                                <th rowspan="2" style="font-weight: 600;width: 220px">
                                                                   {{ __("generated.Intitulé du poste") }}  </th>
                                                                <th rowspan="2"
                                                                    style="font-weight: 600;text-align: center"
                                                                    >{{ __("generated.Type de contrat") }}</th>
                                                                <th rowspan="2" style="font-weight: 600"
                                                                    >{{ __("generated.Localisation") }}</th>
                                                                <th rowspan="2" style="font-weight: 600"
                                                                    >{{ __("generated.Diplôme") }}</th>
                                                                <th rowspan="2" style="font-weight: 600"
                                                                    >{{ __("generated.Option") }}</th>
                                                                <th rowspan="2"
                                                                    style="font-weight: 600;text-align: center"
                                                                    >{{ __("generated.Expérience") }}</th>
                                                                <th colspan="2"
                                                                    style="font-weight: 600;text-align: center"
                                                                    >{{ __("generated.Période de l'offre") }}</th>
                                                                <th rowspan="2"
                                                                    style="font-weight: 600;text-align: center;"
                                                                    >{{ __("generated.Action") }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="font-weight: 600" >{{ __("generated.Date de début") }}</th>
                                                                <th style="font-weight: 600" >{{ __("generated.Date de fin") }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="font-size: 13px ; text-align:center">

                                                        </tbody>
                                                    </table>

                                                    <div class="row align-items-center mx-0 mb-3">
                                                        <div class="col-6 ">

                                                        </div>
                                                        <!-- Pagination -->
                                                        <div class="row align-items-center mx-0 mb-3">
                                                            <div class="col-12 mt-4 footable-paging-external footable-paging-right footable-pagination"
                                                                id="validated-jobOffer-candidate-pagination">
                                                                <div class="footable-pagination-wrapper">
                                                                    <ul class="pagination" id="pagination-links"></ul>
                                                                    <div class="divider"></div>
                                                                    <span class="label label-default"
                                                                        id="pagination-info">1 <span
                                                                            >{{ __("generated.sur") }}</span> 1</span>
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
                <div class="tab-pane fade" id="matching" role="tabpanel">
                    <div class="tab-content py-3" id="myTabContent">
                        <!-- personal info tab-->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel"
                            aria-labelledby="personal-tab">
                            <div class="row mb-5 justify-content-center">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0 ">
                                                        <div class="card-header bg-gradient-theme-light">
                                                            <div class="row align-items-center">

                                                                <div class="col">
                                                                    <h5 >{{ __("generated.Scoring") }}</h5>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="input-group searchbar-full">
                                                                            <span class="input-group-text text-theme">
                                                                                <i class="bi bi-search"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control form-control-sm" id="customSearchBox-matching" placeholder="{{ __("generated.Search...") }}">
                                                                        </div>
                                                                </div>
                                                                <div class="col"
                                                                    style="width: 9%;height: 50px !important;margin-top: auto;margin-bottom: auto; margin-left: auto;">
                                                                    <div class="row  mb-3 d-flex justify-content-end">

                                                                        <div class="col-auto" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="">
                                                                            <div
                                                                                class="avatar avatar-50 rounded bg-light-theme   ">
                                                                                <select
                                                                                    style="border: 0;background-color: transparent;width: 49px;color: #005dc7;"
                                                                                    id="customLength2">
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
                                                        <div class="card-body table-responsive">
                                                            <table class="table offres-table w-100" style="width: 100% ; border-top: 1px solid #e9e9e9  !important;"
                                                                data-show-toggle="true" id="candidateMatching">
                                                                <thead
                                                                    style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                                    <tr style="vertical-align: middle; text-align:center">
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 80px">#</th>
                                                                        <th rowspan="2" style="font-weight: 600;"
                                                                            >{{ __("generated.N° client") }}</th>
                                                                        <th rowspan="2" style="font-weight: 600;"
                                                                            >{{ __("generated.Client") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;width: 220px"
                                                                            >{{ __("generated.Intitulé du poste") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: center"
                                                                            >{{ __("generated.Type de contrat") }}</th>
                                                                        <th rowspan="2" style="font-weight: 600"
                                                                            >{{ __("generated.Localisation") }}</th>
                                                                        <th rowspan="2" style="font-weight: 600"
                                                                            >{{ __("generated.Diplôme") }}</th>
                                                                        <th rowspan="2" style="font-weight: 600"
                                                                            >{{ __("generated.Option") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: center"
                                                                            >{{ __("generated.Expérience") }}</th>
                                                                        <th colspan="2"
                                                                            style="font-weight: 600;text-align: center"
                                                                            >{{ __("generated.Période de l'offre") }}</th>
                                                                        <th rowspan="2"
                                                                            style="font-weight: 600;text-align: center"
                                                                            >{{ __("generated.Score") }}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-weight: 600"
                                                                            >{{ __("generated.Date de début") }}</th>
                                                                        <th style="font-weight: 600"
                                                                            >{{ __("generated.Date de fin") }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody style="font-size: 13px ;text-align:center">

                                                                </tbody>
                                                            </table>

                                                            <div class="row align-items-center mx-0 mb-3">
                                                                <div class="col-6 ">

                                                                </div>
                                                                <!-- Pagination -->
                                                                <div class="row align-items-center mx-0 mb-3">
                                                                    <div class="col-12 mt-4 footable-paging-external footable-paging-right footable-pagination"
                                                                        id="validated-matching-candidate-pagination">
                                                                        <div class="footable-pagination-wrapper">
                                                                            <ul class="pagination" id="pagination-links">
                                                                            </ul>
                                                                            <div class="divider"></div>
                                                                            <span class="label label-default"
                                                                                id="pagination-info">1 <span
                                                                                    >{{ __("generated.sur") }}</span>
                                                                                1</span>
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

                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection


@section('js_footer')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/jobOffer/listing.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function applyForJob(jobOfferId) {
            Swal.fire({
                title: "Confirmez votre candidature",
                text: "Voulez-vous vraiment postuler pour cette offre ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, postuler!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('jobOffer.apply', ['id' => '__ID__']) }}".replace('__ID__', jobOfferId), {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === "success") {
                                Swal.fire("Succès!", data.message, "success");
                            } else {
                                Swal.fire("Oops!", data.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.fire("Erreur!", "Une erreur s'est produite.", "error");
                        });
                }
            });
        }
    </script>
    <script>
        var jobOffercandidateData = "{{ route('jobOffercandidate.listing.data') }}";
        var MatchingcandidateData = "{{ route('matchingcandidate.listing.data') }}";
    </script>

    @vite(['resources/js/candidatePortal/listingMatching.js'])
    @vite(['resources/js/candidatePortal/listing.js'])
    @vite(['resources/js/profile/dateFillter.js'])



@endsection
