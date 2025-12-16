@extends('layouts.app')

@section('title', 'Se Connecter')

@section('css_header')
    <style>
        .login-cover {
            background-image: url('assets/img/login-cover.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight container-fluid">
        <!-- time and temperature -->
        <div class="row text-white my-2">
            <div class="col">
                <p class="display-3 mb-0"><span id="time"></span><small><span class="h4 text-uppercase"
                            id="ampm"></span></small></p>
                <p class="lead fw-normal" id="date"></p>
            </div>

            <div class="col-auto text-end">
                <p class="display-3 mb-0">
                    <img src="{{ asset('assets/img/cloud-sun.png') }}" alt="" class="vm me-0 tempimage"
                        id="tempimage" />
                    <span id="temperature">46</span><span class="h4 text-uppercase"> <sup>0</sup>C</span>
                </p>

                <a href="javascript:void()" class="btn btn-link text-white dd-arrow-none dropdown-toggle" id="selectCity"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="h5 fw-normal" id="city">Casablanca</span> <i
                        class="bi bi-pencil-square small fw-light"></i>
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

        <div class="bg-dark bg-opacity-25 rounded-4 p-4 shadow-lg row align-items-center justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center text-white py-4 py-lg-5">
                <p class="h4 fw-light mb-4 ">{{ __("generated.Entrez votre mot de passe") }}</p>
                <p class="mb-4 ">{{ __("generated.Nous avons trouvé une adresse email déjà enregistrée chez nous. Veuillez entrer votre mot de passe pour continuer.") }}</p>

                <form id="loginForm" class="mb-4 text-start" method="POST" action="{{ route('login-password') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ __($email) }}">

                    <div class="form-group mb-2 position-relative check-valid text-dark">
                        <!-- Display Error Alert if error message exists -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-exclamation-triangle-fill translated_text"></i> Oups ! Ce mot de
                                    passe est incorrect :</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    style="transform: scale(0.8);"></button>
                            </div>
                        @endif
                        <div class="input-group input-group-lg">
                            <span class="input-group-text text-theme border-end-0">
                                <i class="bi bi-key"></i>
                            </span>
                            <div class="form-floating">
                                <input type="password" name="password" id="password" placeholder="Enter Password" required
                                    class="form-control border-start-0" autofocus style="border-color: #27b6ea;">
                                <label for="password" >{{ __("generated.mot de passe") }}</label>
                            </div>
                            <span class="input-group-text text-secondary border-end-0" id="viewpassword">
                                <i class="bi bi-eye"></i>
                            </span>
                            <button class="btn btn-lg btn-theme top-0 end-0 z-index-5 btn-square-lg" type="submit">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="invalid-feedback ">{{ __("generated.Entrez un mot de passe valide et cliquez à nouveau pour continuer.") }}</div>

                    <!-- Forgot Password Link -->
                    <div class="text-center mb-3">
                        <a href="{{ route('password-forget') }}" class="text-white"><span >{{ __("generated.Vous avez oublié votre mot de passe") }}</span>? <span >{{ __("generated.Cliquez ici") }}</span>.</a>
                    </div>


                    @if (isset($settings) && $settings['captcha'])
                        <div class="mb-3">
                            {!! htmlFormSnippet() !!}
                        </div>
                    @endif
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                    @if ($errors->has('g-recaptcha-response'))
                        <div>
                            <small class="text-danger">
                                {{ $errors->first('g-recaptcha-response') }}
                            </small>
                        </div>
                    @endif
                </form>

            </div>
        </div>
    </main>
@endsection

@section('js_footer')
    {!! htmlScriptTagJsApi() !!}
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            console.log('Soumission du formulaire.');
            if (typeof grecaptcha !== 'undefined') {
                var response = grecaptcha.getResponse();
                console.log('Réponse reCAPTCHA:', response);
                if (response.length === 0) {
                    e.preventDefault();
                    alert('Veuillez vérifier que vous n\'êtes pas un robot.');
                    console.log('Formulaire bloqué.');
                    return false;
                }
            } else {
                console.log('grecaptcha non défini.');
            }
        });
    </script>
@endsection
