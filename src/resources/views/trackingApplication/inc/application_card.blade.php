<div class="card mb-3 draggable-card" data-application-id="{{ __($application->id) }}"
    data-ratio="{{ optional($application->match)->ratio ?? 0 }}">
    <div class="card-body p-2">
        <!-- En-tête de la carte -->
        <div class="row align-items-center mb-3">
            <div class="col-auto">
                <div class="avatar avatar-50 coverimg me-1 translated_text" data-bs-toggle="tooltip"
                    title="{{ __('generated.Photo') }}"
                    style="background-image: url('{{ asset($application->profile?->path_picture ? 'storage/' . $application->profile?->path_picture : ($application->profile?->sexe === 'Femme' ? 'assets/img/Femmes/female-default.webp' : 'assets/img/Hommes/male-default.webp')) }}');">
                    <img src="{{ asset($application->profile?->path_picture ? 'storage/' . $application->profile?->path_picture : ($application->profile?->sexe === 'Femme' ? 'assets/img/ats/female-default.jpg' : 'assets/img/ats/male-default.webp')) }}"
                        alt="Photo de {{ __($application->profile?->first_name) }}" class="img-fluid rounded"
                        style="display: none;">
                </div>
            </div>
            <div class="col fs-12">
                <p class="mb-1 small text-muted translated_text">
                    Réf : {{ $application->profile?->matricule ?? $application->id }}
                </p>
                <p class="mb-0">{{ __($application->profile?->first_name) }}</p>
                <p class="mb-0">{{ __($application->profile?->last_name) }}</p>
            </div>
            <div class="col-auto">
                <div class="dropdown">
                    <a class="text-secondary" data-bs-toggle="dropdown" role="button">
                        <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            @if ($application->match && $application->profile && $application->jobOffer)
                                <a class="dropdown-item "
                                    href="{{ route('matching.detail', [$application->match->id, $application->profile?->id, $application->jobOffer->id]) }}"
                                    target="_blank">{{ __('generated.Détail') }}</a>
                            @endif
                        </li>
                        <li>
                            @if ($application->match && $application->profile && $application->jobOffer && !$application->is_abandon_candidature)
                                <a class="dropdown-item abandon-candidature " href="javascript:void(0);"
                                    data-id="{{ __($application->id) }}">
                                    {{ __('generated.Abandon candidature') }}</a>
                            @endif
                        </li>
                        <li>
                            @if ($application->is_abandon_candidature)
                                <a class="dropdown-item restore-candidature " href="javascript:void(0);"
                                    data-id="{{ __($application->id) }}">
                                    {{ __('generated.Restaurer candidature') }}</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Titre du poste -->
        <div class="row mb-3">
            <div class="col-12">
                <p class="fw-bold mb-0" style="font-size: 13px;">
                    {{ __($application->jobOffer?->profession?->label) }}</p>
            </div>
        </div>
        <!-- Score Matching avec ProgressBar -->
        <div class="row align-items-center">
            <div class="col">
                <span class="small ">{{ __('generated.Score Matching') }}</span>
            </div>
            <div class="col-auto">
                <!-- Le conteneur de la progress bar DOIT avoir une taille définie via CSS -->
                <div class="circle-small" id="circle-{{ __($application->id) }}"></div>
            </div>
        </div>
        @if ($application->is_abandon_candidature)
            <div class="row mt-2">
                <div class="col">
                    <span class="badge bg-danger abandon-tag "
                        title="Candidature abandonnée">{{ __('generated.Candidature abandonnée') }}</span>
                </div>
            </div>
        @endif
    </div>
    <div class="card-footer p-2">
        <div class="row align-items-center">
            <div class="col-auto">
                {{-- @if ($application->jobOffer && $application->jobOffer->client && $application->jobOffer->client->evaluators)
                    @foreach ($application->jobOffer->client->evaluators as $evaluator)
                        <div class="avatar avatar-50 coverimg rounded-circle d-inline-block me-1"
                            data-bs-toggle="tooltip" title="{{ $evaluator->first_name ?? 'Évaluateur' }}"
                            style=" background-size: cover; width: 40px; height: 40px;">
                            <img src="{{ Storage::url($evaluator->path_logo ?? 'public/assets/img/team/T1.jpg') }}"
                                alt="">
                                <i class="+"></i>
                        </div>
                    @endforeach
                @endif --}}
                @php
                    $evaluators = $application->jobOffer->client->evaluators ?? [];
                    $visibleLimit = 2;
                @endphp

                @if (count($evaluators) > 0)
                @foreach ($evaluators->take($visibleLimit) as $evaluator)
                    <div class="avatar avatar-50 coverimg rounded-circle d-inline-block me-1"
                        data-bs-toggle="tooltip" title="{{ $evaluator->first_name ?? 'Évaluateur' }}"
                        style="background-size: cover; width: 40px; height: 40px;">
                        <img src="{{ Storage::url($evaluator->path_logo ?? 'public/assets/img/team/T1.jpg') }}" alt="">
                    </div>
                @endforeach

                @if ($evaluators->count() > $visibleLimit)
                    <div class="avatar avatar-50 coverimg rounded-circle d-inline-block me-1 bg-theme text-white text-center fw-bold"
                    style="width: 40px; height: 40px; line-height: 40px;" title="Et {{ $evaluators->count() - $visibleLimit }} autres">
                    +{{ $evaluators->count() - $visibleLimit }}
                    </div>
                @endif
                @endif

            </div>


            <div class="col-auto ms-auto">
                <label class="custom-checkbox mb-0">
                    <input type="checkbox" class="to-email" target-data="{{ __($application->profile?->email) }}">
                    <span class="checkmark" data-bs-toggle="tooltip" title="Sélectionner"></span>

                </label>
            </div>
        </div>
    </div>
</div>
