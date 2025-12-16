<!-- Sidebar -->
<div class="sidebar-wrap">
    <div class="sidebar">
        <div class="container">
            {{-- <div class="row mb-4 sidebar-title">
                <div class="col align-self-center translated_text">
                    <h6>Main navigation</h6>
                </div>
            </div> --}}

            <!-- user menu navigation -->
            <div class="row mb-4">
                <div class="col-12 px-0">
                    <ul class="nav nav-pills">
                        @can('dashboard-access')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Tableau de bord") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart" ></i></div>
                                    <div class="col">{{ __("generated.Tableau de bord") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        @endcan
                        @can('profile-access')
                            <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Cvthèque") }}">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Cvthèque") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-database"></i></div>
                                    <div class="col">{{ __("generated.CVthèque") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @can('profile-listing')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('profile.listing') }}" title="{{ __("generated.Aperçu") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" >
                                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Aperçu") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('profile-create')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('profile.create') }}"
                                                data-bs-placement="top" title="{{ __("generated.Ajouter un CV") }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Ajouter un CV") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-plus"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Ajouter un CV") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('vivierTalent-access')
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Vivier Talent") }}">
                                <a class="nav-link active" aria-current="page" href="{{ route('vivierTalent.listing') }}"
                                    data-bs-placement="top" title="{{ __("generated.Vivier talent") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-ticket-perforated"></i></div>
                                    <div class="col">{{ __("generated.Vivier talent") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        @endcan
                        @can('client-access')
                            <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Clients") }}">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                    data-bs-display="static" href="#" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __("generated.Clients") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-building"></i></div>
                                    <div class="col">{{ __("generated.Clients") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @can('client-create')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('client.create') }}"
                                                data-bs-placement="top" title="{{ __("generated.Nouveau client") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-building-add"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Nouveau client") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('client-listing')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('client.listing') }}"
                                                data-bs-placement="top" title="{{ __("generated.Liste des clients") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-card-list"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Liste des clients") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan

                        @can('mission-access')
                            <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Missions") }}">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                    data-bs-display="static" href="#" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __("generated.Missions") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-people"></i></div>
                                    <div class="col">{{ __("generated.Missions") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @can('mission-listing')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('jobOffer.listing') }}"
                                                data-bs-placement="top" title="{{ __("generated.Offres d'emploi") }}" data-bs-placement="top"
                                                title="{{ __("generated.Offres d'emploi") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-megaphone"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Offres d'emploi") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('mission-create-offer')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('jobOffer.create') }}"
                                                data-bs-placement="top" title="{{ __("generated.Créer offre d'emploi") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-person-vcard"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Créer offre d'emploi") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('mission-indicators-show')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('jobOffer.indicators') }}"
                                                data-bs-placement="top" title="{{ __("generated.Indicateurs clés") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-file-bar-graph"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Indicateurs clés") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a class="dropdown-item nav-link" href="{{ route('jobOffer.history') }}">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-hourglass"></i>
                                            </div>
                                            <div class="col align-self-center">{{ __("generated.Historique") }}</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>

                                    {{-- @can('mission-indicators-show') --}}
                                    <li>
                                        <a class="dropdown-item nav-link" href="{{ route('rapportFinance.listing') }}"
                                            data-bs-placement="top" title="{{ __("generated.Indicateurs clés") }}">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-file-bar-graph"></i>
                                            </div>
                                            <div class="col align-self-center">{{ __("generated.Coût du recrutement") }}</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    {{-- @endcan --}}
                                </ul>
                            </li>
                        @endcan

                        @can('matching-access')
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Matching") }}">
                                <a class="nav-link" aria-current="page" href="{{ route(name: 'matching.listing') }}"
                                    data-bs-placement="top" title="{{ __("generated.Matching") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-intersect"></i></div>
                                    <div class="col">{{ __("generated.Matching") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        @endcan

                        @can('ats-listing')
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.ATS") }}">
                                <a class="nav-link" aria-current="page" href="{{ route('ats.listing') }}"
                                    data-bs-placement="top" title="{{ __("generated.ATS") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-kanban"></i></div>
                                    <div class="col">{{ __("generated.ATS") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        @endcan

                        {{-- @can('test-technique-access')
                            <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Test Technique") }}">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                    data-bs-display="static" href="#" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __("generated.Test technique") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-person-bounding-box"></i></div>
                                    <div class="col">{{ __("generated.Test technique") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @can('test-technique-listing-gestion-candidats')
                                        <li>
                                            <a class="dropdown-item nav-link"
                                                href="{{ route('technicalTest.test.candidate') }}" data-bs-placement="top"
                                                title="{{ __("generated.Candidats") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Candidats") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('test-technique-listing-gestion-tests')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('technicalTest.listingTest') }}"
                                                data-bs-placement="top" title="{{ __("generated.Tests manuels") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-vector-pen"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Tests manuels") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a class="dropdown-item nav-link" href="{{ route('technicalTest.result') }}"
                                            data-bs-placement="top" title="{{ __("generated.Résultats") }}">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-card-list"></i>
                                            </div>
                                            <div class="col align-self-center">{{ __("generated.Résultats") }}</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('test-personnelle-access')
                            <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Test Personnalité") }}">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                    data-bs-display="static" href="#" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __("generated.Test personnalité") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-person-workspace"></i></div>
                                    <div class="col">{{ __("generated.Test personnalité") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @can('contact-test-personnelle-access')
                                        <li>
                                            <a class="dropdown-item nav-link"
                                                href="{{ route('personalityTest.test.candidate') }}" data-bs-placement="top"
                                                title="{{ __("generated.Contacts") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Contacts") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('modele-predictif-access')
                                        <li>
                                            <a class="dropdown-item nav-link"
                                                href="{{ route('personalityTest.predictiveModel.listing') }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-files-alt"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Modèle prédictif") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan --}}
                        @can('event-access')
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Calendrier") }}">
                                <a class="nav-link active" aria-current="page" href="{{ route('events.listing') }}"
                                    data-bs-placement="top" title="{{ __("generated.Calendrier") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-calendar"></i></div>
                                    <div class="col">{{ __("generated.Calendrier") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        @endcan
                        @can('Paramètre-access')
                            <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __("generated.Paramètres") }}">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false"
                                    data-bs-display="static" href="#" role="button" aria-expanded="false"
                                    data-bs-placement="top" title="{{ __("generated.Paramètre") }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-gear"></i></div>
                                    <div class="col">{{ __("generated.Paramètres") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                            class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                 
                                    @can('Rôles-permissions-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('setting.permission') }}"
                                                data-bs-placement="top" title="{{ __("generated.Rôles et permissions") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-person-lock"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Rôles et permissions") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('evaluateurs-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('evaluators.create') }}"
                                                data-bs-placement="top" title="{{ __("generated.Evaluateurs") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-person-check"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Evaluateurs") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- @can('personnalisation-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('setting.personnalisation') }}"
                                                data-bs-placement="top" title="{{ __("generated.Personnalisation") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-columns-gap"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Personnalisation") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan --}}
                                    @can('prametrage-access')
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-item nav-link dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown" role="button" aria-expanded="false"
                                                data-bs-placement="top" title="{{ __("generated.Paramétrage") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-sliders"></i></div>
                                                <div class="col align-self-center">{{ __("generated.Paramétrage") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                            <ul class="dropdown-menu">
                                                {{-- @can('filiale-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link" href="{{ route('filiale.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Filiale">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-diagram-3"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">Filiale
                                                            </div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('agence-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link" href="{{ route('agence.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Agence">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-diagram-3"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">Agence
                                                            </div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan --}}
                                                @can('companie-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link" href="{{ route('companie.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Entreprise") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-diagram-3"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Entreprise") }}
                                                            </div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('activityArea-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('setting.activityAreas.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Secteurs d'activité") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-diagram-3"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Secteurs d'activité") }}</div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('profession-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('setting.professions.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Métiers/postes") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">
                                                                {{ __("generated.Métiers/postes") }}</div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('talentFolder-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('profile-folders.listing') }}" data-bs-placement="top"
                                                            title="{{ __("generated.Compétences Techniques") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Dossiers de talents") }}
                                                            </div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('competence-technique-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('comptechnique.listing') }}" data-bs-placement="top"
                                                            title="{{ __("generated.Compétences Techniques") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Compétences Techniques") }}</div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('competence-linguistique-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('complinguistique.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Compétences Linguistiques") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Compétences Linguistiques") }}</div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('competence-personnelle-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('personnelle.listing') }}" data-bs-placement="top"
                                                            title="{{ __("generated.Compétences Personnelles") }}">
                                                            <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                                            </div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Compétences Personnelles") }}</div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('diplomaoption-access')
                                                    <li>
                                                        <a class="dropdown-item nav-link"
                                                            href="{{ route('setting.diplomaoptions.listing') }}"
                                                            data-bs-placement="top" title="{{ __("generated.Options du diplome") }}">
                                                            <div class="avatar avatar-40 icon"><i
                                                                    class="bi bi-card-checklist"></i></div>
                                                            <div class="col align-self-center" style="font-size:14px;">{{ __("generated.Options du diplome") }}</div>
                                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endcan
                                    @can('intégration-(API)-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('setting.apis.index') }}"
                                                data-bs-placement="top" title="{{ __("generated.Intégration (API)") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-gear-wide-connected"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Intégration (API)") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('sécurité-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('settings.security') }}"
                                                data-bs-placement="top" title="{{ __("generated.Sécurité") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-shield-lock"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Sécurité") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- @can('notifications-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('setting.notification') }}"
                                                data-bs-placement="top" title="{{ __("generated.Notification">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-bell"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Notification") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan --}}
                                    {{-- @can('Sauvegarde-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('setting.backup') }}"
                                                data-bs-placement="top" title="{{ __("generated.Sauvegarde">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-floppy"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Sauvegarde") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan --}}
                                    @can('emails-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('setting.email_params') }}"
                                                data-bs-placement="top" title="{{ __("generated.Emails") }}">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-envelope"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Emails") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- @can('logs-access')
                                        <li>
                                            <a class="dropdown-item nav-link" href="{{ route('activity-logs.index') }}"
                                                data-bs-placement="top" title="{{ __("generated.Emails">
                                                <div class="avatar avatar-40 icon"><i class="bi bi-substack"></i>
                                                </div>
                                                <div class="col align-self-center">{{ __("generated.Logs d'activité") }}</div>
                                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </li>
                                    @endcan --}}
                                </ul>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Sidebar ends -->
