@extends('layouts.app')

@section('title', ' Réinitialiser le mot de passe')


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

    <!-- background ends  -->
    <main class="main mainheight container-fluid">
        <!-- time and temperature -->
        <div class="row text-white my-2">
            <div class="col">
                <p class="display-3 mb-0"><span id="time"></span><small><span class="h4 text-uppercase"
                            id="ampm"></span></small></p>
                <p class="lead fw-normal" id="date"></p>
            </div>
        </div>
        <!-- time and temperature ends -->
            <div class="row align-items-center justify-content-center">
                <div class="d-flex justify-content-center align-items-center min-vh-100" style="margin-top: -200px;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center text-white">
                        <p class="h4 fw-light mb-4 ">{{ __("generated.Réinitialiser le Mot de Passe") }}</p>
                        <form method="POST" action="{{ route('password.update') }}" class="login__form">
                            @csrf
                            <!-- Email Field -->
                            <div class="mb-3">
                                <div class="input-group" style="max-width: 800px; width: 100%;">
                                    <span class="input-group-text text-theme border-end-0">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Votre e-mail"
                                            style="border-color: #26b6ea; height: 60px; font-size: 14px; padding: 6px 10px;">
                                        <label for="email" >{{ __("generated.Adresse e-mail") }}</label>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ __($message) }}</div>
                                @enderror
                            </div>
                            <!-- Password Field -->
                            <div class="mb-3">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text text-secondary border-end-0">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <div class="form-floating">
                                        <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" placeholder="Nouveau mot de passe"
                                            style="border-color: #26b6ea; height: 55px; font-size: 14px; padding: 6px 10px;">
                                        <label for="password" >{{ __("generated.Mot de passe") }}</label>
                                    </div>
                                    <button class="btn btn-lg btn-theme btn-square-lg border-start-0" type="submit">
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ __($message) }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </main>
@endsection

@section('js_footer')

@endsection
