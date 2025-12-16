<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title><span >{{ __("generated.HumanJobs") }}</span>  - <span >{{ __("generated.Matching") }}</span> </title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js"></script>

    

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">
</head>

<body>
    <!-- content -->
    <div class=" mt-4">
        <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                           <div class="d-flex align-items-center justify-content-between mb-5" style="gap: 10px;">
                                <img src="{{ asset('assets/img/icon/Recruitment.png') }}" alt="" style="width: 21%;">
                                <h4 class="title custom-title text-end" style="font-size: 25px; margin: 0;">
                                    {{ __('generated.Scoring') }}
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col-12 " style="text-align: center;">
                                    <span>
                                        {{ __("generated.Du") }}  {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
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
                            <div class="row align-items-center mx-0 mb-4 mt-4">
                                <div class="col-7 ">

                                </div>
                                <div class="col-5  footable-paging-external footable-paging-right"
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
</body>

<script>
    var matchingListingData = "{{ route('api.matching.data') }}";
</script>
@vite(['resources/js/matching/preview.js'])
</html>
