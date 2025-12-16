@extends('layouts.app')

@section('title', 'Réinitialiser le mot de passe')

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
                <p class="display-3 mb-0"><span id="time"></span>
                    <small><span class="h4 text-uppercase" id="ampm"></span></small>
                </p>
                <p class="lead fw-normal" id="date"></p>
            </div>
        </div>

        <!-- reset form -->
        <div class="row align-items-center justify-content-center">
            <div class="d-flex justify-content-center align-items-center min-vh-100" style="margin-top: -180px;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center text-white">
                    <p class="h4 fw-light mb-4">Réinitialiser le Mot de Passe</p>

                    <form method="POST" action="{{ route('users.password.update') }}" class="login__form">
                        @csrf
                        <input type="hidden" name="email" value="{{ request('email') }}">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ __($error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Nouveau mot de passe -->
                        <div class="mb-3 position-relative">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text border-end-0" style="background-color: #26b6ea; color: #fff;">
                                    <i class="bi bi-key"></i>
                                </span>
                                <div class="form-floating flex-grow-1">
                                    <input id="password" type="password" name="password" required
                                        class="form-control border-start-0" placeholder="Nouveau mot de passe"
                                        autocomplete="new-password"
                                        style="border-color: #26b6ea; height: 55px; font-size: 14px;">
                                    <label for="password">Mot de passe</label>
                                </div>
                                <span class="input-group-text border-start-0"
                                    style="cursor: pointer; background-color: #26b6ea; color: #fff;"
                                    onclick="togglePassword('password')">
                                    <i class="bi bi-eye-slash" id="toggle-icon-password"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="mb-3 position-relative">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text border-end-0" style="background-color: #26b6ea; color: #fff;">
                                    <i class="bi bi-key"></i>
                                </span>
                                <div class="form-floating flex-grow-1">
                                    <input id="password_confirmation" type="password" name="password_confirmation" required
                                        class="form-control border-start-0" placeholder="Confirmer le mot de passe"
                                        autocomplete="new-password"
                                        style="border-color: #26b6ea; height: 55px; font-size: 14px;">
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                </div>
                                <span class="input-group-text border-start-0"
                                    style="cursor: pointer; background-color: #26b6ea; color: #fff;"
                                    onclick="togglePassword('password_confirmation')">
                                    <i class="bi bi-eye-slash" id="toggle-icon-password_confirmation"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Erreur mot de passe -->
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-theme w-100">Réinitialiser le mot de passe</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Toggle Password Script -->
    <script>
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = document.getElementById('toggle-icon-' + fieldId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        }
    </script>
@endsection

@section('js_footer')

@endsection
