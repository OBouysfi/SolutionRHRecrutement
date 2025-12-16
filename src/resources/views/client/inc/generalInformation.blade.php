<!-- title bar -->

<!-- content -->

<div class="tab-pane fade show active" id="general-info" role="tabpanel" aria-labelledby="general-info-tab">
    <div class="row">
        <div class="tab-content">
            <!-- personal info tab-->
            <div class="row justify-content-center">
                <div class="col-11">
                    <form action="#" method="post" id="addEditDataClient" enctype="multipart/form-data">
                        @csrf
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
                                            <div class="card-body" style="padding-top: 4rem">

                                                <div class="row justify-content-center mt-3">

                                                    <div class="col-2" style="width: 12%;">
                                                        <div class="col-auto position-relative">
                                                            <figure
                                                                class="logo-figure avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                style="background-image: url(&quot;assets/img/icon/empty-logo2.png&quot;);line-height: 0 !important;margin-top: 2px !important;background-repeat: no-repeat;background-size: 119px;">

                                                                <img src="{{ isset($client) ? asset('storage/' . $client->path_logo) : asset('assets/img/icon/empty-logo2.png') }}"
                                                                    class="client-logo custom-file-input"
                                                                    alt="" />
                                                            </figure>
                                                            <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto" style="top: 78% !important;right: 10%;">
                                                                <label class="btn btn-theme btn-44 shadow-sm rounded-circle"
                                                                    style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;"><i class="bi bi-camera"></i>
                                                                    <input type="file" name="path_logo"
                                                                        class="custom-file-input clientLogolightinput"
                                                                        id="clientLogolightinput" accept="image/*" />
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <div class="col-3">
                                                        <div class="row">
                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">

                                                                            <div class="form-floating">
                                                                                <input type="text" name="id"
                                                                                    placeholder="Numéro"
                                                                                    value="{{ isset($client) ? $client->id : $lastClientId }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0"
                                                                                    readonly>
                                                                                <label
                                                                                    >{{ __("generated.Numéro") }}</label>
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
                                                                                <input type="text" name="name"
                                                                                    placeholder="Dénomination"
                                                                                    value="{{ isset($client) ? $client->name : null }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Dénomination") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div class="form-group check-valid is-valid">

                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Forme juridique") }}</label>
                                                                        <select class="chosenoptgroup w-100"
                                                                                name="juridical_form">
                                                                            <option value=""
                                                                                    >{{ __("generated.Tous") }}</option>
                                                                            @foreach ($legalForms as $key => $legalForm)
                                                                                <option
                                                                                    value="{{ $key }}"
                                                                                    {{ isset($client) && $client->juridical_form == $key ? 'selected' : '' }}>
                                                                                    {{ __($legalForm) }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>



                                                            <div class="col-12 col-md-12">

                                                                <div class="form-group check-valid is-valid">

                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Forme juridique") }}</label>
                                                                        <select class="chosenoptgroup w-100"
                                                                                name="tax_regime">
                                                                            <option value="">{{ __("generated.Tous") }}</option>
                                                                            @foreach ($taxRegimes as $key => $taxRegime)
                                                                                <option
                                                                                    value="{{ $key }}"
                                                                                    {{ isset($client) && $client->tax_regime == $key ? 'selected' : '' }}>
                                                                                    {{ __($taxRegime) }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="row">


                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div class="form-group check-valid is-valid">

                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Secteur d’activité") }}</label>
                                                                        <select class="chosenoptgroup w-100"
                                                                                name="activity_area_id">
                                                                            <option value=""
                                                                                    >{{ __("generated.Tous") }}</option>
                                                                            @foreach ($activities as $activityArea)
                                                                                <option
                                                                                    value="{{ __($activityArea->id) }}"
                                                                                    {{ isset($client) && $client->activity_area_id == $activityArea->id ? 'selected' : '' }}>
                                                                                    {{ __($activityArea->label) }}
                                                                                </option>
                                                                            @endforeach
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
                                                                                    placeholder="Activité"
                                                                                    name="activity"
                                                                                    value="{{ isset($client) ? $client->activity : '' }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Activité") }}</label>
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
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Effectif"
                                                                                    name="workforce"
                                                                                    value="{{ isset($client) ? $client->workforce : '' }}"
                                                                                    required=""
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Effectif") }}</label>
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
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="date"
                                                                                    placeholder="{{ __("generated.Date de création") }}"
                                                                                    name="date_creation"
                                                                                    required=""
                                                                                    value="{{ isset($client) ? optional($client->date_creation)->format('Y-m-d') : '' }}"
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Date de création") }}</label>
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
                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input name="adresse" type="text"
                                                                                    placeholder="Adresse"
                                                                                    value="{{ isset($client) ? $client->adresse : '' }}"
                                                                                    required
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Adresse") }}</label>
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
                                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                        <div class="input-group input-group-lg">
                                                                            <div class="form-floating">
                                                                                <input type="text"
                                                                                    placeholder="Code postals"
                                                                                    value="{{ isset($client) ? $client->code_postal : '' }}"
                                                                                    required="" name="code_postal"
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Code postal") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div class="form-group check-valid is-valid">

                                                                    <div  class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Pays") }}</label>
                                                                        <select class="chosenoptgroup w-100" id="filter-pays"
                                                                                name="country_id">
                                                                            <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                            @if (isset($countries))
                                                                                @foreach ($countries as $country)
                                                                                    <option
                                                                                        value="{{ $country->id ?? '' }}"

                                                                                        {{ isset($client) && optional(optional($client->city)->region)->country_id == $country->id ? 'selected' : '' }}>
                                                                                        {{ __($country?->name) ?? '_' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>



                                                            <div class="col-12 col-md-12 mb-3">
                                                                <div class="form-group check-valid is-valid">

                                                                    <div id="city-selector" class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                         style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                        <label>{{ __("generated.Ville") }}</label>
                                                                        <select class="chosenoptgroup w-100" id="filter-ville"
                                                                                name="city_id">
                                                                            <option value="Tous">{{ __("generated.Tous") }}</option>

                                                                            @if (isset($cities) and isset($client))
                                                                                @foreach ($cities as $city)
                                                                                    <option value="{{ $city->id ?? '' }}"
                                                                                        {{ isset($client) && $client->city_id == $city->id ? 'selected' : '' }}>
                                                                                        {{ __($city?->name) ?? '_' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5 mb-4" style="float: right;margin-right: 11px">

                                                    <div class="col-auto">
                                                        <!-- submit button -->
                                                        <button class="btn btn-theme " id="btn-add-general-informations"
                                                                data-form-id="general-informations" type="submit">{{ __("generated.Suivant") }}</button>
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
