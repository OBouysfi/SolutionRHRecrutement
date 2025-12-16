<div class="tab-pane fade show" id="evaluateurs" role="tabpanel" aria-labelledby="tax-info-tab">


    @if($evaluators->count() > 0)
        @foreach($evaluators as $evaluator)
            <div class="row mb-5 ">
                <div class="tab-content py-3">
                    <div class="row justify-content-center mb-5">
                        <div class="col-11">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h4 class="title custom-title ">{{ __("generated.Evaluateurs") }}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row  mt-5">

                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Prénom") }}</label>
                                                                    : {{ __($evaluator->first_name) }}
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Nom") }}</label>
                                                                    : {{ __($evaluator->last_name) }}
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label >{{ __("generated.Profession") }}</label>
                                                                    : {{ __($evaluator->profession->label) }}
                                                                </div>
                                                                @if($evaluator->typeCoefficients)
                                                                    @foreach($evaluator->typeCoefficients as $typeCoefficient)
                                                                        <div class="col-12 mb-3">
                                                                            <label
                                                                                >{{ __("generated.Coeficient") }}</label>
                                                                            : {{ __($typeCoefficient->coefficient) }}
                                                                        </div>

                                                                        <div class="col-12 mb-3">
                                                                            <label >{{ __("generated.Type d'évaluation") }}</label>
                                                                            : {{ __($typeCoefficient->evaluationType->name) }}
                                                                        </div>
                                                                    @endforeach
                                                                @endif
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


        @if($evaluators->count() == 0)
            <div class="row mb-5">
                <div class="tab-content py-3">
                    <div class="row justify-content-center mb-5">
                        <div class="col-11">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row mb-4">
                                                        <div class="col-12">
                                                            <h4 class="title custom-title ">{{ __("generated.Evaluateurs") }}</h4>
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
