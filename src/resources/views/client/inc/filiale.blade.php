<div class="tab-pane fade show" id="filiales" role="tabpanel" aria-labelledby="tax-info-tab">
    <div class="d-flex mb-5 justify-content-end">
        <div class="col-1">
            <button type="button" class="btn squered-pill px-3" id="addClientFilialeBtn"><i
                    class="bi bi-plus-circle"></i></button>
        </div>
    </div>
    <form action="#" method="post" id="addClientFilialeData" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" id="client-id-filiale">

        @if (isset($clientFiliales))
            @foreach ($clientFiliales as $filiale)
                <div class="row mb-5 ">
                    <div class="tab-content py-3">


                        <div class="row justify-content-center mb-5 ">
                            <div class="col-11 " id="clientFilialeTabContent">
                                <div class="card border-0">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body ">
                                                        <div class="row mb-4">
                                                            <div class="col-10">
                                                                <h4 class="title custom-title ">{{ __("generated.Filiales") }}</h4>
                                                            </div>

                                                            <div class="col-2 delete_div_evaluator"
                                                                style="text-align: right;">
                                                                <button
                                                                    class="btn btn-outline-danger squered-pill px-3 btn-existed-filiale-card-delete translated_text"
                                                                    data-id="1" aria-label="Supprimer Filiale"
                                                                    data-filiale-id="{{ __($filiale->id) }}"><i
                                                                        class="bi bi-trash3"></i></button>

                                                            </div>

                                                        </div>
                                                        <div class="row justify-content-center mt-3">
                                                            <div class="col-2" style="width: 12%;">
                                                                <div class="col-auto position-relative">


                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="row">
                                                                    <input type="hidden" name="filiale_id[]"
                                                                        placeholder="Numéro" value="{{ __($filiale->id) }}"
                                                                        class="form-control border-start-0">

                                                                    <div class="col-12 col-md-12">
                                                                        <div>
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            name="name[]"
                                                                                            placeholder="Dénomination"
                                                                                            value="{{ isset($filiale->name) ? $filiale->name : '' }}"
                                                                                            class="form-control border-start-0">
                                                                                        <label
                                                                                            >{{ __("generated.Dénomination") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12 mb-3">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;padding: 2px;">
                                                                            <label >{{ __("generated.Forme juridique") }}</label>
                                                                            <select class="form-select border-0"
                                                                                name="juridical_form[]">
                                                                                <option value=""
                                                                                    >{{ __("generated.Tous") }}</option>
                                                                                @foreach ($legalForms as $key => $legalForm)
                                                                                    <option value="{{ $key }}"
                                                                                        {{ isset($filiale) && $filiale->juridical_form == $key ? 'selected' : '' }}>
                                                                                        {{ __($legalForm) }}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;padding: 1px;">
                                                                            <label >{{ __("generated.Régime fiscal") }}</label>
                                                                            <select class="form-select border-0"
                                                                                name="tax_regime[]">
                                                                                <option value=""
                                                                                    >{{ __("generated.Tous") }}</option>
                                                                                @foreach ($taxRegimes as $key => $taxRegime)
                                                                                    <option value="{{ $key }}"
                                                                                        {{ isset($filiale) && $filiale->tax_regime == $key ? 'selected' : '' }}>
                                                                                        {{ __($taxRegime) }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="row">
                                                                    <!-- <div class="col-12 col-md-12" style="margin-bottom: 18px !important;">
                                                                <div>
                                                                    <div class="rounded border poste-chosen" style="border-bottom: 1px solid #2e9c65 !important;border-radius: 8px !important;">
                                                                        <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Secteur d’activité</label>
                                                                        <select class="chosenoptgroup w-100" name="activity_area_id[]">
                                                                            <option value="">Tous</option>
                                                                            @foreach ($activities as $activityArea)
<option value="{{ __($activityArea->id) }}"
                                                                                {{ isset($filiale) && $filiale->activity_area_id == $activityArea->id ? 'selected' : '' }}>{{ __($activityArea->label) }}</option>
@endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                                    <div class="col-12 col-md-12">
                                                                        <div>
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Activité"
                                                                                            name="activity[]"
                                                                                            value="{{ __($filiale->activity) }}"
                                                                                            class="form-control border-start-0">
                                                                                        <label
                                                                                            >{{ __("generated.Activité") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12">
                                                                        <div>
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div
                                                                                    class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Effectif"
                                                                                            name="workforce[]"
                                                                                            value="{{ __($filiale->workforce) }}"
                                                                                            class="form-control border-start-0">
                                                                                        <label
                                                                                            >{{ __("generated.Effectif") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12">
                                                                        <div>
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div
                                                                                    class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            placeholder="Date de création"
                                                                                            name="date_creation[]"
                                                                                            value="24 février 2010"
                                                                                            class="form-control border-start-0">
                                                                                        <label
                                                                                            >{{ __("generated.Date de création") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
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
                                                                                <div
                                                                                    class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            name="adresse[]"
                                                                                            placeholder="Adresse"
                                                                                            value="{{ __($filiale->adresse) }}"
                                                                                            class="form-control border-start-0">
                                                                                        <label
                                                                                            >{{ __("generated.Adresse") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12">
                                                                        <div>
                                                                            <div
                                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div
                                                                                    class="input-group input-group-lg">
                                                                                    <div class="form-floating">
                                                                                        <input type="text"
                                                                                            name="code_postal[]"
                                                                                            placeholder="Code postals"
                                                                                            value="{{ __($filiale->code_postal) }}"
                                                                                            class="form-control border-start-0">
                                                                                        <label
                                                                                            >{{ __("generated.Code postal") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12">
                                                                        <div>
                                                                            <div
                                                                                class="custom-multiple-select form-group mb-3 position-relative check-valid is-valid">
                                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                                <div
                                                                                    class="input-group input-group-lg">
                                                                                    <div
                                                                                        class="custom-multiple-select form-floating">
                                                                                        <!-- <input type="text" placeholder="Ville" value="Casablanca" required="" class="form-control border-start-0"> -->
                                                                                        <select
                                                                                            class="form-select border-0"
                                                                                            name="city_id[]"
                                                                                            id="ville">
                                                                                            @foreach ($cities as $city)
                                                                                                <option
                                                                                                    value="{{ __($city->id) }}"
                                                                                                    {{ isset($filiale) && $filiale->city_id == $city->id ? 'selected' : '' }}>
                                                                                                    {{ __($city->name) }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <label
                                                                                            >{{ __("generated.Ville") }}</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 col-md-12 mb-3"
                                                                        style="margin-bottom: 30px;">
                                                                        <div>
                                                                            <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                                style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important; ">
                                                                                <label
                                                                                    >{{ __("generated.Pays") }}</label>
                                                                                <select class="chosenoptgroup w-100"
                                                                                    id="country"
                                                                                    name="country_id[]">
                                                                                    <option value="Tous"
                                                                                        >{{ __("generated.Tous") }}</option>
                                                                                    @if (isset($countries))
                                                                                        @foreach ($countries as $country)
                                                                                            <option
                                                                                                value="{{ $country->id ?? '' }}"
                                                                                                data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png"
                                                                                                {{ isset($filiale) && $filiale->city->country_id == $country->id ? 'selected' : '' }}>
                                                                                                {{ __($country?->name) ?? '_' }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
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
                </div>
            @endforeach
        @endif


        <div class="row mb-5 ">
            <div class="tab-content py-3"
                <div class="row justify-content-center mb-5 ">
                    <div class="col-11 " id="clientFilialeTabContent">
                        <div class="card border-0 div_create_filiale">
                            <div class="card-body" style="background-color: #e4e8ee54">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0">
                                            <div class="card-body ">
                                                <div class="row mb-4">
                                                    <div class="col-10">
                                                        <h4 class="title custom-title ">{{ __("generated.Filiales") }}</h4>
                                                    </div>
                                                    <div class="col-2 delete_div_filiale" style="text-align: right;">


                                                    </div>
                                                </div>
                                                <div class="row justify-content-center mt-3">
                                                    <div class="col-2" style="width: 12%;">
                                                        <div class="col-auto position-relative">

                                                            <figure
                                                                class="logo-filiale-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                                style="background-size: 119px;  line-height: 0 !important; margin-top: 2px !important; ">
                                                                <img src="{{ asset('assets/img/icon/photo-empty.png') }}"
                                                                    class="client-filiale-logo custom-file-input"
                                                                    alt="" />
                                                            </figure>
                                                            <div
                                                                class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                                <label
                                                                    class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                                    <i class="bi bi-camera"></i>
                                                                    <input type="file" name="path_logo"
                                                                        class="custom-file-input clientFilialeLogolightinput"
                                                                        accept="image/*" />
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
                                                                                <input type="text" name="name[]"
                                                                                    placeholder="Dénomination"
                                                                                    class="form-control border-start-0">
                                                                                <label
                                                                                    >{{ __("generated.Dénomination") }}</label>
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
                                                                            <div
                                                                                class="custom-multiple-select form-floating">
                                                                                <select class="form-select border-0"
                                                                                    name="juridical_form[]">
                                                                                    <option value=""
                                                                                        >{{ __("generated.Tous") }}</option>
                                                                                    @foreach ($legalForms as $key => $legalForm)
                                                                                        <option
                                                                                            value="{{ $key }}">
                                                                                            {{ __($legalForm) }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <label >{{ __("generated.Forme juridique") }}</label>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-12">
                                                                <div>
                                                                    <div
                                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                                        <div class="input-group input-group-lg">
                                                                            <div
                                                                                class="custom-multiple-select form-floating">

                                                                                <select class="form-select border-0"
                                                                                    name="tax_regime[]">
                                                                                    <option value=""
                                                                                        >{{ __("generated.Tous") }}</option>
                                                                                    @foreach ($taxRegimes as $key => $taxRegime)
                                                                                        <option
                                                                                            value="{{ $key }}">
                                                                                            {{ __($taxRegime) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label >{{ __("generated.Régime fiscal") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                                                <input type="text"
                                                                                    placeholder="Activité"
                                                                                    name="activity[]"
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
                                                                                    name="workforce[]"
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
                                                                                    placeholder="Date de création"
                                                                                    name="date_creation[]"
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
                                                                                <input type="text" name="adresse[]"
                                                                                    placeholder="Adresse"
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
                                                                                    name="code_postal[]"
                                                                                    placeholder="Code postals"
                                                                                    class="form-control border-start-0">
                                                                                <label >{{ __("generated.Code postal") }}</label>
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
                                                                            <div
                                                                                class="custom-multiple-select form-floating">
                                                                                <!-- <input type="text" placeholder="Ville" value="Casablanca" required="" class="form-control border-start-0"> -->
                                                                                <select class="form-select border-0"
                                                                                    name="city_id[]" id="ville">
                                                                                    @foreach ($cities as $city)
                                                                                        <option
                                                                                            value="{{ __($city->id) }}">
                                                                                            {{ __($city->name) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label
                                                                                    >{{ __("generated.Ville") }}</label>
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
                                                                            <div
                                                                                class="custom-multiple-select form-floating">
                                                                                <select class="form-select border-0"
                                                                                    id="country"
                                                                                    name="country_id[]">
                                                                                    @foreach ($countries as $country)
                                                                                        <option
                                                                                            value="{{ __($country->id) }}">
                                                                                            {{ __($country->name) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label
                                                                                    >{{ __("generated.Pays") }}</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-12 col-md-12 mb-3">
                                                                <div class="rounded border poste-chosen Flag_Country"
                                                                    style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important; ">
                                                                    <label
                                                                        style="margin-top: 8px; margin-left: 17px; color: #505050; font-size: 12px;">Pays</label>
                                                                    <select class="chosenoptgroup w-100"
                                                                        id="country" name="country_id[]">
                                                                        <option value="Tous">Tous</option>
                                                                        @if (isset($countries))
                                                                            @foreach ($countries as $country)
                                                                                <option
                                                                                    value="{{ $country->id ?? '' }}"
                                                                                    data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png">
                                                                                    {{ $country?->name ?? '_' }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="invalid-feedback mb-3">Add .com at last
                                                                    to insert valid data</div>
                                                            </div> --}}

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
                    <div class="row mt-5 mb-4 justify-content-end" style="float: right;margin-right: 11px">
                        <div class="col-auto">
                            <!-- submit button -->
                            <button class="btn btn-theme " id="btn-add-general-informations"
                                data-form-id="general-informations" type="submit">{{ __("generated.Suivant") }}</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
