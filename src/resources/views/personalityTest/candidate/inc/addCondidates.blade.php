
<div class="modal fade" id="addCondidates" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row align-items-center mb-4">
                    <div class="col-auto">
                        <div class="avatar avatar-40 rounded bg-light-blue">
                            <a href="#" type="button">
                                <i style="font-size: 20px" class="bi bi-envelope avatar   rounded"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Inviter des candidats") }}</h6>
                    </div>
                    
                    {{-- close button --}}
                    <div class="col-auto">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class=" mt-3 mb-2">

                    <div class="form-group check-valid is-valid">
                        <div id="collaborators-selector" class="custom-multiple-select rounded border poste-chosen select-search" style="border-radius: 8px !important; background-color: var(--adminux-theme-bg);">
                            <label><span >{{ __("generated.Candidats") }}</span></label>
                            <select required name="collaborators[]" class="chosenoptgroup w-100 input-1 select2" style="width: 100%" data-placeholder="{{ __("generated.Sélectionneur des candidats") }}"
                                onfocus="setFocus(true)" onblur="setFocus(false)" id="collaborators" multiple>
                                <option value="" >{{ __("generated.Sélectionnez des candidats") }}</option>

                                @foreach ($localCondidates as $collab)

                                    <option value="{{ __($collab['id']) }}"> {{ __($collab['email']) }} </option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row mb-5">
                    <div class="col-12 ms-auto" style="width: 36%">
                        <div class="form-check form-switch" style="margin-top: 4px;">
                            <button  class="btn btn-theme mnw-100 bg-blue invite-btn" style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Inviter") }}</button>
                            {{-- loading button --}}
                            <button class="btn btn-theme mnw-100 bg-blue loading-btn" type="button" disabled style="float: right;font-size: 14px;margin-left: 10px; display: none;">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span >{{ __("generated.Loading...") }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>