<div class="tab-pane fade show" id="tax-info" role="tabpanel" aria-labelledby="tax-info-tab">


    <div class="row mb-5 ">
        <div class="tab-content py-3">
            <div class="row justify-content-center mb-5">
                <div class="col-11">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header bg-gradient-theme-light">
                                            <div class="row align-items-center">

                                                <h5 class="fw-medium mb-0 ">{{ __("generated.identifiant fiscal") }}</h5>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            
                                            <div class="row  mt-5">

                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Numéro de Registre du Commerce") }}</label> :
                                                            {{ $clientFinance ? $clientFinance->rc : '--' }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.identifiant Commun de l'Entreprise (ICE)") }}</label> :
                                                            {{ $clientFinance ? $clientFinance->unique_identifier : '--' }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Taxe Professionnelle") }}</label>
                                                            : {{ $clientFinance ? $clientFinance->taxe : '--' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Ville") }}</label> : :
                                                            {{ $clientFinance ? $clientFinance->city : '--' }}
                                                        </div>

                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Pays") }}</label> :
                                                            {{ $clientFinance ? $clientFinance->country : '--' }}
                                                        </div>


                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.identifiant Fiscal") }}</label> :
                                                            {{ $clientFinance ? $clientFinance->ice_siret : '--' }}
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
</div>
