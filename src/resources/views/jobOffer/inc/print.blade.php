<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <meta name="csrf-token" content="NI9WPU8xPqOt076CBU6hJ8eBiqpRRCBY53S0TX57">



    <title >{{ __("generated.Offres d'emploi") }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable">


    <!-- Favicons -->

    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/icon/icon_favicon.png') }}" sizes="16x16" type="image/png">

</head>

<body>
    <!-- content -->

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body" style="padding: 48px">
                        <div class="row mb-5">
                            <div class="col-8"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}"
                                        alt="" style="width: 30%;"></span></div>
                            <div class="col-auto ms-auto" style="padding-top: 15px;">
                                <h4 class="title custom-title " style="font-size: 25px;">{{ __("generated.Offres d'emploi") }}</h4>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 " style="text-align: center;">
                                {{-- <span>
                                    <span class="translated_text">
                                        Du {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                                        au {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
                                    </span>
                                </span> --}}
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-12">
                                <input type="file" id="demo-file" class="hidden">
                                <table class="table">
                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;text-align: center;">
                                        <tr style="vertical-align: middle;">
                                            <th rowspan="2" >{{ __("generated.N° client") }}</th>
                                            <th rowspan="2" >{{ __("generated.Client") }}</th>
                                            <th rowspan="2" >{{ __("generated.Intitulé du poste") }}</th>
                                            <th rowspan="2" >{{ __("generated.Type de contrat") }}</th>
                                            <th rowspan="2" >{{ __("generated.Localisation") }}</th>
                                            <th rowspan="2" >{{ __("generated.Diplôme") }}</th>
                                            <th rowspan="2" >{{ __("generated.Expérience") }}</th>
                                            <th colspan="2" >{{ __("generated.Période de l'offre") }}</th>
                                            <th rowspan="2" >{{ __("generated.Statut") }}</th>
                                        </tr>
                                        <tr>
                                            <th style="font-weight: 600" >{{ __("generated.Date de début") }}</th>
                                            <th style="font-weight: 600" >{{ __("generated.Date de fin") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 13px">
                                        @forelse($JobOffers as $jobOffer)
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    {{ $jobOffer->client->id ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $jobOffer->client->name ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $jobOffer->title ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ \App\Enums\Profile\ContractTypeProfileEnum::getAbbrValue($jobOffer->contract_type_id) ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $jobOffer->city->name ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $jobOffer->diplomas->pluck('label')->implode(', ') ?: '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ $jobOffer->jobOfferExperience->sum('years') ?? 0 }} ans
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ optional($jobOffer->mission_started_at)->format('d/m/Y') ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ optional($jobOffer->mission_finished_at)->format('d/m/Y') ?? '-' }}
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    {{ \App\Enums\JobOffer\StatusJobOfferEnum::getValue($jobOffer->status_id) ?? '-' }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td  colspan="11" style="text-align: center; font-weight: bold;">{{ __("generated.Aucune donnée disponible dans le tableau") }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
