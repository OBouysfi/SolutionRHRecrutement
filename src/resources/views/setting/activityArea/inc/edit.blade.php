<!-- Button trigger modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editModalLabel">{{ __("generated.Modifier un secteur d'activité") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editActivityAreaForm">
                    <input type="hidden" id="activityAreaId">
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" placeholder="{{ __("generated.Nom du secteur") }}" name="activityArea" id="activityArea"
                                class="form-control border-start-0 translated_text">
                            <label><span >{{ __("generated.Nom du secteur") }}</span><span
                                    class="text-themeColor">*</span></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme m-2 "  style="font-size: 18px; padding: 5px 9px; border-radius: 5px;" id="save_edit">{{ __("generated.Sauvegarder") }}</button>
            </div>
        </div>
    </div>
</div>
