<html lang="fr" class="light-mode" dir="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="dd1D4M5CFxnIP1VLSBluI3b8oBERcdXTanpbETKD">

    <title >{{ __("generated.HumanJobs - Historique des missions") }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">


    <!-- Favicons -->

    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">

  

<body class="" data-sidebarstyle="sidebar-pushcontent">


    <main class="main mainheight">
        <div class="container mt-4">
            <div class="row mb-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 48px">
                            <div class="row mb-5">
                                <div class="col-auto"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}"
                                            srcset="/assets/img/icon/Recruitment.png" alt=""
                                            style="width: 35%;"></span></div>
                                <div class="col-auto ms-auto" style="padding-top: 15px;">
                                    <h4 class="title custom-title " style="font-size: 25px;">{{ __("generated.Missions précédentes") }}</h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 " style="text-align: center;">

                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-12">
                                    <table class="table table-mission table-responsive tous mission-history-table"
                                        data-show-toggle="true" style="width: 100%;">
                                        <thead
                                            style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                            <tr>
                                                <th  style="width: 78px;padding: 12px 8px;">{{ __("generated.N°") }}</th>
                                                <th  style="width: 186px;padding: 12px 8px;">{{ __("generated.Client") }}</th>
                                                <th  style="width: 111px;padding: 12px 8px;">{{ __("generated.Date début") }}</th>
                                                <th  style="width: 111px;padding: 12px 8px;">{{ __("generated.Date fin") }}</th>
                                                <th  style="padding: 12px 8px;width: 200px;">{{ __("generated.Poste") }}</th>
                                                <th  style="width: 83px;padding: 12px 8px;">{{ __("generated.Durée") }}</th>
                                                <th  style="text-align: center;width: 165px;padding: 12px 8px;">{{ __("generated.Présélectionnés") }}</th>
                                                <th  style="text-align: center;width: 133px;padding: 12px 8px;">{{ __("generated.En entretien") }}</th>
                                                <th  style="text-align: center;width: 128px;padding: 12px 8px;">{{ __("generated.Retenus") }}</th>
                                                <th  style="text-align: center;width: 136px;padding: 12px 8px;">{{ __("generated.Embauchés") }}</th>
                                                <th  style="text-align: center;width: 127px;padding: 12px 8px;">{{ __("generated.Rejetés") }}</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 13px; text-align: center;">
                                            
                                            @foreach($jobOffers as $jobOffer)
                                             {{-- @dump($jobOffer) --}}
                                                @php
                                                
                                                    $duration = $jobOffer->duration;
                                                    if ($duration != null && $duration > 12) {
                                                        $years = floor($duration / 12);
                                                        $remainingMonths = $duration % 12;
                                                      $years == 1
                                                            ? $duration = "$years an et $remainingMonths mois"
                                                            : $duration = "$years ans et $remainingMonths mois";
                                                    } elseif ($duration != null && $duration <= 12) {
                                                        $duration = "$duration mois";
                                                    } else {
                                                         $duration = ' - ';
                                                    }
                                                @endphp
                                                @php 
                                                    $interview = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::INTERVIEW)); 
                                                    $retained = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::RETAINED)); 
                                                    $hired = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::HIRING)); 
                                                    $rejected = count($jobOffer->trackingApplications->where('status_id', App\Enums\TrackingApplication\StatusTrackingApplicationEnum::DISCARDED));
                                                @endphp  
                                                <tr>
                                                    <td class=" translated_text" style="text-align: left;vertical-align: middle">
                                                        {{ __($jobOffer->id) }}</td>
                                                    <td class=" translated_text" style="vertical-align: middle">{{ $jobOffer->client->name ?? '-' }}
                                                    </td>
                                                    <td class=" translated_text" style="vertical-align: middle">{{ $jobOffer->mission_started_at  ?? '-'}}</td>
                                                    <td class=" translated_text" style="vertical-align: middle">{{ $jobOffer->mission_finished_at ?? '-'}}</td>
                                                    <td class=" translated_text" style="vertical-align: middle">{{ $jobOffer->title ?? '-'}}</td>
                                                    <td class=" translated_text" style="vertical-align: middle">{{ __($duration) }}</td>
                                                    <td class=" translated_text" style="text-align: center;vertical-align: middle">{{ count($jobOffer->trackingApplications) ?? '-' }}</td>
                                                    <td class=" translated_text" style="text-align: center;vertical-align: middle">{{ $interview ?? '-'}}</td>
                                                    <td class=" translated_text" style="text-align: center;vertical-align: middle">{{ $retained ?? '-' }}</td>
                                                    <td class=" translated_text" style="text-align: center;vertical-align: middle">{{ $hired ?? '-' }}</td>
                                                    <td class=" translated_text" style="text-align: center;vertical-align: middle">{{ $rejected ?? '-' }}</td>
                                                </tr>
                                            @endforeach
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
        </div>
    </main>

</body>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>


{{-- <script src="{{ asset('assets/js/jobOffer/history.js') }}"></script> --}}
@vite('resources/js/jobOffer/history.js')
<script>
    var jobOfferHistoryData = "{{ route('jobOffer.data.history') }}";
</script>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet">

</html>
