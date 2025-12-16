<!-- Button trigger modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editModalLabel">{{ __("generated.Modifier Agence") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edagenceForm" method="POST">
                    @method('PUT')
                    <input type="hidden" id="agenceId">
                    <label class="label-control ">{{ __("generated.Nom") }}</label>
                    <input type="text" class="form-control" name="name_agence" id="name_agence">
                    <br>
                    <label class="label-control ">{{ __("generated.Filiale") }}</label>
                    <div class="rounded border "
                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                        <select class="form-select chosenoptgroup w-100" name="filiale_id" id="edit_filiale_id">
                            @foreach ($filiales as $filiale)
                                <option value="{{ __($filiale->id) }}">
                                    {{ __($filiale->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme m-2 "
                    style="font-size: 18px; color: #fff; background-color: #035ec7; padding: 5px 9px; border-radius: 5px;"
                    id="save_edit">{{ __("generated.Sauvegarder") }}</button>
            </div>
        </div>
    </div>
</div>
