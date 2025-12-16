<div class="tab-pane fade show" id="sites" role="tabpanel">


    <form action="#" method="post" id="addClientSiteData" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" id="client-id-site">

        <!-- existed sites -->
        @if (isset($clientSites))
            @foreach ($clientSites as $site)
                <div class="row mb-5 ">
                    <div class="tab-content py-3">
                        <input type="hidden" name="site_id[]" value="{{ __($site->id) }}">

                        <div class="row justify-content-center mb-5">
                            <div class="col-11">
                                <div class="card border-0 div_create_site_existed">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-header bg-gradient-theme-light">
                                                        <div class="row align-items-center">

                                                            <h6 class="fw-medium mb-0 ">{{ __("generated.Site") }}</h6>

                                                        </div>
                                                    </div>

                                                    <div class="card-body" style="padding-top: 4rem">

                                                        <div class="row justify-content-center mt-3">
                                                            <!-- Site Name -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                        <input type="text" name="site_name[]"
                                                                               value="{{ __($site->site_name) }}"
                                                                               placeholder="Nom du site"
                                                                               class="form-control translated_text">
                                                                        <label >{{ __("generated.Nom du site") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Phone -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                        <input type="text" name="phone[]"
                                                                               value="{{ __($site->phone) }}"
                                                                               placeholder="Téléphone"
                                                                               class="form-control translated_text">
                                                                        <label
                                                                            >{{ __("generated.Téléphone") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Responsable Name -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                        <input type="text"
                                                                               name="responsable_name[]"
                                                                               value="{{ __($site->responsable_name) }}"
                                                                               placeholder="Responsable du Site"
                                                                               class="form-control translated_text">
                                                                        <label
                                                                            >{{ __("generated.Responsable du Site") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Pays -->


                                                            <!-- Email -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                        <input type="email"
                                                                               name="email[]"
                                                                               value="{{ __($site->email) }}"
                                                                               placeholder="Email"
                                                                               class="form-control translated_text">
                                                                        <label
                                                                            >{{ __("generated.Email") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div
                                                                class="row justify-content-center mt-3">
                                                                <!-- Address -->
                                                                <div class="col-6">
                                                                    <div
                                                                        class="form-group mb-3">
                                                                        <div
                                                                            class="form-floating" style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                            <input
                                                                                type="text"
                                                                                name="address[]"
                                                                                value="{{ __($site->address) }}"
                                                                                placeholder="Adresse"
                                                                                class="form-control translated_text">
                                                                            <label
                                                                                >{{ __("generated.Adresse") }}</label>
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <!-- Pays -->


                                                                <div class="col-3">
                                                                    <div class="form-group check-valid is-valid" style="height: 60px;">
                                                                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                             style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                            <label
                                                                            >{{ __("generated.Pays") }}</label>
                                                                            <select
                                                                                class="chosenoptgroup w-100 filter-pays-site"
                                                                                id="country-select"
                                                                                name="country_id[]">
                                                                                <option
                                                                                    value="Tous"
                                                                                >{{ __("generated.Tous") }}</option>
                                                                                @if (isset($countries))
                                                                                    @foreach ($countries as $country)
                                                                                        <option
                                                                                            value="{{ $country->id ?? '' }}"
                                                                                            {{ isset($site) && optional(optional($site->city)->region)->country_id == $country->id ? 'selected' : '' }}>
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


                                                                        <div class="col-3">
                                                                            <div class="form-group check-valid is-valid" style="height: 60px;">

                                                                                <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                                     style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                                    <label>{{ __("generated.Ville") }}</label>
                                                                                    <select class="chosenoptgroup w-100 filter-ville-site"
                                                                                            name="city_id[]">
                                                                                        <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                                        @if (isset($cities))
                                                                                            @foreach ($cities as $city)
                                                                                                <option
                                                                                                    value="{{ $city->id ?? '' }}"
                                                                                                    {{ isset($site) && $site->city_id == $city->id ? 'selected' : '' }}>

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

                                                        <div
                                                            class="row mt-2 mb-4 justify-content-end"
                                                            style="float: right; margin-right: 5px">
                                                            <div
                                                                class="col-2 delete_div_site">
                                                                <button
                                                                    class="btn btn-danger mnw-100 btn-existed-site-card-delete "
                                                                    data-site-id="{{ __($site->id) }}" type="button" style="font-size: 12px;float: right;width: 100px"> {{ __("generated.Supprimer") }}</button>
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
    <div class="tab-content">


        <div class="row justify-content-center">
            <div class="col-11">
                <div id="clientSiteTabContent">
                    <div class="card border-0 div_create_site mb-1">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-header bg-gradient-theme-light">
                                            <div class="row align-items-center">

                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Site") }}</h6>

                                            </div>
                                        </div>
                                        <div class="card-body" style="padding-top: 4rem">

                                            <div class="row justify-content-center mt-3">
                                                <!-- Site Name -->
                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <div class="form-floating"
                                                             style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <input type="text" name="site_name[]"
                                                                   placeholder="{{ __("generated.Nom du site") }}"
                                                                   class="form-control translated_text">
                                                            <label >{{ __("generated.Nom du site") }}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Phone -->
                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <div class="form-floating"
                                                             style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <input type="text" name="phone[]"
                                                                   placeholder="{{ __("generated.Téléphone") }}"
                                                                   class="form-control translated_text">
                                                            <label
                                                                >{{ __("generated.Téléphone") }}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Responsable Name -->
                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <div class="form-floating"
                                                             style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <input type="text"
                                                                   name="responsable_name[]"
                                                                   placeholder="{{ __("generated.Responsable du Site") }}"
                                                                   class="form-control translated_text">
                                                            <label >{{ __("generated.Responsable du Site") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Email -->
                                                <div class="col-3">
                                                    <div class="form-group mb-3">
                                                        <div class="form-floating"
                                                             style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <input type="email" name="email[]"
                                                                   placeholder="{{ __("generated.Email") }}"
                                                                   class="form-control translated_text">
                                                            <label
                                                                >{{ __("generated.Email") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center mt-3">
                                                <!-- Address -->
                                                <div class="col-6">
                                                    <div class="form-group mb-3">
                                                        <div class="form-floating"
                                                             style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <input type="text" name="address[]"
                                                                   placeholder="{{ __("generated.Adresse") }}"
                                                                   class="form-control translated_text">
                                                            <label
                                                                >{{ __("generated.Adresse") }}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-group check-valid is-valid" >

                                                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                             style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                            <label>{{ __("generated.Pays") }}</label>
                                                            <select class="chosenoptgroup w-100 filter-pays-site"
                                                                    name="country_id[]">
                                                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                @if (isset($countries))
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


                                                <!-- City -->
                                                <div class="col-3">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 mb-3">
                                                            <div class="form-group check-valid is-valid" >

                                                                <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                     style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important">
                                                                    <label>{{ __("generated.Ville") }}</label>
                                                                    <select class="chosenoptgroup w-100 filter-ville-site"
                                                                            name="city_id[]">
                                                                        <option value="Tous">{{ __("generated.Tous") }}</option>
                                                                        @if (isset($cities))
                                                                            @foreach ($cities as $city)
                                                                                <option
                                                                                    value="{{ $city->id ?? '' }}">
                                                                                    {{ $city?->name ?? '_' }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
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

                                            <div class="row mt-5 mb-3 justify-content-end" style="float: right">
                                                <div class="col-auto" id="addClientSiteBtn">
                                                    <button
                                                        class="btn  btn-outline-theme mnw-100  add-type-evaluation "
                                                        type="button"
                                                        style="float: right;font-size: 14px">{{ __("generated.Ajouter un site") }}</button>
                                                </div>

                                                <div class="col-auto">
                                                    <button class="btn btn-theme " type="submit">{{ __("generated.Suivant") }}</button>
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
</form>


</div>
