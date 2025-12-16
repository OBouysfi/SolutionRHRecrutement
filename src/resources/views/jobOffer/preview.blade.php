<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="NI9WPU8xPqOt076CBU6hJ8eBiqpRRCBY53S0TX57">

    <title>{{ __("generated.Offres d'emploi") }}</title>
    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">
    <!-- Favicons -->

    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">


</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">
    <main class="main mainheight">
        <!-- content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 10px">
                            <div class="row mb-5">
                                <div class="col-auto"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}"
                                            alt="" style="width: 35%;"></span></div>
                                <div class="col-auto ms-auto" style="padding-top: 15px;">
                                    <h4 class="title custom-title " style="font-size: 25px;">{{ __("generated.Offres d'emploi") }}</h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 translated_text" style="text-align: center;">

                                    {{-- <span>
                                        Du 01/05/2025
                                        au 31/05/2025
                                    </span> --}}
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="card-body">
                                    <!-- Ajout de la classe table-responsive pour permettre le défilement horizontal -->
                                    <div class="table-responsive">
                                        <table class="table offres-table" data-show-toggle="true" id="missionTable"
                                            style="width: 100%;">
                                            <thead
                                                style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                                <tr style="vertical-align: middle;">
                                                    <th rowspan="2" >#</th>
                                                    <th rowspan="2" >{{ __("generated.N° client") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Client") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Intitulé du poste") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Type de contrat") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Localisation") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Diplôme") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Expérience") }}</th>
                                                    {{-- <th rowspan="2" >{{ __("generated.Nombre de Profils") }}</th> --}}
                                                    <th colspan="2" >{{ __("generated.Période de l'offre") }}</th>
                                                    <th rowspan="2" >{{ __("generated.Statut") }}</th>
                                                </tr>
                                                <tr>
                                                    <th style="font-weight: 600" >{{ __("generated.Date de début") }}</th>
                                                    <th style="font-weight: 600" >{{ __("generated.Date de fin") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 13px;vertical-align: middle;text-align: center;">
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row align-items-center mx-0 mb-3">
                                        <div class="col-6"></div>
                                        <div class="col-6 footable-paging-external footable-paging-right mt-3"
                                            id="footable-pagination">
                                            <div class="footable-pagination-wrapper">
                                                <ul class="pagination"></ul>
                                                <div class="divider"></div>
                                                <span class="label label-default">1 <span >{{ __("generated.sur") }}</span> 1</span>
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

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    // var vivierTalentListingData = "{{ route('profile.listing.vivierTalent') }}";
    var jobOfferListingData = "{{ route('jobOffer.listing.data') }}";
</script>
@vite(['resources/js/jobOffer/preview.js'])
<!-- style css for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

</html>
