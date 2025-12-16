<div class="modal fade" id="addTalentFolderModal" tabindex="-1" aria-labelledby="addTalentFolderModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="mb-1 text-center  text-bw">{{ __("generated.Ajouter un dossier au vivier de talents") }}</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="storeTalentFolderForm" method="POST">
                @csrf
                {{-- <div class="mb-2">
                    <label for="parentFolder" class="form-label ">{{ __("generated.Dossier parent") }}</label>
                    <div class="input-group input-group-md">
                        <select class="form-select" id="parentFolder" name="parent_id">
                            <option value="" >{{ __("generated.-- Aucun (Dossier racine) --") }}</option>
                            @foreach ($talentFolders as $folder)
                                <option value="{{ __($folder->id) }}">{{ __($folder->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="mb-2 ">
                    <div class="form-group check-valid is-valid">
                         <div class="custom-multiple-select rounded  poste-chosen"
                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                        <label
                            class="text-bw ">{{ __("generated.Dossier parent") }}</label>
                        <select class="form-select chosenoptgroup w-100" id="parentFolder" name="parent_id">>
                            <option  value="">{{ __("generated.-- Aucun (Dossier racine) --") }}</option>
                            @foreach ($talentFolders as $folder)
                                <option value="{{ __($folder->id) }}">{{ __($folder->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                   
                </div>
                <br>

                {{-- <div class="mb-2">
                    <label for="folderName" class="form-label ">{{ __("generated.Nom du dossier") }}</label>
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control border-start-0" id="folderName" name="name"
                            required>
                    </div>
                </div> --}}

                {{-- <div class="mb-2">
                    <div class="custom-multiple-select rounded poste-chosen"
                         style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                         <label for="folderName" class="text-bw "
                               >{{ __("generated.Nom du dossier") }}</label>
                        <input type="text" id="folderName" name="name" required
                               style="margin-left: 17px; border: none; outline: none; background-color: transparent; width: calc(100% - 34px); padding: 4px 0;">
                    </div>
                </div> --}}
                <div class="form-group mb-3 position-relative check-valid is-valid">
                        <div class="input-group input-group-lg">
                            <div class="form-floating">
                                 <input type="text" class="form-control border-start-0" id="folderName" name="name"
                            required>
                                <label class=" text-bw">{{ __("generated.Nom du dossier") }}</label>
                            </div>
                        </div>
                </div>
                
                <div class="d-flex mt-2 float-end">
                    <button class="btn btn-theme float-end" type="submit">
                        <i class="bi bi-plus-square me-2"></i><span >{{ __("generated.Ajouter") }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
