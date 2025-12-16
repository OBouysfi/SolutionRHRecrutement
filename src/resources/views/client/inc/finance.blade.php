<div class="tab-pane fade show" id="tax-info" role="tabpanel" aria-labelledby="tax-info-tab">


    <div class="row mb-5 ">
        <div class="tab-content py-3">
            <!-- personal info tab-->
            <div class="row justify-content-center mb-5">
                <div class="col-11">
                    <form action="#" method="post" id="addClientFinanceData" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <input type="hidden" name="client_id" id="client-id-finance">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">

                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.identifiant fiscal") }}</h6>

                                                </div>
                                            </div>

                                            <div class="card-body" style="padding-top: 4rem">

                                                <div class="row justify-content-center mt-3">

                                                    <div class="col-3">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" name="rc"
                                                                                    placeholder="Registre du Commerce"
                                                                                    value="{{ isset($clientFinance) ? $clientFinance->rc : ' ' }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Registre du Commerce") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" name="ice_siret"
                                                                                    placeholder="{{ __("generated.ICE") }}"
                                                                                    value="{{ isset($clientFinance) ? $clientFinance->ice_siret : '' }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.ICE") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="row">

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div class="form-group check-valid is-valid">

                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Pays") }}</label>
                                                                        <select class="chosenoptgroup w-100"
                                                                                id="filter-pays-finance"
                                                                                name="country_id">
                                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                            @if (isset($countries) && isset($clientFinance))
                                                                                @foreach ($countries as $country)
                                                                                    <option
                                                                                        value="{{ $country->id ?? '' }}"
                                                                                        {{ isset($clientFinance) && optional(optional($clientFinance->city)->region)->country_id == $country->id ? 'selected' : '' }}
                                                                                    >
                                                                                        {{ __($country?->name) ?? '_' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach ($countries as $country)
                                                                                    <option
                                                                                        value="{{ $country->id ?? '' }}"
                                                                                    >
                                                                                        {{ __($country?->name) ?? '_' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>





                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    name="unique_identifier"
                                                                                    placeholder="{{ __("generated.identifiant Fiscal") }}"
                                                                                    value="{{ isset($clientFinance) ? $clientFinance->unique_identifier : '' }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.identifiant Fiscal") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
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
                                                    <div class="col-3">
                                                        <div class="row">



                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div class="form-group check-valid is-valid">

                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Ville") }}</label>
                                                                        <select class="chosenoptgroup w-100"
                                                                                id="filter-ville-finance"
                                                                                name="city_id">
                                                                            <option value="Tous">{{ __("generated.Tous") }}</option>

                                                                            @if (isset($cities) && isset($clientFinance))
                                                                                @foreach ($cities as $city)
                                                                                    <option
                                                                                        value="{{ $city->id ?? '' }}"
                                                                                        @selected(isset($clientFinance) && optional($clientFinance)->city_id == $city->id)>
                                                                                        {{ __($city?->name) ?? '_' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>


                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text" name="taxe"
                                                                                    placeholder="Taxe Professionnelle"
                                                                                    value="{{ isset($clientFinance) ? $clientFinance->taxe : ' ' }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0 translated_text">
                                                                                <label >{{ __("generated.Taxe Professionnelle") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5 mb-4" style="float: right;margin-right: 11px">
                                                    <div class="col-auto">
                                                        <button class="btn btn-theme " id="btn-add-tax-regime"
                                                                data-form-id="tax-regime-form" type="submit">{{ __("generated.Suivant") }}</button>
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
            </div>
        </div>
    </div>
</div>
