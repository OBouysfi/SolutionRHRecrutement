
<div class="modal fade" id="addToCampaign" tabindex="-1" aria-hidden="true">
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
                        <h6 class="fw-medium mb-0 translated_text">Ajouter des collaborateurs à la campagne : <b class="campaignLabel"> </b> </h6>
                    </div>

                    {{-- close button --}}
                    <div class="col-auto">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-12">

                        <div class="form-group position-relative check-valid is-valid">
                            <div class="input-group input-group-lg">
                                <div class="form-floating">

                                    <select class="form-control select2-elem translated_text" name="collaborators[]" id="collaborators" multiple="multiple" style="width: 100%" data-placeholder="{{ __("generated.Sélectionneur des candidats") }}">
                                        @if (isset($assessfirstUsers['data']) && count($assessfirstUsers['data']) > 0)
                                            @foreach ($assessfirstUsers['data'] as $collab)

                                                <option value="{{ __($collab['uuid']) }}"> {{ __($collab['email']) }} </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    @error('collaborators')
                                        <div class="error-message">{{ __($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="row mb-5">
                    <div class="col-12 ms-auto" style="width: 36%">
                        <div class="form-check form-switch" style="margin-top: 4px;">
                            <button  class="btn btn-theme mnw-100 bg-blue invit-btn " style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Inviter") }}</button>
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