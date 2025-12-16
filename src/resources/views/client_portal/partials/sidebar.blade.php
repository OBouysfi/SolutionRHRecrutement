<div class="sidebar-wrap">
    <div class="sidebar">
        <div class="container">
            <div class="row mb-4">
                <div class="col align-self-center">
                    <h6>{{ __("generated.main_navigation") }}</h6>
                </div>

            </div>
            <!-- user menu navigation -->
            <div class="row mb-4">
                <div class="col-12 px-0">
                    @can('client-portal-access')
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="dropdown-item nav-link" href="{{ route('client-portal.jobOffer.listing') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-building-add"></i>
                                    </div>
                                    <div class="col align-self-center">{{ __("generated.Missions") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="dropdown-item nav-link" href="{{ route('client-portal.jobOffer.history') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-building-add"></i>
                                    </div>
                                    <div class="col align-self-center">{{ __("generated.Historique") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="dropdown-item nav-link" href="{{ route('client-portal.organisation') }}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-building-add"></i>
                                    </div>
                                    <div class="col align-self-center">{{ __("generated.organisation") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('candidate-portal.ats')}}">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-kanban"></i></div>
                                    <div class="col">{{ __("generated.ATS - Application Tracking System") }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        </ul>
                    @endcan
                </div>
            </div>


        </div>
    </div>
</div>
