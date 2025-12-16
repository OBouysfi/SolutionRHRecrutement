<div class="tab-pane fade" id="tabLR11120" role="tabpanel" aria-labelledby="tabLR11120-tab">

    <div class="card border-0 mb-4">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row justify-content-center ">

                                <div class="col-2 ms-auto"
                                    style="width: 22%;height: 50px !important;margin-top: auto;margin-bottom: auto;">
                                    <div class="row" style="justify-content: end;">
                                        <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top"
                                            style="margin-right: -15px;" title="{{ __("generated.Aperçu") }}">
                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                <a href="{{ route('detail.matching.preview', ['match' => $match, 'profile' => $profile, 'jobOffer' => $joboffer]) }}"
                                                    target="_blank"><i
                                                        class="bi bi-binoculars avatar   rounded h5"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-auto" data-bs-toggle="tooltip" data-bs-placement="top"
                                            style="margin-right: 0;" title="{{ __("generated.Partager") }}">
                                            <div class="avatar avatar-50 rounded bg-light-theme">
                                                <a href="#" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#emailcompose">
                                                    <i class="bi bi-share avatar   rounded h5"></i>
                                                </a>
                                            </div>
                                        </div>
                                            {{--   <div class="col-auto" data-bs-toggle="tooltip" --}}
                                            {{--    -  data-bs-placement="top" --}}
                                            {{--    -  style="margin-right: 0;"> --}}
                                            {{--    -  <div --}}
                                            {{--    -      class="avatar avatar-50 rounded bg-light-theme"> --}}
                                            {{--    -      <a href="#" type="button"> --}}
                                            {{--    -          <i --}}
                                            {{--    -              class="bi bi-cloud-download avatar   rounded h5"></i> --}}
                                            {{--    -      </a> --}}
                                            {{--    -  </div> --}}
                                            {{-- - </div> --}}

                                            {{-- - <div class="col-auto" data-bs-toggle="tooltip" --}}
                                            {{--     - data-bs-placement="top" --}}
                                            {{--     - style="margin-right: -15px;"> --}}
                                            {{--     - <div --}}
                                            {{--       -   class="avatar avatar-50 rounded bg-light-theme "> --}}
                                            {{--        -  <i --}}
                                            {{--             - class="bi bi-printer avatar   rounded h5"></i> --}}
                                            {{--     - </div> --}}
                                            {{-- - </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body p-0" style="padding: 10px 33px;">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            {{-- <h4
                                                class="title custom-title translated_text">
                                                Rapport Matching
                                            </h4> --}}
                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <h6 class="fw-medium mb-0 translated_text">
                                                        {{ __("generated.Rapport Matching") }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table">
                                                <thead style="font-size: 14px">
                                                    <tr>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;width: 200px;"
                                                            class="translated_text">
                                                            {{ __("generated.Intitulé") }}
                                                        </th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                        </th>
                                                        <th colspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center;width: 111px;"
                                                            class="translated_text">
                                                            {{ __("generated.Candidat") }}
                                                        </th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                        </th>
                                                        <th colspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;text-align: center"
                                                            class="translated_text">
                                                            {{ __("generated.Recruteur") }}
                                                        </th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 2px">
                                                        </th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 87px;"
                                                            class="translated_text">
                                                            {{ __("generated.Ecart") }}
                                                        </th>
                                                        <th rowspan="2"
                                                            style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;vertical-align: middle;text-align: right;width: 90px;"
                                                            class="translated_text">
                                                            {{ __("generated.Score") }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: center"
                                                            class="translated_text">
                                                            {{ __("generated.Indicateur") }}
                                                        </th>
                                                        <th style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: center"
                                                            class="translated_text">
                                                            {{ __("generated.Tolérance") }}
                                                        </th>
                                                        <th style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 66px;text-align: center"
                                                            class="translated_text">
                                                           {{ __("generated.Indicateur") }}
                                                        </th>
                                                        <th style="border-top: 1px solid #cfcdcd;border-bottom: 1px solid #cfcdcd;width: 112px;text-align: center"
                                                            class="translated_text">
                                                            {{ __("generated.Tolérance") }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 14px">

                                                    <tr>
                                                        <td colspan="10" class="td-separator translated_text">
                                                            {{ __("generated.Profil") }}
                                                        </td>
                                                    </tr>
                                                    @foreach ($matchingDetailProfile as $detail)
                                                        <tr style="vertical-align: middle; white-space: nowrap;">
                                                            <td
                                                                style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;">
                                                                {{ $detail->name }}
                                                            </td>
                                                            <td style="border: 0;width: 30px;">
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center;padding: 17px 13px;text-indent: 20px">
                                                                {{ $detail->profileIndicator }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td style="border: 0;width: 2px">
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center;padding: 17px 13px;">
                                                                {{ $detail->jobOfferIndicator }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td style="border: 0;width: 2px">
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($detail->ecart, 2) }}%&nbsp;
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small" style="float: right">
                                                                    <div id="circleprogressgreenRM-{{ $detail->id }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="10" class="translated_text td-separator">
                                                            {{ __("generated.Mobilité") }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="padding-left: 20px;border-bottom: 1px solid #cfcdcd;"
                                                            class="translated_text">
                                                            {{ __("generated.Mobilité géographique") }}
                                                        </td>
                                                        <td rowspan="12" style="width: 2px;border-bottom: 0;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td rowspan="12" style="width: 2px;border-bottom: 0;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td rowspan="12" style="width: 2px;border-bottom: 0;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                    </tr>
                                                    @foreach ($matchingDetailMobilityGeographique as $details)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                <i class="bi bi-square-fill"
                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i>
                                                                <span>{{ $details->mobility }}</span>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                {{ $details->profileScore }}%
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                {{ $details->jobOfferScore }}%
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($details->ecart, 2) }}%<i
                                                                    class="bi bi-arrow-up-right"
                                                                    style="color: #2e9c65;font-size: 15px"></i>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small" style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ $details->id }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    <tr>
                                                        <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;"
                                                            class="translated_text">
                                                            {{ __("generated.Mode de travail") }}
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                    </tr>


                                                    @foreach ($matchingDetailsModeWork as $detail)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                <i class="bi bi-square-fill"
                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>
                                                                    {{ $detail->modeWork }}
                                                                </span>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                {{ $detail->profileScore }}%
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                {{ $detail->jobofferScore }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($detail->ecart, 2) }}%
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small" style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ $detail->id }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    <tr>
                                                        <td style="border-bottom: 1px solid #cfcdcd;padding-left: 20px;"
                                                            class="translated_text">
                                                            {{ __("generated.Temps de travail") }}
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                        <td style="border-bottom: 1px solid #cfcdcd;">
                                                        </td>
                                                    </tr>
                                                    @foreach ($matchingDetailsTimeWork as $detail)
                                                        <tr style="vertical-align: middle;">
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;padding-left: 40px;">
                                                                <i class="bi bi-square-fill"
                                                                    style="font-size: 6px;margin-top: 7px;margin-right: 9px;float: left;"></i><span>{{ $detail->timeWork }}</span>
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: center">
                                                                --
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                {{ round($detail->ecart, 2) }}
                                                            </td>
                                                            <td
                                                                style="border-bottom: 1px solid #cfcdcd;text-align: right">
                                                                <div class="circle-small" style="float: right">
                                                                    <div
                                                                        id="circleprogressgreenRM-{{ $detail->id }}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="10" class="translated_text td-separator">
                                                             {{ __("generated.Compétences techniques") }}
                                                        </td>
                                                    </tr>

                                                    @foreach ($matchingDetailsTechnicalSkills as $skillType => $skills)
                                                        <tr >
                                                            <td
                                                                style="padding-left: 20px; border-bottom: 1px solid #cfcdcd;">
                                                                {{ $skillType }}
                                                            </td>
                                                            <td rowspan="{{ $skills->count() + 1 }}"
                                                                style="width: 2px; border-bottom: 0;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td rowspan="{{ $skills->count() + 1 }}"
                                                                style="width: 2px; border-bottom: 0;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td rowspan="{{ $skills->count() + 1 }}"
                                                                style="width: 2px; border-bottom: 0;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                        </tr>

                                                        @foreach ($skills as $skill)
                                                            <tr style="vertical-align: middle;">
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                    <i class="bi bi-square-fill"
                                                                        style="font-size: 6px; margin-top: 7px; margin-right: 9px; float: left;"></i>
                                                                    <span>{{ $skill->skillName }}</span>
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    {{ $skill->profileScore }}%
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    --
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    {{ $skill->jobOfferScore }}%
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    --
                                                                </td>

                                                                @php
                                                                    $arrowClass =
                                                                        $skill->ecart > 0
                                                                            ? 'bi-arrow-up-right'
                                                                            : 'bi-arrow-down-left';
                                                                    $arrowColor =
                                                                        $skill->ecart > 0 ? '#2e9c65' : '#dd2255';
                                                                @endphp

                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    {{ round($skill->ecart, 2) }}%&nbsp;
                                                                    <i class="bi {{ $arrowClass }}"
                                                                        style="color: {{ $arrowColor }}; font-size: 15px"></i>
                                                                </td>

                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    <div class="circle-small" style="float: right;">
                                                                        <div
                                                                            id="circleprogressgreenRM-{{ $skill->id }}">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="10" class="translated_text td-separator">
                                                             {{ __("generated.Compétences personnelles") }}
                                                        </td>
                                                    </tr>

                                                    @foreach ($matchingDetailsPersonalSkills as $skillType => $skills)
                                                        <tr>
                                                            <td
                                                                style="padding-left: 20px; border-bottom: 1px solid #cfcdcd;">
                                                                {{ $skillType }}
                                                            </td>
                                                            <td rowspan="{{ $skills->count() + 1 }}"
                                                                style="width: 2px; border-bottom: 0;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td rowspan="{{ $skills->count() + 1 }}"
                                                                style="width: 2px; border-bottom: 0;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td rowspan="{{ $skills->count() + 1 }}"
                                                                style="width: 2px; border-bottom: 0;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                            <td style="border-bottom: 1px solid #cfcdcd;">
                                                            </td>
                                                        </tr>

                                                        @foreach ($skills as $skill)
                                                            <tr style="vertical-align: middle;">
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                    <i class="bi bi-square-fill"
                                                                        style="font-size: 6px; margin-top: 7px; margin-right: 9px; float: left;"></i>
                                                                    <span>{{ $skill->skillName }}</span>
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    {{ $skill->profileScore }}%
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    --
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    {{ $skill->jobOfferScore }}%
                                                                </td>
                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                    --
                                                                </td>

                                                                @php
                                                                    $arrowClass =
                                                                        $skill->ecart > 0
                                                                            ? 'bi-arrow-up-right'
                                                                            : 'bi-arrow-down-left';
                                                                    $arrowColor =
                                                                        $skill->ecart > 0 ? '#2e9c65' : '#dd2255';
                                                                @endphp

                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    {{ round($skill->ecart, 2) }}%&nbsp;
                                                                    <i class="bi {{ $arrowClass }}"
                                                                        style="color: {{ $arrowColor }}; font-size: 15px"></i>
                                                                </td>

                                                                <td
                                                                    style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                    <div class="circle-small" style="float: right;">
                                                                        <div
                                                                            id="circleprogressgreenRM-{{ $skill->id }}">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="10" class="translated_text td-separator">
                                                             {{ __("generated.Compétences linguistiques") }}
                                                        </td>
                                                    </tr>

                                                    <!-- Boucle sur Compétences linguistiques -->
                                                    @if ($matchingDetailsLinguistiqueSkills->isNotEmpty())
                                                        @foreach ($matchingDetailsLinguistiqueSkills as $detail)
                                                            @if ($detail->isNotEmpty())
                                                                <tr style="vertical-align: middle;">
                                                                    <td
                                                                        style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                        {{ optional($detail->first())->skill->skillType->label }}
                                                                    </td>
                                                                    <td rowspan="{{ $detail->count() + 1 }}"
                                                                        style="width: 2px; border-bottom: 0;">
                                                                    </td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;">
                                                                    </td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;">
                                                                    </td>
                                                                    <td rowspan="{{ $detail->count() + 1 }}"
                                                                        style="width: 2px; border-bottom: 0;">
                                                                    </td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;">
                                                                    </td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;">
                                                                    </td>
                                                                    <td rowspan="{{ $detail->count() + 1 }}"
                                                                        style="width: 2px; border-bottom: 0;">
                                                                    </td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;">
                                                                    </td>
                                                                    <td style="border-bottom: 1px solid #cfcdcd;">
                                                                    </td>
                                                                </tr>

                                                                @foreach ($detail as $detailSkill)
                                                                    <tr style="vertical-align: middle;">
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; padding-left: 40px;">
                                                                            <i class="bi bi-square-fill"
                                                                                style="font-size: 6px; margin-top: 7px; margin-right: 9px; float: left;"></i>
                                                                            <span>{{ optional($detailSkill->skill)->label }}</span>
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                            {{ $detailSkill->profile_score * 100 }}%
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                            --
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                            {{ $detailSkill->job_offer_score * 100 }}%
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                            --
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; text-align: center;">
                                                                            {{ round($detailSkill->ecart, 2) }}%
                                                                        </td>
                                                                        <td
                                                                            style="border-bottom: 1px solid #cfcdcd; text-align: right;">
                                                                            <div class="circle-small"
                                                                                style="float: right;">
                                                                                <div
                                                                                    id="circleprogressgreenRM-{{ $detailSkill->id }}">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
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
