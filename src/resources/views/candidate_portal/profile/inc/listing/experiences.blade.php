<div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            {{-- <div class="col-auto">
                <i class="bi bi-briefcase h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
            </div> --}}
            <div class="col ps-0">
                <h6 class="fw-medium mb-0 ">{{ __("generated.Expériences") }}</h6>
            </div>
            <div class="col-auto">
                <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('3')">
                    <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Modifier"></i>
                </a>
            </div>
            {{-- </div>
            <div class="col-auto">
                <i class="bi bi-plus-square h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Ajouter une expérience"></i>
            </div> --}}
        </div>
    </div>
    @forelse($profile->experiences as $experience)
        <div class="card border-0 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body" style="padding-left: 30px">
                                <div class="row mb-3 mt-3">
                                    <div class="col-auto">
                                        <img src="{{ $experience->logo ? asset($experience->logo) : asset('assets/img/briefcase-icon-isolated-on-white-background-work-bag-symbol-free-vector.jpg') }}"
                                            alt="" style="width: 60px;">
                                    </div>
                                    <div class="col">
                                        <h6>{{ __($experience->profession?->label) }}</h6>
                                        <p class="text-secondary translated_text">
                                            Du
                                            {{ $experience->started_at->translatedFormat('d/m/Y') }}
                                            à
                                            {{ $experience->finished_at == null ? 'ce jour' : $experience->finished_at->translatedFormat('d/m/Y') }}
                                        </p>
                                        <p>{{ __($experience->description) }}</p>
                                        <h6 class="title"> {{ __("generated.Missions réalisées") }}</h6>
                                        <p><b>{{ __($experience->project_name) }}</b></p>
                                        @forelse($experience->missions as $mission)
                                            <p>{{ __($mission->description) }}</p>
                                            <div class="row mb-4">
                                                <div class="col-auto">
                                                    <span
                                                        class="badge badge-sm bg-blue">#{{ __($mission->experience->skills_tech) }}</span>
                                                </div>
                                            </div>
                                        @empty
                                            <p><b >{{ __("generated.Aucune mission liée au cette éxperience") }}</b>
                                            </p>
                                        @endforelse
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
                                        <h6 >{{ __("generated.Ce profil n'a aucune éxperience") }}</h6>
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
            <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('3')">
                <button class="btn btn-theme " type="button"
                    style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button></a>
        </div>
    </div>
</div>
