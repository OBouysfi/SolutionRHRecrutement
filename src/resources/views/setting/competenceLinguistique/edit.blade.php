<!-- Button trigger modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editModalLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editModalLabel">{{ __("generated.Modifier Compétence Linguistique") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="langForm" method="POST">
                    @method('PUT')
                    <input type="hidden" id="langId">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" placeholder="{{ __("generated.Nom") }}" name="name_lang" id="name_lang"
                                class="form-control border-start-0 translated_text">
                            <label><span >{{ __("generated.Nom") }}</span><span
                                    class="text-themeColor">*</span></label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                            <label >{{ __("generated.Catégorie :") }}</label>
                            <select class="form-select chosenoptgroup w-100" name="edit_skill_type_id"
                                id="edit_skill_type_id">
                                <option value="Tous" selected >{{ __("generated.Tous") }}</option>

                                @foreach ($skillTypes as $type)
                                    <option value="{{ __($type->id) }}">{{ __($type->label) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme m-2 "
                    style="font-size: 18px; padding: 5px 9px; border-radius: 5px;"
                    id="save_edit">{{ __("generated.Sauvegarder") }}</button>
            </div>
        </div>
    </div>
</div>
