<html lang="en" dir="">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title >{{ __("generated.HumanJobs - Matching") }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
   

    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">

   
    <style>
        
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
        .btnScoreFilter:hover {
            background-color: #005dc7 !important;
            color: #fff !important;
            border-color: #005dc7 !important;
            transition: all 0.3s ease;
        }
        .btnScoreFilter {
            background-color: #005dc7 !important;
        }
    </style>
    </head>
   

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled theme-light sidebar-icon-only theme-blue" data-sidebarstyle="sidebar-pushcontent"data-theme="theme-blue">        
   
    <!-- Begin page content -->
    <main class="main mainheight">

        <!-- content -->
        <div style="margin:20px">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                           <div class="d-flex align-items-center justify-content-between mb-5" style="gap: 10px;">
                                <img src="{{ asset('assets/img/icon/Recruitment.png') }}" alt="" style="width: 21%;">
                                <h4 class="title custom-title text-end" style="font-size: 25px; margin: 0;">
                                    Scoring
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col-12 " style="text-align: center;">
                                    <span>
                                       {{ __("generated.Du") }} {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                                       {{ __("generated.au") }} {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                               
                                    <table class="table offres-table Intégrale" data-show-toggle="true" id="preview_Table" width="100%">
                                        <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                        <tr style="vertical-align: middle;">
                                            <th rowspan="2" style="font-weight: 600;">#</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Référence") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Prénom") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Nom") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Diplôme") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Option") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Expérience") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Poste actuel") }}</th>
                                            <th rowspan="2" style="font-weight: 600;">{{ __("generated.Poste souhaité") }}</th>
                                            <th colspan="2" style="font-weight: 600;text-align: center">{{ __("generated.Date") }}</th>
                                          
                                            <th rowspan="2" style="font-weight: 600;" >{{ __("generated.Score") }}</th>
                                        </tr>
                                        <tr style="vertical-align: middle;">
                                            <th style="font-weight: 600;">{{ __("generated.Dépôt CV") }}</th>
                                            <th style="font-weight: 600;">{{ __("generated.Modification") }}</th>
                                        </tr>
                                        </thead>
                                        <tbody style="font-size: 13px">
                                          
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="row align-items-center mx-0 mb-4">
                                <div class="col-9 ">

                                </div>
                                <div class="col-3 footable-paging-external footable-paging-right"
                                    id="footable-pagination">
                                    <div class="footable-pagination-wrapper">
                                        <ul class="pagination">
                                            <li class="footable-page-nav disabled" data-page="first">
                                                <a class="footable-page-link" href="#">«</a>
                                            </li>
                                            <li class="footable-page-nav disabled" data-page="prev">
                                                <a class="footable-page-link" href="#">‹</a>
                                            </li>
                                            <li class="footable-page visible active" data-page="1"><a
                                                    class="footable-page-link" href="#">1</a>
                                            </li>
                                            <li class="footable-page visible" data-page="2">
                                                <a class="footable-page-link" href="#">2</a>
                                            </li>
                                            <li class="footable-page-nav" data-page="next"><a
                                                    class="footable-page-link" href="#">›</a>
                                            </li>
                                            <li class="footable-page-nav" data-page="last"><a
                                                    class="footable-page-link" href="#">»</a>
                                            </li>
                                        </ul>
                                        <div class="divider"></div><span class="label label-default">1
                                            <span >{{ __("generated.sur") }}</span> 2</span>
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
<script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>


<script>
    var matchingListingData = "{{ route('api.matching.data') }}";
</script>
@vite(['resources/js/matching/preview.js'])
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

</html>