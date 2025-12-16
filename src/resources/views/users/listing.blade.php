@extends('layouts.master')

@section('title', 'HumanJobs - Gestion des utilisateurs')

@section('css_header')
    <style>
        .offcanvas.offcanvas-end {
            top: 60px;
            width: 45rem;
            /* border-left: var(--bs-offcanvas-border-width) solid var(--bs-offcanvas-border-color); */
            transform: translateX(100%);
            /* bottom: 22px; */
            border-radius: 10px;
            margin: 1rem;
            padding: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            overflow-y: scroll;
            scrollbar-width: thin;
            scrollbar-color: #9e9e9e #eeeeee;

        }

        .dataTables_wrapper .dataTables_info {
            clear: both;
            float: left;
            padding-top: 1.755em;
            margin-bottom: 1rem !important;
        }

        #userTable td,
        #userTable th {
            text-align: center;
            vertical-align: middle;
        }

        .modal .modal-dialog .modal-footer .btn,
        .modal .modal-dialog .modal-footer input,
        .modal .modal-dialog .modal-footer p,
        .modal .modal-dialog .modal-footer a {
            margin: 3px;
        }

        .custom-file-input {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

@endsection

@section('content')
    <main class="main mainheight">
        <!-- title bar -->
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">Gestion des utilisateurs</h5>
                    <span style="color: #444343;" class="title-of-post"></span>
                </div>

                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="contact">
                    <a href="{{ route('support.index') }}" class="text-decoration-none">
                        <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="contact">
                            <figure class="avatar avatar-40 shadow custom-chatbox" style="background-color: #26b6ea;">
                                <span class="input-group-text text-secondary bg-none" style="border: 0;">
                                    <i class="bi bi-question-diamond" style="font-size: 22px; color: #fff"></i>
                                </span>
                            </figure>
                        </div>
                    </a>
                </div>
                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>

                <div class="col col-sm-auto" style="margin-right: -14px;" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Chatbot">
                    <a href="{{ route('chatboot') }}" class="text-decoration-none">
                        <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                            style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                            <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                        </figure>
                    </a>
                </div>

                <div class="col col-sm-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Confort utilisateur"
                    style="margin-right: 40px;">
                    <button class="btn show-video" style="background-color: #e2003b;padding: 2px 6px;" type="button"
                        id="showNotificationFaciliti">
                        <i class="bi bi-" style="font-size: 26px;">
                            <img src="{{ asset('assets/img/icon/faciliti.png') }}"
                                style="max-width: 30px;margin-top: -7px;margin-left: -2px;">
                        </i>
                    </button>
                </div>

            </div>
            <nav aria-label="breadcrumb" class="breadcrumb-theme">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
                </ol>
            </nav>
        </div>
        <!-- content -->
        <div class="container-fluid mt-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body bg-gradient-theme-light">
                                            <div class="d-flex justify-content-end mb-4">
                                                {{-- <button class="btn btn-theme" type="button" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasRightCreate"
                                                    aria-controls="offcanvasRightCreate"><i
                                                        class="bi bi-plus-lg"></i>&nbsp;  Ajouter un utilisateur</button> --}}
                                                <button type="button" class="btn btn-theme" data-bs-toggle="modal"
                                                    data-bs-target="#AddUser">
                                                    Ajouter un utilisateur
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <!-- Affichage des messages de succès et d'erreur -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ __($error) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 " style="padding: 10px 20px;">
                                        <div class="card-header ">
                                            <div class="row align-items-center">

                                                <div class="col">
                                                    <h5>Liste des utilisateurs</h5>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12" style="overflow: hidden;overflow-x: scroll;">
                                                    <div class="table-responsive">

                                                        <table class="table align-middle " id="userTable">
                                                            <thead class="bg-light">
                                                                <tr>
                                                                    <th class="text-center">Actions</th>
                                                                    <th class="text-center">Logo</th>
                                                                    <th class="text-center">Nom</th>
                                                                    <th class="text-center">Email</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Role</th>
                                                                    <th class="text-center">Date de Creation</th>
                                                                    <th class="text-center">Date connecter</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Add utilisateurs  --}}
            @include('users.create')
            {{-- Edit utilisateurs  --}}
            @include('users.edit')
            {{-- Edit utilisateurs  --}}
            @include('users.view')

        </div>
        </div>

    </main>
@endsection
@section('js_footer')
    <!-- First, load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Then, load DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- Load DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script>
        var userListingData = "{{ route('api.users.listing') }}";
        var apiUserDelete = "{{ route('api.users.destroy', ['id' => 'id']) }}";
        var apiUserUpdate = "{{ route('api.users.update', ['id' => '__ID__']) }}";
    </script>
    @vite(['resources/js/user/listing.js'])
    <script>
        document.getElementById('UserLogolightinput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Met à jour l'image directement
                    document.getElementById('user-logo').src = e.target.result;

                    // Optionnel : Mettre à jour le fond du logo si c'est un div
                    document.getElementById('logo').style.backgroundImage = 'url(' + e.target.result + ')';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.getElementById('UserLogolightinputEdit').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Met à jour l'image directement
                    document.getElementById('edit-user-logo').src = e.target.result;

                    // Optionnel : Mettre à jour le fond du logo si c'est un div
                    document.getElementById('logo_Edit').style.backgroundImage = 'url(' + e.target.result + ')';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
