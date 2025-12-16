<!-- Button trigger modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editModalLabel">{{ __("generated.Modifier Filiale") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editfilialeForm" method="POST">
                    @method('PUT')
                    <input type="hidden" id="filialeId">
                    <label class="label-control ">{{ __("generated.Filaile :") }}</label>
                    <input type="text" class="form-control" name="name_filiale" id="name_filiale"
                        style="border-bottom: 1px solid #005DC7">
                    <br>
                    <label class="label-control ">{{ __("generated.Ville :") }}</label>
                    <div class="rounded border "
                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                        <select class="form-select chosenoptgroup w-100" name="city_id" id="edit_city_id">
                            @foreach ($cities as $city)
                                <option value="{{ __($city->id) }}">
                                    {{ __($city->name) }}
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
