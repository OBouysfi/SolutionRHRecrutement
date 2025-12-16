<!-- Modal spécifique à chaque utilisateur -->
<div class="modal fade" id="assignRoleModal{{ __($user->id) }}" tabindex="-1"
    aria-labelledby="assignRoleModalLabel{{ __($user->id) }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-3">
            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold d-flex align-items-center" id="assignRoleModalLabel{{ __($user->id) }}">
                    <span >{{ __("generated. Assigner un Rôle à") }}</span><span
                        class="text-warning ms-1">{{ __($user->name) }}</span>
                </h5>
                <button type="button" class="btn-close btn-close-white translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-4">
                <form action="{{ route('assignRole') }}" method="POST" id="createAssignRole">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ __($user->id) }}">

                    <div class="mb-3">
                        <label for="roles" class="form-label fw-semibold ">{{ __("generated.Rôles") }}</label>
                        <select class="chosenoptgroup w-100 form-select select2" id="assignment-select" name="roles[]"
                            id="roles" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ __($role->id) }}"
                                    {{ in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'selected' : '' }}>
                                    {{ __($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary "
                            data-bs-dismiss="modal">{{ __("generated.Fermer") }}</button>
                        <button type="submit" class="btn btn-theme ">{{ __("generated.Mettre à jour") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- <!-- Modal unique pour assigner un rôle -->
    <div class="modal fade" id="assignRoleModalGlobal" tabindex="-1" aria-labelledby="assignRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <!-- Header -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold d-flex align-items-center" id="assignRoleModalLabel">
                        Assigner un Rôle à <span id="userName" class="text-warning ms-1"></span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-4">
                    <form id="assignRoleForm" action="{{ route('assignRole') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" id="userId">

                        <div class="mb-3">
                            <label for="roles" class="form-label fw-semibold">Rôles</label>
                            <select class="chosenoptgroup w-100 form-select select2" name="roles[]" id="roles"
                                multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ __($role->id) }}">{{ __($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Fermer
                            </button>
                            <button type="submit" class="btn btn-theme">
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}