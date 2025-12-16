@extends('layouts.app')

@section('title', ' Réinitialiser le mot de passe')


@section('css_header')

@endsection

@section('content')
    <main class="main mainheight container-fluid">

        <div class="row align-items-center justify-content-center">
            <div class="d-flex justify-content-center align-items-center vh-100" style="margin-top: -110px;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center text-white">
                    <p class="h4 fw-light mb-4 ">{{ __("generated.Réinitialisation du mot de passe") }}</p>
                    <form class="mb-4 text-start" method="POST" action="{{ route('password.forget') }}">
                        @csrf

                        <!-- Display Success Alert if success message exists -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Display Error Alert if error message exists -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-exclamation-triangle-fill translated_text"></i> Oups ! Cet e-mail
                                    n'est pas correct :</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    style="transform: scale(0.8);"></button>
                            </div>
                        @endif


                        <!-- Form elements -->
                        <div class="form-group mb-2 position-relative check-valid text-dark">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text text-theme border-end-0">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <div class="form-floating flex-grow-1">
                                    <input id="email" type="email" placeholder="Adresse e-mail"
                                        class="remember__input form-control" name="email" value="{{ old('email') }}"
                                        required autocomplete="email" autofocus>
                                    <label for="email" >{{ __("generated.Adresse e-mail") }}</label>
                                </div>
                                <button class="btn btn-lg btn-theme z-index-5 btn-square-lg" type="submit">
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <br>
                        <center><a href="{{ route('login-email-check') }}" class="text-white ">{{ __("generated.Retourner à la page de connexion.") }}</a></center>
                    </form>

                </div>
            </div>

        </div>

    </main>
@endsection

@section('js_footer')

@endsection
