<header class="header">
    <!-- Fixed navbar -->
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <div class="sidebar-width">
                <button class="btn btn-link btn-square menu-btn" type="button">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <a class="navbar-brand ms-2" href="{{route('dashboard') }}">
                    <div class="row">
                        <div class="col-auto">
                            <span>
                                <img class="light-logo" src={{ asset('assets/img/logo/hj_logo_black.png') }}
                                    alt="Light Logo" />
                                <img class="dark-logo" src={{ asset('assets/img/logo/hj_logo_white.png') }}
                                    alt="Dark Logo" />
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="ms-auto">
                <div class="row">
                    <div class="col-auto">
                        <button class="btn btn-square btn-link search-btn d-inline-block d-xl-none " id="searchtoggle">
                            <i class="bi bi-search"></i>
                        </button>
                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn btn-link text-center" id="language" data-bs-toggle="dropdown" aria-expanded="false">
                                <small class="vm">{{ strtoupper(app()->getLocale()) }}</small>
                                <i class="bi bi-translate"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item {{ app()->getLocale() === 'fr' ? 'active' : '' }}" href="{{ route('set-locale', 'fr') }}">FR - French</a></li>
                                <li><a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ route('set-locale', 'en') }}">EN - English</a></li>
                                <li><a class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}" href="{{ route('set-locale', 'ar') }}">AR - Arabic</a></li>
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale() === 'zh' ? 'active' : '' }}"
                                       href="{{ route('set-locale', 'zh') }}">
                                        ZH - Chinese
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale() === 'pt' ? 'active' : '' }}"
                                       href="{{ route('set-locale', 'pt') }}">
                                        PT - Portuguese
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale() === 'es' ? 'active' : '' }}"
                                       href="{{ route('set-locale', 'es') }}">
                                        ES - Spanish
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <button id="theme-toggle-client" class="btn btn-square btn-link text-center d-none d-lg-inline-block">
                            <i id="theme-icon" class="bi bi-sun-fill"></i>
                        </button>

                        <button type="button" class="btn btn-square btn-link text-center d-none d-lg-inline-block" id="gofullscreen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fullscreen"><i class="bi bi-fullscreen"></i></button>
                        {{-- <button type="button" class="btn btn-square btn-link text-center d-none d-sm-inline-block" id="showChat" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat & Support">
                            <span class="bi bi-chat-right-dots position-relative">
                                <span class="badge position-absolute top-0 start-100 translate-middle bg-theme textw-white rounded">
                                    <span class="fs-10">9+</span> <span class="visually-hidden">New alerts</span>
                                </span>
                            </span>
                        </button> --}}
                        <button type="button" class="btn btn-square btn-link text-center" id="showNotification" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications">
                            <span class="bi bi-bell position-relative">
                                <span class="position-absolute top-0 start-100 p-1 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </span>
                        </button>
                    </div>
                    <div class="col-auto align-self-center px-0  d-none d-xxxl-block">
                        <i class="bi bi-three-dots-vertical opacity-3 text-secondary" style="margin-left: 10px;margin-right: 30px;""></i>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <a class="dd-arrow-none dropdown-toggle tempdata" id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <figure class="avatar avatar-40 rounded-circle coverimg vm">
                                            <img
                                            src="{{ Auth::user() && Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('assets/img/user/user.jpg') }}"
                                            alt="{{ Auth::user() ? Auth::user()->name : 'Guest' }}"
                                            id="userphotoonboarding3" />
                                        </figure>

                                    </div>
                                    <div class="col ps-0 align-self-center d-none d-lg-block">
                                        <p class="mb-0">
                                            <span class="text-dark username">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
                                            <small class="small"></small>
                                        </p>
                                    </div>
                                    <div class="col ps-0 align-self-center d-none d-lg-block">
                                        <i class="bi bi-chevron-down small vm"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end w-300" aria-labelledby="userprofiledd">
                                <div class="dropdown-info bg-radial-gradient-theme">
                                    <div class="row">
                                        <div class="col-auto">

                                            <figure class="avatar avatar-50 rounded-circle coverimg vm">
                                                <img
                                                    src="{{ Auth::user() && Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('assets/img/user/user.jpg') }}"
                                                    alt="{{ Auth::user() ? Auth::user()->name : 'Guest' }}"
                                                    id="userphotoonboarding3" />
                                            </figure>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <h6 class="mb-0"><span class="username">HumanJobs</span></h6>
                                            <p class="text-muted small">Super admin</p>
                                        </div>

                                    </div>
                                </div>
                                <div><a class="dropdown-item" href="{{ route('get.Account.Detail') }}">Mon Profil</a></div>
                                <div><a class="dropdown-item" href="{{ route('support.index') }}">Support</a></div>
                                <div>
                                    <form action="{{ route('api.logout') }}" method="POST" id="logout-form">
                                        @csrf
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">Se déconnecter</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
