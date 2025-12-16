<div class="tab-pane fade show" id="evaluateurs" role="tabpanel" aria-labelledby="tax-info-tab">


    {{-- <form action="#" method="post" id="addEditDataEvaluator" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" id="client-id-evaluator"> --}}

        @if (isset($evaluators))
            @foreach ($evaluators as $evaluator)
                <input type="hidden" name="evaluatorId[]" placeholder="Numéro" value="{{ __($evaluator->id) }}"
                    class="form-control border-start-0">
                <div class="col-12 mb-4">

                    <div class="card border-0 card-evaluator" data-index="0">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header theme-blue bg-gradient-theme-light">
                                            <div class="row align-items-center">

                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Evaluateur") }}</h6>

                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="row mb-3" style="padding-left: 10px">
                                                        <div class="col-2" style="width: 9%;">
                                                            <div class="col-auto position-relative">
                                                                <figure
                                                                    class="logo-evaluator-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                                    style="background-size: 119px;  line-height: 0 !important; margin-top: 2px !important; ">
                                                                    <img src="{{ isset($evaluator) ? asset('storage/' . $evaluator->path_logo) : asset('assets/img/icon/photo-empty.png') }}"
                                                                        class="client-evaluator-logo custom-file-input"
                                                                        alt="" />
                                                                </figure>
                                                                <div class="position-absolute hidden bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                    style="top: 78% !important;left: 60%;">
                                                                    <label
                                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn"
                                                                        style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;">
                                                                        <i class="bi bi-camera"></i>
                                                                        <input disabled type="file" name="path_logo[]"
                                                                            class="custom-file-input clientEvaluatorLogolightinput"
                                                                            id="clientEvaluatorLogolightinput"
                                                                            accept="image/*" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input disabled type="text" name="first_name[]"
                                                                        value="{{ __($evaluator->first_name) }}"
                                                                        placeholder="Prénom"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Prénom") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input disabled type="text"
                                                                        value="{{ __($evaluator->last_name) }}"
                                                                        name="last_name[]" placeholder="Nom"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Nom") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 19.9%;margin-top: 26px;margin-right: -10px;">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label>{{ __("generated.Poste") }}</label>
                                                                <select disabled name="profession_id[]"
                                                                    class="chosenoptgroup w-100 form-select border-start-0">
                                                                    @foreach ($professions as $profession)
                                                                        <option value="{{ __($profession->id) }}"
                                                                            {{ isset($evaluator) && $evaluator->profession_id == $profession->id ? 'selected' : '' }}>
                                                                            {{ __($profession->label) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent"
                                                            style="padding-right: 0;margin-top: 26px;width: 33%;">
                                                            <div class="types_evaluation_div">
                                                                @if ($evaluator->typeCoefficients)
                                                                    @foreach ($evaluator->typeCoefficients as $typeCoefficient)
                                                                        <div class="row mb-3 type_evaluation_div">
                                                                            <div class="col-12 "
                                                                                style="width: 61%;margin-right: -10px;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                                    <div
                                                                                        class="custom-multiple-select form-floating">
                                                                                        <select disabled
                                                                                            class="form-select border-start-0"
                                                                                            name="evaluation_type_id[][]">
                                                                                            @foreach ($types_evaluations as $type)
                                                                                                <option
                                                                                                    value="{{ __($type->id) }}"
                                                                                                    {{ isset($typeCoefficient) && $typeCoefficient->evaluation_type_id == $type->id ? 'selected' : '' }}>
                                                                                                    {{ __($type->name) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <label
                                                                                            >{{ __("generated.Type d'évaluation") }}</label>

                                                                                    </div>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">

                                                                                            <input disabled type="number"
                                                                                                name="coefficient[][]"
                                                                                                value="{{ __($typeCoefficient->coefficient) }}"
                                                                                                class="form-control border-start-0">
                                                                                            <label
                                                                                                >{{ __("generated.Coefficient") }}</label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <style>
                                                                                    .no-search .chosen-search {
                                                                                        display: none
                                                                                    }
                                                                                </style>
                                                                            </div>
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
            @endforeach
        @endif
</div>
