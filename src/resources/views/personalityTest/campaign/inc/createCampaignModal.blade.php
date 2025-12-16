
<div class="modal fade" id="createCampaign" tabindex="-1" aria-hidden="true">
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
                        <h6 class="fw-medium mb-0 ">{{ __("generated.Créer une campagne") }}</h6>
                    </div>

                    {{-- close button --}}
                    <div class="col-auto">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>


                {{--                         
                <form action=" {{ route('api.personalityTest.campaign.create') }} " method="get">
                    @csrf
                    
                </form> 
                --}}

                <div class="row mt-4 mb-4">

                    <div class="col-6">
                        <div class="form-group mb-3 position-relative check-valid is-valid">
                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <input name="label" id="label" type="text" placeholder="{{ __("generated.Nom de la campagne") }}" value="{{ old('label') }}" required class="form-control border-start-0 translated_text">
                                    <label >{{ __("generated.Nom de la campagne") }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group mb-3 position-relative check-valid is-valid">
                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <select name="predictive_model_id" class="form-select" id="predictive_model_id" aria-label="Floating label select example">
                                        <option selected disabled >{{ __("generated.Modèle prédictif") }}</option>
                                        @foreach ($predictiveModels as $predictiveModel)
                                            <option 
                                                value="{{ __($predictiveModel->id) }}"
                                                {{ old('predictive_model_id') == $predictiveModel->id ? 'selected' : '' }}
                                            >
                                                {{ __($predictiveModel->label) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="predictive_model_id" >{{ __("generated.Modèle prédictif") }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group mb-3 position-relative check-valid is-valid">

                            <div class="input-group input-group-lg">
                                <div class="form-floating">
                                    <select name="location" class="form-select " id="location" aria-label="Floating label select example">
                                        <option selected disabled >{{ __("generated.Localisation") }}</option>
                                        @foreach ($cities as $city)
                                            <option 
                                                value="{{ __($city->id) }}"
                                                {{ old('location') == $city->id ? 'selected' : '' }}
                                            >
                                                {{ __($city->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="location" >{{ __("generated.Localisation") }}</label>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="row mb-5">
                    <div class="col-12 ms-auto" style="width: 36%">
                        <div class="form-check form-switch" style="margin-top: 4px;">
                            <button  class="btn btn-theme mnw-100 bg-blue save-btn " style="float: right;font-size: 14px;margin-left: 10px">{{ __("generated.Créer") }}</button>
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