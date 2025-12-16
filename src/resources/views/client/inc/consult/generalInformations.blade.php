<div class="tab-pane fade show active" id="general-info" role="tabpanel" aria-labelledby="general-info-tab">
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

                                                <h5 class="fw-medium mb-0 ">{{ __("generated.Coordonnées") }}</h5>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center mt-3">
                                                <div class="col-2" style="width: 12%;">
                                                    <div class="col-auto position-relative">
                                                        {{--                                                        <figure --}}
                                                        {{--                                                            class="avatar avatar-100 coverimg top-80 shadow-md border-3 border-light" --}}
                                                        {{--                                                            style="background-image: url('assets/img/icon/empty-logo2.png');line-height: 0 !important; margin-top: 2px !important; background-repeat: no-repeat; background-size: 119px;"> --}}
                                                        {{--                                                            <img id="previewLogo" src="assets/img/icon/empty-logo2.png" alt="" --}}
                                                        {{--                                                                style="display: block !important; width: 100px; height: auto; z-index: 1;"> --}}
                                                        {{--                                                        </figure> --}}
                                                        <figure
                                                            class="logo-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                            style="background-size: 119px;  line-height: 0 !important; margin-top: 2px !important; ">
                                                            <img src="{{ isset($client) ? asset('storage/' . $client->path_logo) : asset('assets/img/icon/photo-empty.png') }}"
                                                                class="client-logo custom-file-input" alt="" />
                                                        </figure>

                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <span >{{ __("generated.Numéro") }}</span> :
                                                            {{ $client->id ?? '--' }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Dénomination") }}</label> :
                                                            {{ $client->name ?? '--' }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Forme juridique :") }}</label>
                                                            {{ $client->legalForm ?? '--' }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Régime fiscal :") }}</label>
                                                            {{ $client->tax_regime ?? '--' }}
                                                        </div>

                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Secteur d’activité :") }}</label>
                                                            {{ __($client->activity_area) }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Activité") }}</label> :
                                                            {{ __($client->activity) }}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="row">

                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Effectif") }}</label> :
                                                            {{ __($client->workforce) }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Date de création") }}</label>
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Adresse") }}</label> :
                                                            {{ __($client->address) }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Code postal") }}</label> :
                                                            {{ __($client->code_postal) }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Ville") }}</label> :
                                                            {{ __($client->cityName) }}
                                                        </div>
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <label >{{ __("generated.Pays") }}</label> :
                                                            {{ __($client->country) }}
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
