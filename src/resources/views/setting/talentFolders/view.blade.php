<div class="modal fade" id="techViewModal" tabindex="-1" aria-labelledby="techModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="techModalLabel">{{ __("generated.Détails Dosier de profil") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-6">
                        <label class="label-control fw-bold ">{{ __("generated.Nom :") }}</label>
                    </div>
                    <div class="col-6">
                        <p id="label" class="form-control-plaintext d-inline mb-0"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="label-control fw-bold ">{{ __("generated.Parent :") }}</label>
                    </div>
                    <div class="col-6">
                        <p id="view_skill_type_id" class="form-control-plaintext d-inline mb-0"></p>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">{{ __("generated.Fermer") }}</button> --}}
            </div>
        </div>
    </div>
</div>
