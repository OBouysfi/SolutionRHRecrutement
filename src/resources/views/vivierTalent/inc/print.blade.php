<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="NI9WPU8xPqOt076CBU6hJ8eBiqpRRCBY53S0TX57">

    <title>{{ __("generated.HumanJobs - Vivier Talents") }}</title>
    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">
    <!-- Favicons -->

    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">
  

</head>

<body >
    <main class="main mainheight">
    <!-- content -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body" style="padding: 10px">
                        <div class="row mb-5">
                            <div class="col-auto"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}"
                                        alt="" style="width: 35%;"></span></div>
                            <div class="col-auto ms-auto" style="padding-top: 15px;">
                                <h4 class="title custom-title " style="font-size: 25px;">{{ __("generated.Vivier Talent") }}</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 translated_text" style="text-align: center;">
                                <span>
                                    {{ __('generated.Du') }} {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                                    {{ __('generated.au') }} {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-12">
                                <table class="table offres-table Intégrale" data-show-toggle="true" id="preview_vivier" style="width: 100%">
                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                        <tr style="vertical-align: middle;">
                                            <th  rowspan="2"
                                                style="font-weight: 600;text-align: center">#</th>
                                            {{-- <th  rowspan="2"
                                                style="font-weight: 600;">{{ __("generated.Dossier") }}</th> --}}
                                            <th  rowspan="2"
                                                style="font-weight: 600;">{{ __("generated.Matricule") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;">{{ __("generated.Prénom") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 147px;">{{ __("generated.Nom") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 147px;">{{ __("generated.Diplôme") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 181px;">{{ __("generated.Option") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 105px;">{{ __("generated.Expérience") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 172px;">{{ __("generated.Poste actuel") }}</th>
                                            <th  rowspan="2"
                                                style="font-weight: 600;width: 178px;">{{ __("generated.Poste souhaité") }}</th>
                                            {{-- <th class="translated_text" rowspan="2"
                                                style="font-weight: 600;text-align: center;width: 10px;">
                                            </th> --}}
                                            <th  colspan="2"
                                                style="font-weight: 600;text-align: center;">{{ __("generated.Date") }}</th>
                                            {{-- <th  rowspan="2"
                                                style="font-weight: 600;text-align: right;width: 71px;">{{ __("generated.Action") }}</th> --}}
                                        </tr>
                                        <tr style="vertical-align: middle;">
                                            <th 
                                                style="font-weight: 600;width: 100px;">{{ __("generated.Dépôt CV") }}</th>
                                            <th  style="font-weight: 600;">{{ __("generated.Modification") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 13px">
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="row align-items-center mx-0 mb-4">
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
    </main>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    var vivierTalentListingData = "{{ route('profile.listing.vivierTalent') }}";
</script>
@vite(['resources/js/profile/preview-vivier.js'])
 <!-- style css for this template -->
     <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

</html>
