<div class="modal fade" id="persoViewModal" tabindex="-1" aria-labelledby="persoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="persoModalLabel">{{ __("generated.Détails Compétence Personnelle") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-6">
                        <label class="label-control  ">{{ __("generated.Nom :") }}</label>
                    </div>
                    <div class="col-6">
                        <p id="label" class="form-control-plaintext d-inline mb-0 text-bw"></p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <label class="label-control  ">{{ __("generated.Catégorie :") }}</label>
                    </div>
                    <div class="col-6">
                        <p id="perso_skill_type_id_view" class="form-control-plaintext d-inline mb-0 text-bw"></p>

                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal" >{{ __("generated.Fermer") }}</button>
            </div>
        </div>
    </div>
</div>



