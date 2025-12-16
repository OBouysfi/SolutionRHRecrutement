<div class="tab-pane fade show" id="evaluateurs" role="tabpanel" aria-labelledby="tax-info-tab">


    <form action="#" method="post" id="addEditDataEvaluator" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" id="client-id-evaluator">

        @if (isset($evaluators))
            @foreach ($evaluators as $evaluatorIndex => $evaluator)
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

                                        <div class="card-body" style="padding-top: 4rem">

                                            <div class="row mt-2 mb-4 justify-content-end">
                                                <div class="col-2">
                                                    <button
                                                        class="btn btn-danger mnw-100 btn-existed-evaluator-card-delete "
                                                        data-evaluator-id="{{ __($evaluator->id) }}" type="button" style="font-size: 12px;float: right;width: 100px">{{ __("generated.Supprimer") }}</button>
                                                </div>
                                            </div>

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
                                                                <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                                    style="top: 78% !important;left: 60%;">
                                                                    <label
                                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn"
                                                                        style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;">
                                                                        <i class="bi bi-camera"></i>
                                                                        <input type="file" name="path_logo[]"
                                                                            class="custom-file-input clientEvaluatorLogolightinput"
                                                                            id="clientEvaluatorLogolightinput"
                                                                            accept="image/*" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="first_name[]"
                                                                        value="{{ __($evaluator->first_name) }}"
                                                                        placeholder="Prénom"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Prénom") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        value="{{ __($evaluator->last_name) }}"
                                                                        name="last_name[]" placeholder="Nom"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Nom") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-3"
                                                             style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="email[]" value="{{ __($evaluator->email) }}"
                                                                           class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Email") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>


                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                            <div class="form-group check-valid is-valid">

                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label>Poste</label>
                                                                <select name="profession_id[]"
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
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent"
                                                            style="padding-right: 0;margin-top: 26px;width: 30%;">
                                                            <div class="types_evaluation_div">
                                                                @if ($evaluator->typeCoefficients)
                                                                    @foreach ($evaluator->typeCoefficients as $typeIndex => $typeCoefficient)
                                                                        <div class="row mb-3 type_evaluation_div">
                                                                            <div class="col-12 "
                                                                                 style="width: 61%;margin-right: -10px;">

                                                                                <div class="form-group check-valid is-valid">

                                                                                    <div
                                                                                        class="custom-multiple-select rounded border">
                                                                                        <div class="form-floating">
                                                                                            <label >{{ __("generated.Type d'évaluation") }}</label>

                                                                                            <select class="form-select border-0"
                                                                                                    name="evaluation_type_id[$evaluatorIndex][]">
                                                                                                @foreach ($types_evaluations as $type)
                                                                                                    <option value="{{ __($type->id) }}" {{ isset($typeCoefficient) && $typeCoefficient->evaluation_type_id == $type->id ? 'selected' : '' }}>
                                                                                                        {{ __($type->name) }}</option>
                                                                                                @endforeach
                                                                                            </select>

                                                                                        </div>
                                                                                    </div>
                                                                                    <style>
                                                                                        .no-search .chosen-search {
                                                                                            display: none
                                                                                        }
                                                                                    </style>
                                                                                </div>
                                                                            </div>





                                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                                style="width: 28%;margin-right: -12px;">
                                                                                <div
                                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                                    <div
                                                                                        class="input-group input-group-lg">
                                                                                        <div class="form-floating">

                                                                                            <input type="number"
                                                                                                name="coefficient[$evaluatorIndex][]"
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

                                                                            <div class="col-12 col-md-6 col-lg-2 add-type-evaluation"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-plus-square"
                                                                                    style="color: #005DC7;font-size: 25px;"></i>
                                                                            </div>

                                                                            <div class="col-12 col-md-6 col-lg-2 btn-type-evaluation-delete hidden"
                                                                                style="width: 6%;margin-top: 16px;">
                                                                                <i class="bi bi-trash text-red"
                                                                                    style="font-size: 25px;"></i>

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
        <div class="col-12" id="EvaluatorsTabContent">

            <div class="card border-0 card-evaluator" data-index="0">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-header bg-gradient-theme-light">
                                    <div class="row align-items-center">

                                        <h6 class="fw-medium mb-0 ">{{ __("generated.Evaluateur") }}</h6>

                                    </div>
                                </div>
                                <div class="card-body" style="padding-top: 4rem">


                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="row mb-3" style="padding-left: 10px">




                                                <div class="col-2" style="width: 9%;">
                                                    <div class="col-auto position-relative">
                                                        <figure
                                                            class="logo-evaluator-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                            style="background-size: 119px; line-height: 0 !important; margin-top: 2px !important;">
                                                            <img src="{{ asset('assets/img/icon/empty-logo2.png') }}"
                                                                class="client-evaluator-logo custom-file-input"
                                                                alt="" />
                                                        </figure>
                                                        <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                            style="top: 78% !important;left: 60%;">
                                                            <label
                                                                class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn"
                                                                style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;">


                                                                <i class="bi bi-camera"></i>
                                                                <input type="file"
                                                                    name="path_logo[0]"
                                                                    class="custom-file-input clientEvaluatorLogolightinput"
                                                                    accept="image/*" />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 col-md-6 col-lg-3"
                                                    style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="first_name[0]"
                                                                placeholder="{{ __("generated.Prénom") }}"
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.Prénom") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3"
                                                    style="width: 15%;margin-top: 26px;margin-right: -10px;">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="last_name[0]"
                                                                placeholder="{{ __("generated.Nom") }}"
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.Nom") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3"
                                                    style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="email[0]"
                                                                placeholder="{{ __("generated.Email") }}"
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.Email") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3"
                                                    style="width: 16%;margin-top: 26px;margin-right: -10px;">
                                                    <div class="form-group check-valid is-valid">

                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Poste") }}</label>
                                                        <select name="profession_id[]"
                                                            class="chosenoptgroup w-100 form-select border-start-0">
                                                            @foreach ($professions as $profession)
                                                                <option value="{{ __($profession->id) }}">
                                                                    {{ __($profession->label) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-2 types_evaluation_parent"
                                                    style="padding-right: 0;margin-top: 26px;width: 30%;">
                                                    <div class="types_evaluation_div">
                                                        <div class="row mb-3 type_evaluation_div">
                                                            <div class="col-12 "
                                                                style="width: 61%;margin-right: -10px;">

                                                                <div class="form-group check-valid is-valid">

                                                                <div
                                                                    class="custom-multiple-select rounded border">
                                                                    <div class="form-floating">
                                                                        <label >{{ __("generated.Type d'évaluation") }}</label>

                                                                        <select class="form-select border-0"
                                                                            name="evaluation_type_id[0][0]">
                                                                            @foreach ($types_evaluations as $type)
                                                                                <option value="{{ __($type->id) }}">
                                                                                    {{ __($type->name) }}</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <style>
                                                                    .no-search .chosen-search {
                                                                        display: none
                                                                    }
                                                                </style>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-2"
                                                                style="width: 28%;margin-right: -12px;">
                                                                <div
                                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                                    <div class="input-group input-group-lg">
                                                                        <div class="form-floating">
                                                                            <input type="number"
                                                                                name="coefficient[0][0]"
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

                                                            <div class="col-12 col-md-6 col-lg-2 add-type-evaluation"
                                                                style="width: 6%;margin-top: 16px;">
                                                                <i class="bi bi-plus-square"
                                                                    style="color: #005DC7;font-size: 25px;"></i>
                                                            </div>



                                                            <div class="col-12 col-md-6 col-lg-2 btn-type-evaluation-delete hidden"
                                                                style="width: 6%;margin-top: 16px;">

                                                                <i class="bi bi-trash text-red"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Supprimer type d'évaluation"
                                                                    style="font-size: 25px"></i>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5 mb-4" style="float: right;">
                                        <div class="col-auto" id="addEvaluatorBtn">
                                            <button class="btn btn-outline-theme mnw-100  "
                                                    type="button" style="float: right;font-size: 14px">{{ __("generated.Ajouter un évaluateur") }}</button>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-theme " id="btn-add-general-informations"
                                                    data-form-id="general-informations" type="submit">{{ __("generated.Enregistrer") }}</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>




    </form>

</div>
