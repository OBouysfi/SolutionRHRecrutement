{{-- <div class="modal fade" id="insertionRolePermission{{ __($roleType->id) }}" data-role-id="{{ __($roleType->id) }}" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-block">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-person-lock avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0">Assignation des rôles et permissions pour {{ __($roleType->name) }}</h6>
                    </div>
                </div>

                <form action="" method="POST" id="createRolePermissionForm">
                    @csrf
                    <!-- Sélection des rôles -->
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="form-group position-relative check-valid is-valid">
                                <div id="profession-selector" class="rounded border poste-chosen select-search"
                                    style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                    <label
                                        style="margin-top: 8px; margin-left: 17px; color: #505050; font-size: 12px;">Rôles</label>
                                    <select name="role_id" class="chosenoptgroup w-100 select-search-chosen">
                                        <option value="" selected>Choisir un Rôle</option>
                                        @foreach ($roleType->roles as $role)
                                            <option value="{{ __($role->id) }}">{{ __($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sélection Modéle -->
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="form-group position-relative check-valid is-valid">
                                <div id="profession-selector" class="rounded border poste-chosen select-search"
                                    style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                    <label
                                        style="margin-top: 8px; margin-left: 17px; color: #505050; font-size: 12px;">Modéle</label>
                                    <select name="modele_permission" id="modele_permission"
                                        class="chosenoptgroup w-100 select-search-chosen">
                                        <option value="" selected>Choisir un Modéle</option>
                                        @foreach ($permissions as $parent => $permission)
                                            <option value="{{ __($parent) }}">{{ __($parent) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sélection task -->
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <div class="form-group position-relative check-valid is-valid">
                                <div id="profession-selector" class="rounded border poste-chosen select-search"
                                    style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                                    <label
                                        style="margin-top: 8px; margin-left: 17px; color: #505050; font-size: 12px;">Tâches</label>
                                    <select class="chosenoptgroup w-100 form-select select2" name="task_permission[]"
                                        id="task_permission" multiple>
                                        <!-- Tasks dynamiques -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i> Annuler</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="submit"><i class="bi bi-floppy me-2"></i>
                                Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


<div class="modal fade" id="insertionRolePermission{{ __($roleType->id) }}" data-role-id="{{ __($roleType->id) }}" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-3">
            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="assignRoleModalLabel{{ __($roleType->id) }}">
                    <span >{{ __("generated.Assignation des Rôles et Permissions pour") }}</span><span
                        class="text-warning">{{ __($roleType->name) }}</span>
                </h5>
                <button type="button" class="btn-close btn-close-white translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <form action="" method="POST" id="createRolePermissionForm" class="createRolePermissionForm">
                    @csrf
                    <!-- Sélection des rôles -->
                    <div class="mb-4">
                        <label for="roles" class="form-label fw-semibold ">{{ __("generated.Rôles") }}</label>
                        <div class="input-group">
                            {{-- <select name="role_id" class="chosenoptgroup w-100 select-search-chosen form-select select2" aria-describedby="roleInfo"> --}}
                            <select name="role_id" required class="form-select border-0" aria-describedby="roleInfo">
                                <option value="" selected >{{ __("generated.Choisir un Rôle") }}</option>
                                @foreach ($roleType->roles as $role)
                                    <option value="{{ __($role->id) }}">{{ __($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small id="roleInfo" class="form-text text-muted ">{{ __("generated.Sélectionnez un rôle pour attribuer des permissions spécifiques à cet utilisateur.") }}</small>
                    </div>

                    <!-- Sélection Modules -->
                    <div class="mb-4">
                        <label for="modele_permission" class="form-label fw-semibold ">{{ __("generated.Modules") }}</label>
                        <div class="input-group">
                            {{-- <select name="modele_permission" id="modele_permission" class="chosenoptgroup w-100 select-search-chosen form-select select2" aria-describedby="modeleInfo"> --}}
                            <select data-role-id="{{ __($roleType->id) }}" name="modele_permission" id="modele_permission"
                                required class="form-select border-0 modele_permission" aria-describedby="modeleInfo"
                                style="text-transform: capitalize;">
                                <option value="" selected >{{ __("generated.Choisir un module") }}</option>
                                @foreach ($permissions as $parent => $permission)
                                    <option value="{{ __($parent) }}">{{ __($parent) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small id="modeleInfo" class="form-text text-muted ">{{ __("generated.Sélectionnez un module pour préconfigurer les permissions associées à ce rôle.") }}</small>
                    </div>

                    <!-- Sélection Tâches -->
                    <div class="mb-4">
                        <label for="task_permission" class="form-label fw-semibold ">{{ __("generated.Permissions") }}</label>
                        <div class="input-group">
                            <select required class="chosenoptgroup w-100 form-select select2" name="task_permission[]"
                                id="task_permission{{ __($roleType->id) }}" multiple aria-describedby="taskInfo">
                                <!-- Tasks dynamiques -->
                            </select>
                        </div>
                        <small id="taskInfo" class="form-text text-muted ">{{ __("generated.Sélectionnez les tâches spécifiques à attribuer à ce rôle afin de personnaliser précisément ses permissions.") }}</small>
                    </div>

                    <!-- Footer Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary "
                            data-bs-dismiss="modal">{{ __("generated.Fermer") }}</button>
                        <button type="submit" class="btn btn-theme ">{{ __("generated.Enregistrer les modifications") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
