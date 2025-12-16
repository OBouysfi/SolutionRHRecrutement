<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body" style="padding: 48px">
                    <div class="row mb-5">
                        <div class="col-8"><span><img src="{{ asset('assets/img/icon/Recruitment.png') }}" alt="" style="width: 30%;"></span></div>
                        <div class="col-auto ms-auto" style="padding-top: 15px;">
                            <h4 class="title custom-title translated_text" style="font-size: 25px;">{{ __("generated.CVthèque") }}</h4>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 " style="text-align: center;">
                            <span>
                                <span>
                                    {{ __("generated.Du") }} {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}
                                    {{ __("generated.au") }} {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
                                </span>
                            </span>
                        </div>
                    </div>
                <div class="row justify-content-center mb-3">
                    <div class="row mt-3 mb-3">
                        <div class="col-3">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-40 rounded bg-light-theme">
                                                                <i class="bi bi-database h5"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0 translated_text">{{ __("generated.CVthèque") }}</h6>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="dropdown d-inline-block">
                                                                <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"
                                                                        style="font-size: 21px;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="padding: 0px; min-width: 99px !important;">
                                                                    <li><a class="dropdown-item show-detail show-row1 translated_text"
                                                                            data-detail="1" href="javascript:void(0)"
                                                                            id="flt-chartall">{{ __("generated.Détail") }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">
                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0" data-bs-toggle="modal"
                                                                data-bs-target="#billpay" style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small circleprogressgreen11">
                                                                                <div id="circleprogressgreen11">
                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto" style="margin-right: 0px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme cvthequeTotal"
                                                                                style="width: 100%;color: #000;">
                                                                                {{-- {{ $statsComparison['cvtheque']['total'] }}&nbsp; --}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span class="text-green cvthequeChange"
                                                                                        id="cvthequeChange"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        {{-- {{ abs($statsComparison['cvtheque']['change']) }}% --}}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto cvthequeIcon"
                                                                                    id="cvthequeIcon">
                                                                                    {{-- @if ($statsComparison['cvtheque']['change'] == 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-blue">
                                                                                            <i class="bi bi-arrow-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['cvtheque']['change'] > 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-green">
                                                                                            <i class="bi bi-arrow-up-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['cvtheque']['change'] < 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-red">
                                                                                            <i class="bi bi-arrow-down-left"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @endif --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-40 rounded bg-light-theme"
                                                                style="background-color: rgba(145, 195, 0, 0.5) !important;">
                                                                <i class="bi bi-people h5" style="color: #638502 !important;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Profils actifs") }}</h6>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="dropdown d-inline-block">
                                                                <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"
                                                                        style="font-size: 21px;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="padding: 0px; min-width: 99px !important;">
                                                                    <li><a class="dropdown-item show-detail show-row1 translated_text"
                                                                            data-detail="2" href="javascript:void(0)"
                                                                            id="flt-chart1">{{ __("generated.Détail") }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">
                    
                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0" data-bs-toggle="modal"
                                                                data-bs-target="#billpay" style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small circleprogressgreen22">
                                                                                <div id="circleprogressgreen22">
                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto" style="margin-right: 0px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme activeProfilesTotal"
                                                                                style="width: 100%;color: #000;">
                                                                                {{-- {{ $statsComparison['active_profiles']['total'] }}&nbsp; --}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span class="text-green activeProfilesChange"
                                                                                        id="activeProfilesChange"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        {{-- {{ abs($statsComparison['active_profiles']['change']) }}% --}}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto activeProfilesIcon"
                                                                                    id="activeProfilesIcon">
                                                                                    {{-- @if ($statsComparison['active_profiles']['change'] == 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-blue">
                                                                                            <i class="bi bi-arrow-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['active_profiles']['change'] > 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-green">
                                                                                            <i class="bi bi-arrow-up-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['active_profiles']['change'] < 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-red">
                                                                                            <i class="bi bi-arrow-down-left"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @endif --}}
                                                                                </div>
                                                                            </div>
                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                    
                                                            <div class="avatar avatar-40 rounded bg-light-theme"
                                                                style="background-color: rgba(240, 61, 79, 0.40) !important;">
                                                                <i class="bi bi-person-check h5"
                                                                    style="color: #b51121 !important;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Profils qualifiés") }}</h6>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="dropdown d-inline-block">
                                                                <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"
                                                                        style="font-size: 21px;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="padding: 0px; min-width: 99px !important;">
                                                                    <li><a class="dropdown-item show-detail show-row1 translated_text"
                                                                            data-detail="3" href="javascript:void(0)"
                                                                            id="flt-chart2">{{ __("generated.Détail") }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">
                    
                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0" data-bs-toggle="modal"
                                                                data-bs-target="#billpay" style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small circleprogressgreen33">
                                                                                <div id="circleprogressgreen33">
                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto" style="margin-right: 0px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme qualifiedProfilesTotal"
                                                                                style="width: 100%;color: #000;">
                                                                                {{-- {{ $statsComparison['qualified_profiles']['total'] }}&nbsp; --}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span
                                                                                        class="text-green qualifiedProfilesChange"
                                                                                        id="qualifiedProfilesChange"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        {{-- {{ abs($statsComparison['qualified_profiles']['change']) }}% --}}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto qualifiedProfilesIcon"
                                                                                    id="qualifiedProfilesIcon">
                                                                                    {{-- @if ($statsComparison['qualified_profiles']['change'] == 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-blue">
                                                                                            <i class="bi bi-arrow-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['qualified_profiles']['change'] > 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-green">
                                                                                            <i class="bi bi-arrow-up-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['qualified_profiles']['change'] < 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-red">
                                                                                            <i class="bi bi-arrow-down-left"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @endif --}}
                                                                                </div>
                                                                            </div>
                    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card border-0"  >
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="card border-0  ">
                                                <div class="card-header " style="padding: 15px 9px 9px 9px">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar avatar-40 rounded bg-light-theme"
                                                                style="background-color: rgba(1, 94, 194, 0.4) !important;">
                                                                <i class="bi bi-person-bounding-box h5"
                                                                    style="color: #01448d !important;"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Profils pertinents") }}</h6>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="dropdown d-inline-block">
                                                                <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    data-bs-auto-close="outside" aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"
                                                                        style="font-size: 21px;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="padding: 0px; min-width: 99px !important;">
                                                                    <li><a class="dropdown-item show-detail show-row1 translated_text"
                                                                            data-detail="4" href="javascript:void(0)"
                                                                            id="flt-chart3">{{ __("generated.Détail") }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-2">
                    
                                                        <div class="col text-center">
                                                            <a href="#" class="card border-0" data-bs-toggle="modal"
                                                                data-bs-target="#billpay" style="background-color: #e6eaee;">
                                                                <div class="card-body " style="height: 69px !important;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <div class="circle-small circleprogressgreen44">
                                                                                <div id="circleprogressgreen44">
                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto" style="    margin-right: 24px;">
                                                                            <p class="bi bi- h4 avatar avatar-40 rounded text-theme validationProfilesTotal"
                                                                                style="width: 100%;color: #000;">
                                                                                {{-- {{ $statsComparison['validation_profiles']['total'] }}&nbsp; --}}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="row">
                                                                                <div class="col-auto"
                                                                                    style="margin-top: 8px;margin-right: -16px;">
                                                                                    <span
                                                                                        class="text-green validationProfilesChange"
                                                                                        id="validationProfilesChange"
                                                                                        style="color: #000 !important;font-size: 18px;font-weight: 100;margin-top: 8px;">
                                                                                        {{-- {{ abs($statsComparison['validation_profiles']['change']) }}% --}}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-auto validationProfilesIcon"
                                                                                    id="validationProfilesIcon">
                                                                                    {{-- @if ($statsComparison['validation_profiles']['change'] == 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-blue">
                                                                                            <i class="bi bi-arrow-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['validation_profiles']['change'] > 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-green">
                                                                                            <i class="bi bi-arrow-up-right"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @elseif ($statsComparison['validation_profiles']['change'] < 0)
                                                                                        <div
                                                                                            class="avatar avatar-40 rounded-circle bg-red">
                                                                                            <i class="bi bi-arrow-down-left"
                                                                                                style="color: #FFF"></i>
                                                                                        </div>
                                                                                    @endif --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
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
                <div class="col-12">
                 <input type="file" id="demo-file" class="hidden">
                 <table class="table">
                   <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                    <tr style="vertical-align: middle;">
                    <th class="translated_text" rowspan="2" style="font-weight: 600;text-align: center">#</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;">{{ __("generated.Matricule") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;">{{ __("generated.Prénom") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;width: 147px;">{{ __("generated.Nom") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;width: 147px;">{{ __("generated.Diplôme") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;width: 181px;">{{ __("generated.Option") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;width: 105px;">{{ __("generated.Expérience") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;width: 172px;">{{ __("generated.Poste actuel") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;width: 178px;">{{ __("generated.Poste souhaité") }}</th>
                    <th class="translated_text" colspan="2" style="font-weight: 600;text-align: center;width: 71px;">{{ __("generated.Profils") }}</th>
                    <th class="translated_text" rowspan="2" style="font-weight: 600;text-align: center;width: 10px;"></th>
                    <th class="translated_text" colspan="2" style="font-weight: 600;text-align: center;">{{ __("generated.Date") }}</th>
                </tr>
                <tr style="vertical-align: middle;">
                    <th class="translated_text" style="font-weight: 600;width: 51px;">{{ __("generated.Actif") }}</th>
                    <th class="translated_text" style="font-weight: 600;">{{ __("generated.Qualifié") }}</th>
                    <th class="translated_text" style="font-weight: 600;width: 100px;">{{ __("generated.Dépôt CV") }}</th>
                    <th class="translated_text" style="font-weight: 600;">{{ __("generated.Modification") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($profiles as $profile)
                    <tr>
                        <td style="vertical-align: middle;">
                            <img src="{{ $profile?->getAvatarUrl() }}" alt="Picture" class="" width="40" style="max-width:none;">
                        </td>
                        <td style="vertical-align: middle;">{{ $profile?->matricule ?? ' - ' }}</td>
                        <td style="vertical-align: middle;">{{ $profile?->first_name ?? ' - ' }}</td>
                        <td style="vertical-align: middle;">{{ $profile?->last_name ?? ' - ' }}</td>
                        <td style="vertical-align: middle;">
                            @foreach ($profile?->formations as $formation)
                                {{ __($formation?->diploma?->label) ?? '-' }}<br>
                            @endforeach
                        </td>
                        <td style="vertical-align: middle;">
                            @foreach ($profile?->formations as $formation)
                                {{ __($formation?->option?->label) ?? '-' }}<br>
                            @endforeach
                        </td>
                        <td style="vertical-align: middle;">
                            {{ $profile?->total_experience_in_years . ' ans' . ' et ' . $profile?->total_experience . ' mois' }}
                        </td>
                        <td style="vertical-align: middle;">{{ __($profile?->profession?->label) ?? '' }}</td>
                        <td style="vertical-align: middle;">{{ __($profile?->desired_profile) ?? '' }}</td>
                        <td style="vertical-align: middle;">
                            <div class="form-check form-switch" style="margin-top: 7px;">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    value="{{ $profile?->is_active }}" id="isActive_{{ $profile?->id }}"
                                    {{ $profile?->is_active ? 'checked' : '' }} disabled>
                            </div>
                        </td>
                        <td style="vertical-align: middle;">
                            <div class="form-check form-switch" style="margin-top: 7px; margin-left: 15px;">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    value="{{ $profile?->is_qualified }}" id="isQualified_{{ $profile?->id }}"
                                    {{ $profile?->is_qualified ? 'checked' : '' }} disabled>
                            </div>
                        </td>
                        <td style="font-weight: 600;text-align: center;width: 10px;"></td>
                        <td style="vertical-align: middle;">{{ $profile?->created_at?->toDateString() ?? '' }}</td>
                        <td style="vertical-align: middle;">{{ $profile?->updated_at?->toDateString() ?? ' - ' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="translated_text" colspan="12" style="text-align: center; font-weight: bold;">
                            {{ __("generated.Aucune donnée disponible dans le tableau") }}
                        </td>
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