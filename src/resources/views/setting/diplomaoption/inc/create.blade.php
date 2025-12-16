<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">{{ __("generated.Ajouter option du diplome") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="diplomaOptionform">
                    @csrf
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" placeholder="{{ __("generated.Intitulé") }}" name="label" id="labelInput"
                                class="form-control border-start-0 translated_text">
                            <label><span >{{ __("generated.Intitulé") }}</span><span
                                    class="text-themeColor">*</span></label>
                        </div>
                    </div>
            <div id="formFeedback" style="margin-top: 10px; display: none;"></div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-theme translated_text"  style="font-size: 18px; padding: 5px 9px; border-radius: 5px;" id="save" value="{{ __("generated.Ajouter") }}"></button> 
            </form>
            </div>
        </div>
    </div>
</div>
