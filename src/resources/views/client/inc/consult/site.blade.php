<div class="tab-pane fade show" id="sites" role="tabpanel" aria-labelledby="tax-info-tab">

    @if ($clientSites->count() > 0)
        @foreach ($clientSites as $site)
            <div class="row mb-5 ">
                <div class="tab-content py-3">
                    <div class="row justify-content-center mb-5">
                        <div class="col-11">
                            <div class="card border-0 div_create_site">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">
        
                                                        <h5 class="fw-medium mb-0 ">{{ __("generated.Sites") }}</h5>
        
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mt-5">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Nom du site") }}</label> :
                                                                    {{ __($site->site_name) }}
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Téléphone") }}</label> :
                                                                    {{ __($site->phone) }}
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Email") }}</label> :
                                                                    {{ __($site->email) }}
                                                                </div>




                                                            </div>

                                                        </div>


                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Responsable du Site") }}</label> : {{ __($site->responsable_name) }}
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Ville") }}</label> :
                                                                    {{ __($site->city) }}
                                                                </div>


                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Adresse") }}</label> :
                                                                    {{ __($site->address) }}
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
        @endforeach
    @endif

    @if ($clientSites->count() == 0)
        <div class="row mt-3">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h4 class="title custom-title ">{{ __("generated.Sites") }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-center ">{{ __("generated.Aucun site") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
