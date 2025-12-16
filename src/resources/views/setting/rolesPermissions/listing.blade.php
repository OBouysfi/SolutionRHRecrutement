@extends('layouts.master')

@section('title', 'Rôles et permissions')

@section('css_header')

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    {{-- //Style For Crud User  --}}
    <style>
        .custom-camera-file-input {
            height: 40px;
            width: 40px;
            line-height: 25px;
        }

        .custem-camera-file-label {
            top: 90px;
        }
         .offcanvas-backdrop.show {
            opacity: 0 !important;
        }
    </style>
@endsection

@section('content')
    <main class="main mainheight">
        <div class="container-fluid">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0 ">{{ __("generated.Paramètres") }}</h5>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.contact") }}">
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
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Guide vidéo") }}">
                    <figure class="avatar avatar-40   shadow custom-chatbox" style="background-color: #5a9bf6;">
                        <span class="input-group-text text-secondary bg-none" id="" style="border: 0;">
                            <i class="bi bi-play-btn" style="font-size: 22px;color: #fff"></i>
                        </span>
                    </figure>
                </div>
                <div class="col col-sm-auto translated_text" style="margin-right: -14px;" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="{{ __("generated.Chatbot") }}">
                    <figure class="avatar avatar-40 coverimg  shadow custom-chatbox"
                        style="background-image: url(&quot;assets/img/icon/HJ_icon_green_black.png&quot;);background-size: 29px;background-repeat: no-repeat;background-color: #000000;">
                        <img src="{{ asset('assets/img/icon/hj_icon.svg') }}" alt="" style="display: none;">
                    </figure>
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __("generated.Rôles et permissions") }}</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4">
            <div class="col-12">
                <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill d-flex flex-wrap justify-content-center"
                    id="navtabscard30" role="tablist" style="white-space: nowrap;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active d-flex align-items-center justify-content-center "
                            id="tab1120-tab" data-bs-toggle="tab" data-bs-target="#tab1120" type="button" role="tab"
                            aria-controls="tab1120" aria-selected="true">{{ __("generated.Rôles") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center justify-content-center disabled "
                            id="tab1220-tab" data-bs-toggle="tab" data-bs-target="#tab1220" type="button" role="tab"
                            aria-controls="tab1220" aria-selected="true">{{ __("generated.Permissions par rôle") }}</button>
                        <input type="hidden" name="role_id" id="editRoleIdOnListing" value="">
                        <input type="hidden" name="role_name" id="RoleNameOnListing" value="">
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center justify-content-center "
                            id="tab1020-tab" data-bs-toggle="tab" data-bs-target="#tab1020" type="button" role="tab"
                            aria-controls="tab1020" aria-selected="true">{{ __("generated.Permissions Globales") }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link d-flex align-items-center justify-content-center "
                            id="tab1320-tab" data-bs-toggle="tab" data-bs-target="#tab1320" type="button" role="tab"
                            aria-controls="tab1320" aria-selected="true">{{ __("generated.Gestion des utilisateurs") }}</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="nav-navtabscard30">
                <div style="" class="tab-pane fade" id="tab1220" role="tabpanel" aria-labelledby="tab1220-tab">
                    @include('setting.rolesPermissions.inc.permission')
                </div>

                <div class="tab-pane fade active show" id="tab1120" role="tabpanel" aria-labelledby="tab1120-tab">
                    <!-- Contenu des onglets "ROLES ASSOCIER TYPE ROLE" test -->
                    <div class="tab-content mt-3" id="myTabContent">
                        @foreach ($role_types as $key => $roleType)
                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tR{{ $key }}"
                                role="tabpanel">
                                <!-- Listign "ROLES ASSOCIER TYPE ROLE" -->
                                @include('setting.rolesPermissions.inc.role')
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade container" id="tab1020" role="tabpanel" aria-labelledby="tab1020-tab">
                    {{-- @include('setting.rolesPermissions.inc.assigningRoles') --}}
                    @include('setting.rolesPermissions.inc.assigningRoles')
                </div>
                {{-- <div class="tab-pane fade" id="tab1320" role="tabpanel" aria-labelledby="tab1320-tab">
                    @include('setting.rolesPermissions.inc.CrudUser')
                </div> --}}

                <div class="tab-pane fade" id="tab1320" role="tabpanel" aria-labelledby="tab1320-tab">
                    @include('setting.rolesPermissions.inc.CrudUser')
                </div>
            </div>
        </div>
        </div>
    </main>

    @vite(['resources/js/rolesPermissions/createAssignRole.js'])

    @include('setting.rolesPermissions.inc.edit-role')
    @include('setting.rolesPermissions.inc.create-role')


    <div class="modal fade" id="emailcomposeRTKH2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-pen avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __("generated.Modifier une Permission") }}</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Poste") }}</label>
                                <input type="text" class="input-1 destinataires" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Rôles") }}</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-10">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Actions") }}</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                        <div class="col-2" style="padding-right: 0;width: 50px;margin-left: 7px;">
                            <div class="color-picker-container">
                                <!-- Icon for triggering the palette -->
                                <div class="color-picker-icon" onclick="togglePalette()" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Couleur de la forme">
                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                        <a href="#" type="button">
                                            <i class="bi bi-paint-bucket avatar   rounded h5"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- The palette -->
                                <div class="color-picker" id="colorPicker">
                                    <canvas id="gradientCanvas" class="gradient-canvas"></canvas>
                                    <canvas id="hueCanvas" class="hue-strip"></canvas>
                                    <div class="selected-color">
                                        <div id="colorDisplay" class="color-display"></div>
                                        <span id="colorHex">#000000</span>
                                    </div>
                                    <div class="rgb-inputs">
                                        <div>
                                            <input type="number" id="red" min="0" max="255"
                                                value="0">
                                            <label for="red">R</label>
                                        </div>
                                        <div>
                                            <input type="number" id="green" min="0" max="255"
                                                value="0">
                                            <label for="green">G</label>
                                        </div>
                                        <div>
                                            <input type="number" id="blue" min="0" max="255"
                                                value="0">
                                            <label for="blue">B</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Tâches") }}</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i><span >{{ __("generated.Annuler") }}</span></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme translated_text" type="button"><i
                                    class="bi bi-floppy me-2"></i>
                                Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailcompose2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-pen avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __("generated.Modifier un utilisateur") }}</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label ">{{ __("generated.Type d'utilisateur") }}</label>
                                <input type="text" class="input-1 destinataires" value="Recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label ">{{ __("generated.Poste") }}</label>
                                <input type="text" class="input-1" value="Consultant en recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Utilisateur") }}</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i><span >{{ __("generated.Annuler") }}</span></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-floppy me-2"></i>
                                <span >{{ __("generated.Enregistrer") }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailcompose3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-block">
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-trash avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="fw-medium mb-0 ">{{ __("generated.Supprimer un utilisateur") }}</h6>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label ">{{ __("generated.Type d'utilisateur") }}</label>
                                <input type="text" class="input-1 destinataires" value="Recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box focus">
                                <label class="input-label ">{{ __("generated.Poste") }}</label>
                                <input type="text" class="input-1" value="Consultant en recrutement"
                                    onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Utilisateur") }}</label>
                                <input type="text" class="input-1" onfocus="setFocus(true)" onblur="setFocus(false)">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i><span >{{ __("generated.Annuler") }}</span></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="button"><i class="bi bi-trash me-2"></i>
                                <span >{{ __("generated.Supprimer") }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_footer')
    <script>
        $(document).ready(function() {
            function toggleClientSelect($roleSelect, wrapperId) {
                let selectedRoleName = $roleSelect.find('option:selected').data('role-name');
                if (selectedRoleName === 'portal client') {
                    $(wrapperId).show();
                } else {
                    $(wrapperId).hide();
                }
            }

            // For Ajout Modal
            $('#roles_user').on('change', function() {
                toggleClientSelect($(this), '#client-select-wrapper-add');
            }).trigger('change');

            // For Edit Modal
            $('#edit-roles').on('change', function() {
                toggleClientSelect($(this), '#client-select-wrapper-edit');
            }).trigger('change');
        });
    </script>

    <script>
        var PermissionListing = "{{ route('setting.permission') }}";
        var rolePermissionsRoute = "{{ route('setting.role-permission') }}";

        var RolePermissionListing = "{{ route('setting.get.role-permission') }}";

        var updateRolePermission = "{{ route('setting.change.role-permission') }}";

        $(document).ready(function() {

        });

        var PermissionListing = "{{ route('setting.permission') }}";
    </script>
    <!-- Then, load DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- Load DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script>
        var userListingData = "{{ route('api.users.listing') }}";
        var apiUserDelete = "{{ route('api.users.destroy', ['id' => 'id']) }}";
        var apiUserUpdate = "{{ route('api.users.update', ['id' => '__ID__']) }}";
        var apiUserCreate = "{{ route('api.users.create') }}";
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

    @vite(['resources/js/rolesPermissions/modulePermissions.js'])

@endsection
