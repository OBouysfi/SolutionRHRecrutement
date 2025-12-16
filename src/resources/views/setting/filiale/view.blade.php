<div class="modal fade" id="filialeViewModal" tabindex="-1" aria-labelledby="filialeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="filialeModalLabel">{{ __("generated.Détails de la Filiale") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                <div class="col-6">
                    <label class="label-control"><strong >{{ __("generated.Nom du Filiale:") }}</strong></label>
                </div>
                <div class="col-6">
                    <p id="name" class="form-control-plaintext text-bw"></p>
                </div>
               </div>
                <div class="row">
                    <div class="col-6">
                    <label class="label-control"><strong >{{ __("generated.Ville:") }}</strong></label>
                </div>
                    <div class="col-6">
                    <p id="name_city" class="form-control-plaintext text-bw"></p>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal" style="color: aliceblue">{{ __("generated.Fermer") }}</button>
            </div>
        </div>
    </div>
</div>
