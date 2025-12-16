<style>
    .table-responsive {
        position: relative;
        max-height: 400px;
        /* Hauteur max pour activer le scroll */
        overflow-y: auto;
        /* Activer le défilement vertical */
        border: 1px solid var(--adminux-theme-bg);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        position: sticky;
        top: 0;
        width: 300px;
        background-color: var(--adminux-theme-bg);
        /* Couleur de fond pour éviter que le texte se mélange */
        z-index: 10;
        /* Priorité pour garder l'entête devant */
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
        /* Petite ombre pour le style */
    }

    .div_figed {
        position: sticky;
        left: 0;
        z-index: 10;
        width: 300px;
        background: var(--adminux-theme-bg) !important;
    }
</style>




<div class="container">
    {{-- <div class="row mb-4" style="margin-top: 14px !important">
        <select class="form-select" id="ModulesSelect" multiple>
            <!-- Options injected dynamically -->
        </select>
    </div> --}}
    <div class="row mb-4 form-group check-valid is-valid" style="margin-top: 14px !important">
        
        <div  class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
            <label><span class=" translated_text"></span></label>
            <select required  class="chosenoptgroup w-100 input-1 " style="width: 100%" data-placeholder="Sélectionnez certaines options"
                onfocus="setFocus(true)" onblur="setFocus(false)" id="ModulesSelect" multiple>
                 @foreach($permissionsTitles as $key => $value)
                    <option value="{{ __($value) }}">{{ __($value) }}</option>
                 @endforeach
            </select>
        </div>
    
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 allPermissionsCard" id="allPermissionsCard">
                            <!-- <div class="card border-0">
                            <div class="card-body">
                                <div class="row px-3">
                                    <div class="col-12">
                                        <h6 class="title custom-title">Assignation des rôles</h6>

                                        <div class="table-responsive">
                                            <div class="tab-content" id="permissionTabsContent">
                                                @foreach ($modules as $key => $module)
<div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="tab-content-{{ $key }}" role="tabpanel" aria-labelledby="tab-{{ $key }}">
                                                    <div class="d-flex justify-content-end mb-3">
                                                        <button class="btn btn-theme me-2 edit-permissions" data-module="{{ __($module) }}">Modifier</button>
                                                        <button class="btn btn-theme save-permissions" data-module="{{ __($module) }}" style="display: none;">Enregistrer</button>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table align-middle">
                                                            <thead>
                                                                <tr class="align-middle" style="border-top: 1px solid #e9e9e9;">
                                                                    <th class="text-start" style="width: 500px;">DROIT</th>

                                                                    @foreach ($roles as $role)
<th class="text-start">{{ __($role->name) }}</th>
@endforeach

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($permissions as $parent => $permission)
@if (strtolower($parent) == strtolower($module))
@foreach ($permission as $permis)
<tr>
                                                                    <td>
                                                                        <div style="min-width: 400px;width:fit-content"><strong>{{ __($permis->name) }}</strong></div>
                                                                        <div>{{ __($permis->task) }}</div>
                                                                    </td>

                                                                    @foreach ($roles as $role)
<td class="text-center">
                                                                        <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                                            <input class="form-check-input" type="checkbox"
                                                                            disabled
                                                                                data-role-id="{{ __($role->id) }}"
                                                                                data-permission-id="{{ __($permis->id) }}"
                                                                                data-id="{{ __($permis->id) }}_{{ __($role->id) }}"
                                                                                {{ $role->hasPermissionTo($permis->name) ? 'checked' : '' }}>
                                                                        </div>
                                                                    </td>
@endforeach


                                                                </tr>
@endforeach
@endif
@endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
@endforeach
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
