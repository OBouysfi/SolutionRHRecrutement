<div class="modal fade" id="createRole" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-block">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-person-add avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Ajouter un Rôle") }}</h6>
                    </div>
                </div>
                <form action="{{ route('role.store') }}" method="POST" id="createRoleForm">
                    @csrf
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <label for="roles" class="form-label fw-semibold ">{{ __("generated.Type de Rôle") }}</label>
                            <select class="chosenoptgroup w-100 form-select select2" name="role_type_id"
                                id="role_types">
                                @foreach ($role_types as $role)
                                    <option value="{{ __($role->id) }}">
                                        {{ __($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="input-box">
                                <label class="input-label ">{{ __("generated.Libellé du Rôle") }}</label>
                                <input type="text" class="input-1 destinataires" onfocus="setFocus(true)"
                                    onblur="setFocus(false)" name="name">
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="btn btn-theme" type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="bi bi-x-square me-2"></i><span >{{ __("generated.Annuler") }}</span></button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-theme" type="submit"><i class="bi bi-floppy me-2"></i>
                               <span >{{ __("generated.Enregistrer") }}</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
