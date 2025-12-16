@extends('layouts.app')

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
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center text-white py-4 py-lg-5">
                {{-- <h1 class="h4 fw-bold mb-3 ">{{ __("generated.Vérification OTP") }}</h1> --}}
                <p class="h4 fw-light  mb-4">{{ __("generated.Vérification OTP") }}</p>

                <p class="mb-4 ">{{ __("generated.Consultez votre e-mail pour le code de vérification. Cette étape garantit la sécurité et prévient l'utilisation abusive de votre adresse lors de la création de compte.") }}</p>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('otp-verify') }}" class="mb-4 text-start">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('auth_email') }}">

                    <!-- Alerts -->
                    <div class="alert alert-danger fade show d-none mb-2 global-alert" role="alert"></div>

                    {{-- <div class="alert alert-success fade show d-none mb-3 global-success" role="alert">
                        <div class="d-flex align-items-center">
                            <div class="spinner-border spinner-border-sm text-success me-2" role="status">
                                <span class="visually-hidden ">{{ __("generated.Loading...") }}</span>
                            </div>
                            <div >{{ __("generated.Vous allez être redirigé vers la page suivante.") }}</div>
                        </div>
                    </div> --}}

                    {{-- <div class="alert alert-danger fade show d-none mb-2 global-alert" role="alert">
                        <div class="row">
                            <div class="col"><strong>Error!</strong> OTP doesn't matched.</div>
                        </div>
                    </div> --}}
                    <div class="alert alert-success fade show d-none mb-2 global-success" role="alert">
                        <div class="row">
                            <div class="col-auto align-self-center">
                                <div class="spinner-border spinner-border-sm text-success me-2" role="status">
                                    <span class="visually-hidden ">{{ __("generated.Loading...") }}</span>
                                </div>
                            </div>
                            <div class=" col ps-0 align-self-center">{{ __("generated.Vous allez être redirigé vers la page suivante.") }}</div>
                        </div>
                    </div>

                    <!-- OTP Field -->
                    {{-- <div class="mb-4 text-center">
                        <label for="otp_code" class="form-label ">{{ __("generated.Code de vérification") }}</label>
                        <div class="d-flex justify-content-center gap-2">
                            <input type="text" id="otp1" name="otp1" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-next="otp2">
                            <input type="text" id="otp2" name="otp2" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-next="otp3" data-prev="otp1">
                            <input type="text" id="otp3" name="otp3" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-next="otp4" data-prev="otp2">
                            <input type="text" id="otp4" name="otp4" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-prev="otp3">
                        </div>
                        <input type="hidden" id="otp_code" name="otp_code">
                    </div> --}}

                    <!-- Form elements -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-group position-relative">
                                <input type="text" id="otp1" name="otp1" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-next="otp2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group position-relative">
                                <input type="text" id="otp2" name="otp2" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-next="otp3" data-prev="otp1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group position-relative">
                                <input type="text" id="otp3" name="otp3" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-next="otp4" data-prev="otp2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group position-relative">
                                <input type="text" id="otp4" name="otp4" maxlength="1" required class="form-control form-control-lg border-start-0 text-center numberonly otp-input" autocomplete="off" data-prev="otp3">
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    {{-- <div class="d-grid mb-4">
                        <button class="btn btn-theme mx-auto" style="width: max-content;" type="submit">
                            <span >{{ __("generated.Vérifier") }}</span> <i class="bi bi-arrow-right"></i>
                        </button>
                    </div> --}}

                    <button class="btn btn-lg btn-theme top-0 end-0 z-index-5 w-100" type="button" id="verifyBtn"><span >{{ __("generated.Vérifier") }}</span> <i class="bi bi-arrow-right"></i></button>

                    <!-- Resend Section -->
                    {{-- <div class="text-center mb-4">
                        <div class="col justify-content-center align-items-center gap-3">
                            <div class="progressstimer text-center">
                                <img src="{{ asset('assets/img/laoderfixed-white.png') }}" alt="Loader" class="mb-1" />
                                <p class="timer text-muted mb-0" id="timer">3:00</p>
                            </div>
                            <div class="text-center">
                                <p class="mb-0"><a href="{{ route('otp-resend') }}"
                                        class="text-white ">{{ __("generated.Renvoyer") }}</a></p>
                                <p class="small text-muted  mb-0">{{ __("generated.Autorisé une seule fois") }}</p>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Resend Section -->
                    <div class="row justify-content-center mt-4">
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="progressstimer text-center">
                                        <img src="{{ asset('assets/img/laoderfixed-white.png') }}" alt="Loader" class="mb-1" />
                                        <p class="timer text-muted mb-0" id="timer">3:00</p>
                                    </div>
                                </div>
                                <div class="col ps-0 align-self-center">
                                    <p class="mb-0"><a href="{{ route('otp-resend') }}" class="text-white ">{{ __("generated.Renvoyer") }}</a></p>
                                    <p class="small text-muted ">{{ __("generated.Autorisé une seule fois") }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Back to login -->
                {{-- <p class="mb-0">
                    <span >{{ __("generated.Vous avez déjà un compte") }}</span> ?<br>
                    <a href="{{ route('login-email-check') }}" class="text-white ">{{ __("generated.Retourner à la connexion") }}</a>
                </p> --}}

                <p>Vous avez déjà un compte ?<br><a href="{{ route('login-email-check') }}" class="text-white ">{{ __("generated.Retourner à la connexion") }}</a></p>
            </div>
        </div>
    </main>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');

            otpInputs.forEach(input => {
                input.addEventListener('input', function(e) {
                    if (this.value.length === 1) {
                        const nextInput = this.getAttribute('data-next');
                        if (nextInput) {
                            document.getElementById(nextInput).focus();
                        }
                    }

                    // Update the hidden field
                    updateCombinedOTP();
                });

                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && this.value.length === 0) {
                        const prevInput = this.getAttribute('data-prev');
                        if (prevInput) {
                            document.getElementById(prevInput).focus();
                        }
                    }
                });
            });

            function updateCombinedOTP() {
                const otp = Array.from(otpInputs).map(input => input.value).join('');
                document.getElementById('otp_code').value = otp;
            }
        });
    </script>
@endpush
