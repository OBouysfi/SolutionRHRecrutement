<div class="modal fade" id="editRole" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-block">
                <!-- Modal Header -->
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i class="bi bi-person-add avatar   rounded" style="font-size: 20px;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 " id="modalTitle">{{ __("generated.Modifier un Rôle") }}</h6>
                    </div>
                </div>

                <form id="editRoleForm" method="POST" action="{{ route('role.update') }}">
                    @csrf
                    <input type="hidden" id="role_id" name="role_id"> <!-- Hidden input for edit -->

                    <!-- Laravel PUT method for editing -->
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <label for="role_types" class="form-label fw-semibold ">{{ __("generated.Type de Rôle") }}</label>
                            <select class="chosenoptgroup w-100 form-select select2" name="role_type_id"
                                id="role_types">
                                @foreach ($role_types as $role)
                                    <option id="role_type_{{ __($role->id) }}" value="{{ __($role->id) }}"
                                        data-type-id="{{ __($role->id) }}">
                                        {{ __($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Libellé du Rôle") }}</label>
                                <input type="text" class="form-control destinataires" id="role_name" name="name"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer Buttons -->
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                <i class="bi bi-x-square me-2"></i><span >{{ __("generated.Annuler") }}</span>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="submit">
                                <i class="bi bi-floppy me-2"></i><span >{{ __("generated.Enregistrer") }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
