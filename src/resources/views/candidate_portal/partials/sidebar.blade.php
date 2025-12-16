<!-- Sidebar -->
<div class="sidebar-wrap">
    <div class="sidebar">
        <div class="container">
            <!-- user information -->
            <!-- user menu navigation -->
            <div class="row mb-4">
                <div class="col-12 px-0">
                    @can('candidate-portal-access')
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                    data-bs-display="static" href="#" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __('generated.cvtheque') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-database"></i></div>
                                    <div class="col">{{ __('generated.cvtheque') }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link"
                                            href="{{ route('candidate-portal.profiles.listing') }}" data-bs-placement="top"
                                            title="{{ __('generated.apercu') }}">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark"></i>
                                            </div>
                                            <div class="col align-self-center">{{ __('generated.apercu') }}</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link"
                                            href="{{ route('candidate-portal.profiles.create') }}" data-bs-placement="top"
                                            title="{{ __('generated.ajouter_cv') }}">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-plus"></i>
                                            </div>
                                            <div class="col align-self-center">{{ __('generated.ajouter_cv') }}</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('candidate-portal.jobOffer') }}"
                                    data-bs-auto-close="false" data-bs-display="static"
                                    href="{{ route('candidate-portal.jobOffer') }}" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __('generated.missions') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-megaphone"></i></div>
                                    <div class="col">{{ __('generated.offres_emploi') }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                    href="{{ route('candidate-portal.fiche-candidat-test') }}" data-bs-auto-close="false"
                                    data-bs-display="static" href="{{ route('candidate-portal.fiche-candidat-test') }}"
                                    role="button" aria-expanded="false" data-bs-placement="top" title="{{ __('generated.test_technique') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-person-bounding-box"></i></div>
                                    <div class="col">{{ __('generated.test_technique') }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                    href="{{ route('candidate-portal.show-personality-test-result') }}"
                                    data-bs-auto-close="false" data-bs-display="static"
                                    href="{{ route('candidate-portal.show-personality-test-result') }}" role="button"
                                    aria-expanded="false" data-bs-placement="top" title="{{ __('generated.test_personnalite') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-person-workspace"></i></div>
                                    <div class="col">{{ __('generated.test_personnalite') }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    @endcan
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Sidebar ends -->
