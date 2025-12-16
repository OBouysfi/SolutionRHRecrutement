@extends('layouts.master')

@section('title', 'Détail Profil')

@section('css_header')
    <!-- Vos éventuels styles spécifiques -->

@endsection

@section('content')
    <!-- Begin page content -->
    <main class="main mainheight">
        <!-- title bar -->

        <div class="container mt-4">
            <div class="card border-0 mb-4">
                <div class="card-body p-0">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="card border-0overflow-hidden">
                                <figure class="coverimg position-fixed-bg w-100 h-250 mb-0"
                                    style="background-image: url('assets_custom/img/default-bg-profile.jpg)';">
                                    <img src="/assets/img/background.jpg" class="mw-100" alt=""
                                        style="display: none;">
                                </figure>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <figure class="avatar avatar-160 coverimg rounded-circle top-80 shadow-md"
                                                id="userAvatar">
                                                <img id="userAvatarPreview" 
                                                    src="{{ $user->user_image ? asset('storage/' . $user->user_image) : asset('assets/img/user/user.jpg') }}"
                                                    alt="User Avatar" class="mw-100 rounded-circle" />
                                            </figure>
                                        </div>
                                        <div class="col pt-3">
                                            <h2>{{ $user->name ?? ' ' }}
                                                @if ($user->status == 1)
                                                    <span class="badge bg-green rounded vm fw-normal fs-12 mx-2">
                                                        <i class="bi bi-check-circle me-1"></i><span
                                                            >{{ __("generated.Active") }}</span>
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger rounded vm fw-normal fs-12 mx-2">
                                                        <i class="bi bi-x-circle me-1"></i><span
                                                            >{{ __("generated.Inactive") }}</span>
                                                @endif

                                            </h2>
                                            <a href="" class=" mb-2 me-2">
                                                <span class="avatar avatar-30 rounded-circle me-1 vm"><i
                                                        class="bi bi-envelope"></i></span>
                                                {{ $user->email ?? ' ' }}
                                            </a>
                                            </p>
                                        </div>
                                        <div class="col-auto pt-3">
                                            <ul class="nav justify-content-center">
                                                <li class="nav-item">
                                                    <a class="nav-link px-2" href="#" target="_blank">
                                                        <i class="bi bi-facebook h5"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link px-2" href="#" target="_blank">
                                                        <i class="bi bi-twitter h5"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link px-2" href="#" target="_blank">
                                                        <i class="bi bi-linkedin h5"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link px-2" href="#" target="_blank">
                                                        <i class="bi bi-instagram h5"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content py-3" id="myTabContent">
                                <!-- profile tab -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">

                                    {{-- <h6 class="title ">{{ __("generated.Détails de l'entreprise") }}</h6> --}}

                                    <div class="card-header bg-gradient-theme-light mb-3">
                                        <div class="row align-items-center">
                                            <h6 class="fw-medium mb-0 ">{{ __("generated.Détails de l'entreprise") }}</h6>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center align-items-center mb-4">
                                        <div class="col-6 col-md-6 col-lg-4">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-100 text-center rounded">

                                                        <img src="{{ optional($user->Company)->path_logo ? asset('storage/' . $user->Company->path_logo ?? ' ') : asset('assets/img/icon/HJ_icon_green_black.png') }}"
                                                            alt="Company Logo" class="mw-100" id="companylogolight"
                                                            class="avatar-img" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group my-2 position-relative check-valid">
                                                <div class="form-floating">
                                                    <input type="text" id="company_name" name="company_name"
                                                        value="{{ $user->Company->business_name ?? ' ' }}"
                                                        class="form-control" readonly>
                                                    <label >{{ __("generated.Nom de l'entreprise") }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group my-2 position-relative check-valid">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="Tag de l'entreprise"
                                                        value="{{ $user->Company->business_name ?? ' ' }}" required
                                                        class="form-control" readonly>
                                                    <label >{{ __("generated.Tag de l'entreprise") }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <form id="profileUpdateForm" method="POST" action="{{ route('api.post.user.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @if (session('success'))
                                            <div class="alert alert-success mt-2">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger mt-2">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        {{-- <h6 class="title ">{{ __("generated.Profile details") }}</h6> --}}

                                        <div class="card-header bg-gradient-theme-light mb-3">
                                            <div class="row align-items-center">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Profile details") }}</h6>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div>
                                                            <label for="userImageInput"
                                                                class="form-label ">{{ __("generated.Télécharger l'image Utilisateur") }}</label><br>
                                                            <input class="form-control" type="file" name="user_image"
                                                                id="userImageInput">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group mb-3 position-relative check-valid">
                                                    <div class="form-floating">
                                                        <input type="text" name="name" placeholder="Prénom & Nom "
                                                            value="{{ $user->name ?? ' ' }}"
                                                            class="form-control border-start-0">
                                                        <label >{{ __("generated.Prénom & Nom") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group mb-3 position-relative check-valid">
                                                    <div class="form-floating">
                                                        <input type="email" name="email" placeholder="Adresse e-mail"
                                                            value="{{ $user->email ?? ' ' }}" readonly
                                                            class="form-control border-start-0">
                                                        <label >{{ __("generated.Adresse e-mail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-end P-2">
                                                <button type="submit"
                                                    class="btn btn-theme mnw-100 ">{{ __("generated.Sauvegarder Les Changements") }}</button>
                                            </div>
                                        </div>
                                    </form>

                                    <hr>
                                    <form id="profileUpdateForm" method="POST"
                                        action="{{ route('post.Account.ChangePassword') }}">
                                        @csrf
                                        <!-- Password Change Section -->
                                        {{-- <h6 class="title ">{{ __("generated.Changer votre mot de passe") }}</h6> --}}

                                        <div class="card-header bg-gradient-theme-light mb-3">
                                            <div class="row align-items-center">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Changer votre mot de passe") }}</h6>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-floating">
                                                    <input type="password" name="old_password" id="old_password"
                                                        class="form-control @error('old_password') is-invalid @enderror">
                                                    <div id="old_password_feedback" class="invalid-feedback">
                                                        {{ $errors->first('old_password') }}
                                                    </div>
                                                    <label >{{ __("generated.Ancien mot de passe *") }}</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-floating">
                                                    <input type="password" name="new_password" id="new_password"
                                                        class="form-control @error('new_password') is-invalid @enderror">
                                                    <label  for="new_password">{{ __("generated.Nouveau mot de passe *") }}</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-floating">
                                                    <input type="password" name="new_password_confirmation"
                                                        id="new_password_confirmation"
                                                        class="form-control @error('new_password_confirmation') is-invalid @enderror">
                                                    <div id="password_confirmation_feedback" class="invalid-feedback">
                                                        {{ $errors->first('new_password_confirmation') }}
                                                    </div>
                                                    <label 
                                                        for="new_password_confirmation">{{ __("generated.Confirmez le nouveau mot de passe *") }}</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-end mt-3">
                                                <button type="submit" id="passwordChangeButton"
                                                    class="btn btn-theme mnw-100 ">{{ __("generated.Valider Mot De Passe") }}</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <!-- End page content -->
@endsection
@section('js_footer')
    <script>
        document.getElementById('userImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                //  update the avatar preview
                reader.onload = function(e) {
                    const userAvatarPreview = document.getElementById('userAvatarPreview');
                    userAvatarPreview.src = e.target.result; // Set  new img
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#new_password_confirmation').on('input', function() {
                let newPassword = $('#new_password').val().trim();
                let confirmPassword = $(this).val().trim();

                if (confirmPassword !== '' && newPassword !== confirmPassword) {
                    $(this).addClass('is-invalid');
                    $('#password_confirmation_feedback').text("Les mots de passe ne correspondent pas.");
                } else {
                    $(this).removeClass('is-invalid');
                    $('#password_confirmation_feedback').text("");
                }
            });
        });
    </script>


@endsection
