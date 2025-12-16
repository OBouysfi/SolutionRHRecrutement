<div class="tab-pane fade show" id="admin-user" role="tabpanel" aria-labelledby="admin-user-tab">


    @if($adminUser)
            <div class="row">
                <div class="tab-content py-3">
                    <div class="row justify-content-center mb-5">
                        <div class="col-11">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-header bg-gradient-theme-light">
                                                            <h4>{{ __("generated.account") }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">                                                    
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <label class="fw-bold">{{ __("generated.Contact") }}</label>
                                                                    : {{ __($adminUser->name) }}
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label class="fw-bold">{{ __("generated.Email") }}</label>
                                                                    : {{ __($adminUser->email) }}
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

    @endif


    @if(!$adminUser)
        <div class="row">
            <div class="tab-content py-3">
                <div class="row justify-content-center mb-5">
                    <div class="col-11">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card-header bg-gradient-theme-light">
                                                        <h4>{{ __("generated.account") }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row  mt-5">
                                                    <div class="col-12">
                                                        <p class="text-center ">{{ __("generated.Aucun évaluateur") }}</p>
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
    @endif
</div>
