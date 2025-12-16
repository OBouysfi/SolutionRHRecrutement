<div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            {{-- <div class="col-auto">
                <i class="bi bi-mortarboard h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
            </div> --}}
            <div class="col ps-0">
                <h6 class="fw-medium mb-0 ">{{ __("generated.Formations") }}</h6>
            </div>
            <div class="col-auto">
                <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('2')">
                    <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Modifier"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@forelse($formations as $formation)
    <div class="card border-0 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding-left: 30px">
                            <div class="row mb-3 mt-3">
                                <div class="col-auto">
                                    <img src="{{ $formation->logo ? asset($formation->logo) : asset('assets/img/high-school-modern-simple-icon-vector.jpg') }}"
                                        alt="" style="width: 60px;">
                                </div>
                                <div class="col">
                                    <h6>{{ $formation->name ?? ' - ' }}
                                    </h6>
                                    <p class="text-secondary" style="margin-bottom: 0;">
                                        {{ $formation->diploma->label ?? ' - ' }}
                                    </p>
                                    <p class="text-secondary translated_text">
                                        {{ \Carbon\Carbon::parse($formation->stared_at)->translatedFormat('d F Y') ?? ' - ' }}
                                        -
                                        {{ \Carbon\Carbon::parse($formation->finished_at)->translatedFormat('d F Y') ?? ' - ' }},

                                        @if (!empty($formation->durationYears) && $formation->durationYears > 0)
                                            {{ __($formation->durationYears) }}
                                            ans
                                        @endif

                                        @if (!empty($formation->durationMonths) && $formation->durationMonths > 0)
                                            {{ __($formation->durationMonths) }}
                                            mois
                                        @endif
                                    </p>

                                    <p>{{ $formation->option->label ?? ' - ' }}
                                    </p>
                                    <p>
                                        {{ __($formation->description) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="card border-0 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding-left: 30px">
                            <div class="row mb-3 mt-3">
                                <div class="col-auto">
                                    <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                        alt="" style="width: 60px;">
                                </div>
                                <div class="col px-5 py-3">
                                    <h6 >{{ __("generated.Ce profil n'a aucune formations") }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforelse

<div class="row">
    <div class="col-12  mb-4">
        <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('2')">
            <button class="btn btn-theme " type="button"
                style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button></a>
    </div>
</div>
