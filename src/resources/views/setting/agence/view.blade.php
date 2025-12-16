<div class="modal fade" id="agenceViewModal" tabindex="-1" aria-labelledby="agenceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="agenceModalLabel">{{ __("generated.Détails Agence") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                <div class="col-6">
                    <label class="label-control translated_text"><strong>Nom du Agence:</strong></label>
                </div>
                <div class="col-6">
                    <p id="name" class="form-control-plaintext translated_text text-bw"></p>
                </div>
               </div>
               <div class="row">
                <div class="col-6">
                    <label class="label-control translated_text"><strong>Filiale:</strong></label>
                </div>
                <div class="col-6">
                    <p id="show_name_filiale" class="form-control-plaintext d-inline text-bw"></p>
                    <span id="show_filiale_id" class="text-muted"></span> 
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal" style="color: aliceblue">{{ __("generated.Fermer") }}</button>
            </div>
        </div>
    </div>
</div>


