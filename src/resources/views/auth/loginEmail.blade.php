@extends('layouts.app')

@section('title', 'Se Connecter')

@section('css_header')
    <!-- Vos éventuels styles spécifiques -->
@endsection

@section('content')
    <main class="main mainheight container-fluid">
        <!-- time and temperature -->
        <div class="row text-white my-2">
            <div class="col">
                <p class="display-3 mb-0"><span id="time"></span><small><span class="h4 text-uppercase" id="ampm"></span></small></p>
                <p class="lead fw-normal" id="date"></p>
            </div>

            <div class="col-auto text-end">
                <p class="display-3 mb-0">
                    <img src="{{ asset('assets/img/cloud-sun.png') }}" alt="" class="vm me-0 tempimage" id="tempimage" />
                    <span id="temperature">46</span><span class="h4 text-uppercase"> <sup>0</sup>C</span>
                </p>

                <a href="javascript:void()" class="btn btn-link text-white dd-arrow-none dropdown-toggle" id="selectCity" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="h5 fw-normal" id="city">Casablanca</span> <i class="bi bi-pencil-square small fw-light"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="selectCity" id="citychange">
                    <li class="dropdown-item active" data-value="Casablanca">Casablanca</li>
                    <li class="dropdown-item" data-value="New York">New York</li>
                    <li class="dropdown-item " data-value="London">London</li>
                    <li class="dropdown-item" data-value="Qatar">Qatar</li>
                    <li class="dropdown-item" data-value="Delhi">Delhi</li>
                    <li class="dropdown-item" data-value="Sydney">Sydney</li>
                </ul>
            </div>
        </div>
        <!-- time and temperature ends -->

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center text-white">
                <h1 class="display-4 mb-3 mb-lg-4 " style="font-weight: 700 !important;">{{ __("generated.Bienvenue,") }}</h1>
                <p class="h4 " style="font-weight: 700 !important;font-size: 22px;">{{ __("generated.Accédez à votre espace de recrutement") }}</p>
                <p class="mb-5">
                    <a class="text-white ">{{ __("generated.Réinventer l’embauche grâce à la technologie") }}</a>
                </p>

                <!-- Affichage du formulaire de vérification de l'email -->
                <form class="mb-4 text-start" method="POST" action="{{ route('login-email-check') }}">
                    @csrf
                    <!-- Alert messages et autres éléments (inchangés) -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Erreur :</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ __($error) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mb-2 position-relative check-valid text-dark">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text text-theme border-end-0">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <div class="form-floating">
                                <input type="email" name="email" placeholder="Adresse e-mail" required
                                    class="form-control border-start-0" autofocus id="email">
                                <label >{{ __("generated.Adresse e-mail") }}</label>
                            </div>
                            <!-- Submit button -->
                            <button class="btn btn-lg btn-theme z-index-5 btn-square-lg" type="submit">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="invalid-feedback ">{{ __("generated.Ajoutez .com à la fin pour insérer des données valides") }}</div>
                </form>

                <!-- Si le SSO est activé, afficher un bouton SSO -->
                @if (isset($settings) && $settings['sso'])
                    <div class="mb-3">
                        <a href="{{ route('login.sso') }}" class="btn btn-theme btn-block ">{{ __("generated.Connexion avec SSO (Google)") }}</a>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('js_footer')
@endsection
