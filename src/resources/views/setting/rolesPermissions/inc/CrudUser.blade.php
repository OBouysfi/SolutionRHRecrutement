<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body bg-gradient-theme-light">
                    <div class="row align-items-center ">
                        <div class="col-6">
                            <div class="row g-2">
                                <div class="col">

                                    <div class="form-group  position-relative check-valid is-valid">
                                        <div id="profession-selector"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label
                                                >{{ __("generated.rôle") }}</label>
                                            <select class="chosenoptgroup w-100 select-search-chosen"
                                                name="role" id="role_filter">
                                                <option value="" selected></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ __($role->id) }}">
                                                        {{ __($role->name) }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group position-relative check-valid is-valid">
                                        <div id="profession-selector"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label
                                                >{{ __("generated.permissions") }}</label>
                                            <select class="chosenoptgroup w-100 select-search-chosen"
                                                id="permission_filter">
                                                <option value="" selected></option>
                                                @foreach ($permissions as $parent => $permission)
                                                    <option value="{{ __($parent) }}">
                                                        {{ __($parent) }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group position-relative check-valid is-valid">
                                        <div id="profession-selector"
                                            class="custom-multiple-select rounded border poste-chosen select-search"
                                            style="border-radius: 8px !important;">
                                            <label
                                                >{{ __("generated.Statut") }}</label>
                                            <select class="chosenoptgroup w-100" id="status_filter">
                                                <option value="" selected >{{ __("generated.Tous") }}</option>
                                                <option value="0" >{{ __("generated.Bloqué") }}</option>
                                                <option value="1" >{{ __("generated.Actif(s)") }}</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 ms-auto">
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-theme"
                                        data-bs-toggle="modal" data-bs-target="#AddUser">
                                        <i class="bi bi-plus-lg"></i> &nbsp; <span
                                            >{{ __("generated.Ajouter un utilisateur") }}</span>
                                    </button>
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
            <div class="card border-0 ">
                <div class="card-header bg-gradient-theme-light ">
                    <div class="row align-items-center">

                        <div class="col">
                            <h5 >{{ __("generated.Liste des utilisateurs") }}</h5>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12" style="overflow: hidden;overflow-x: scroll;">
                            <div class="">
                                <table class="table align-middle mb-0 " id="userTable"
                                    style="width: 100%">
                                    <thead style="backdrop-filter: blur(8px)" class="bg-light-theme">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center ">{{ __("generated.Nom D'utilisateur") }}</th>
                                            <th class="text-center ">{{ __("generated.Status") }}</th>
                                            <th class="text-center ">{{ __("generated.Role") }}</th>
                                            <th class="text-center ">{{ __("generated.Email") }}</th>
                                            <th class="text-center ">{{ __("generated.Membres Depuis") }}</th>
                                            <th class="text-center ">{{ __("generated.Dernier Acces") }}</th>
                                            <th class="text-center ">{{ __("generated.Actions") }}</th>

                                        </tr>
                                    </thead>
                                    <tbody style="vertical-align: middle;text-align:center;">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Add utilisateurs  --}}
    @include('setting.rolesPermissions.users.create')
    {{-- Edit utilisateurs  --}}
    @include('setting.rolesPermissions.users.edit')
    {{-- Edit utilisateurs  --}}
    @include('setting.rolesPermissions.users.view')

</div>
