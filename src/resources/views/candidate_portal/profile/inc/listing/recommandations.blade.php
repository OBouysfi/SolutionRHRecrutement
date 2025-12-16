<div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            {{-- <div class="col-auto">
                <i class="bi bi-balloon-heart h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
            </div> --}}
            <div class="col ps-0">
                <h6 class="fw-medium mb-0 ">{{ __("generated.Recommendations") }}</h6>
            </div>
            <div class="col-auto">
                <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('6')">
                    <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Modifier"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@forelse($recommandations as $recommandation)
    <div class="card border-0 mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 14px 33px;">
                            <div class="row mb-3 mt-3">
                                <div class="col-auto">
                                    <figure class="avatar-60 avatar rounded-circle coverimg"
                                        style="background-image: url('{{ $recommandation->photo ? asset($recommandation->photo) : asset('assets/img/default-avatar-photo-placeholder-grey-600nw-2004239303.webp') }}');">
                                        <img src="{{ $recommandation->photo ? asset($recommandation->photo) : asset('assets/img/default-avatar-photo-placeholder-grey-600nw-2004239303.webp') }}"
                                            alt="Photo de {{ $recommandation->first_name ?? 'Utilisateur' }}"
                                            class="d-none">
                                    </figure>
                                </div>

                                <div class="col">
                                    <h6 class="mb-1">
                                        {{ $recommandation->first_name && $recommandation->last_name ? $recommandation->first_name . ' ' . $recommandation->last_name : '_' }}
                                        </p>
                                    </h6>
                                    <p class="text-secondary">
                                        {{ $recommandation->poste ?? ' - ' }}.
                                        Recommandé le
                                        {{ \Carbon\Carbon::parse($recommandation->created_at)->translatedFormat('d F Y') }}
                                    </p>

                                    <h6 class="fw-normal" style="text-align: justify">
                                        {{ $recommandation->message ?? ' - ' }}
                                    </h6>
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
                                    <h6 >{{ __("generated.Ce profil n'a aucune recommandation") }}</h6>
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
        <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('6')">
            <button class="btn btn-theme " type="button"
                style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button></a>
    </div>
</div>
