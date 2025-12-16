<div class="tab-pane fade show" id="filiales" role="tabpanel" aria-labelledby="tax-info-tab">
    @if ($clientFiliales->count() > 0)
        @foreach ($clientFiliales as $filiale)
            <div class="row mb-5 ">
                class="tab-content py-3"


                <div class="row justify-content-center mb-5 ">
                    <div class="col-11 ">
                        <div class="card border-0 div_create_filiale">
                            <div class="card-body" style="background-color: #e4e8ee54">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <h4 class="title custom-title ">{{ __("generated.Filiales") }}</h4>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mt-3">
                                                    <div class="col-2" style="width: 12%;">
                                                        <div class="col-auto position-relative">
                                                            <figure
                                                                class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                style="background-image: url(&quot;assets/img/icon/empty-logo2.png&quot;);line-height: 0 !important;margin-top: 2px !important;background-repeat: no-repeat;background-size: 119px;">
                                                                <img src="assets/img/icon/empty-logo2.png"
                                                                    alt="">
                                                            </figure>

                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="row">
                                                            <input type="hidden" name="filiale_id[]"
                                                                placeholder="Numéro" value="{{ __($filiale->id) }}"
                                                                required="" class="form-control border-start-0">

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Dénomination") }}</label>
                                                                    : {{ __($filiale->name) }}

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>
                                                                    <label >{{ __("generated.Forme juridique") }}</label> :
                                                                    {{ __($filiale->legalForm) }}

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>
                                                                    <label >{{ __("generated.Régime fiscal") }}</label> : {{ __($filiale->taxRegime) }}

                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>
                                                                    <label >{{ __("generated.Secteur d’activité") }}</label> :
                                                                    {{ __($filiale->activity_area) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Activité") }}</label>
                                                                    : {{ __($filiale->activity) }}

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="row">

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Effectif") }}</label>
                                                                    : {{ __($filiale->workforce) }}

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Date de création") }}</label>

                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>
                                                                    <label >{{ __("generated.Adresse") }}</label> :
                                                                    {{ __($filiale->adresse) }}

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Code postal") }}</label> : {{ __($filiale->code_postal) }}

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Ville") }}</label> :
                                                                    {{ __($filiale->city) }}

                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div>

                                                                    <label >{{ __("generated.Pays") }}</label> :
                                                                    {{ __($filiale->country) }}

                                                                </div>
                                                            </div>
                                                            <style>
                                                                #chosen_ville_1_chosen {
                                                                    width: 100% !important;
                                                                }

                                                                #chosen_ville_1_chosen a.chosen-single {
                                                                    padding: 0;
                                                                    margin-left: -8px
                                                                }
                                                            </style>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endforeach
@endif

@if ($clientFiliales->count() == 0)
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="title custom-title ">{{ __("generated.Filiales") }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center ">{{ __("generated.Aucune filiale") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
