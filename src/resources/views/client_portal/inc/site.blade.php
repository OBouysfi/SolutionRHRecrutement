<div class="tab-pane fade show" id="sites" role="tabpanel">


    {{-- <form action="#" method="post" id="addClientSiteData" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" id="client-id-site"> --}}

        <!-- existed sites -->
        @if (isset($clientSites))
            @foreach ($clientSites as $site)
                <div class="row">
                    <div class="tab-content">
                        <input type="hidden" name="site_id[]" value="{{ __($site->id) }}">

                        <div class="row justify-content-center mb-4">
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
                                                    <div class="card-body">
                                                        <div class="row justify-content-center mt-3">
                                                            <!-- Site Name -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating">
                                                                        <input disabled type="text" name="site_name[]"
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
                                                                    <div class="form-floating">
                                                                        <input disabled type="text" name="phone[]"
                                                                            value="{{ __($site->phone) }}"
                                                                            placeholder="Téléphone"
                                                                            class="form-control translated_text">
                                                                        <label >{{ __("generated.Téléphone") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Responsable Name -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating">
                                                                        <input disabled type="text" name="responsable_name[]"
                                                                            value="{{ __($site->responsable_name) }}"
                                                                            placeholder="Responsable du Site"
                                                                            class="form-control translated_text">
                                                                        <label >{{ __("generated.Responsable du Site") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Pays -->


                                                            <!-- Email -->
                                                            <div class="col-3">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating">
                                                                        <input disabled type="email" name="email[]"
                                                                            value="{{ __($site->email) }}"
                                                                            placeholder="Email"
                                                                            class="form-control translated_text">
                                                                        <label >{{ __("generated.Email") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center mt-3">
                                                            <!-- Address -->
                                                            <div class="col-6">
                                                                <div class="form-group mb-3">
                                                                    <div class="form-floating">
                                                                        <input disabled type="text" name="address[]"
                                                                            value="{{ __($site->address) }}"
                                                                            placeholder="Adresse"
                                                                            class="form-control translated_text">
                                                                        <label >{{ __("generated.Adresse") }}</label>
                                                                    </div>
                                                                </div>


                                                            </div>


                                                            <div class="col-3">
                                                                <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                    style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                    <label >{{ __("generated.Ville") }}</label>
                                                                    <select disabled class="chosenoptgroup w-100"
                                                                        name="city_id[]">
                                                                        <option value="Tous" >{{ __("generated.Tous") }}</option>
                                                                        @if (isset($cities))
                                                                            @foreach ($cities as $city)
                                                                                <option value="{{ $city->id ?? '' }}"
                                                                                    {{ isset($site) && $site->city_id == $city->id ? 'selected' : '' }}>
                                                                                    {{ $city?->name ?? '_' }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
                                                            </div>

                                                            <!-- Pays -->


                                                            <div class="col-3">
                                                                <div>
                                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                        style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                                                        <label >{{ __("generated.Pays") }}</label>
                                                                        <select disabled class="chosenoptgroup w-100"
                                                                            id="country-select" name="country_id[]">
                                                                            <option value="Tous"
                                                                                >{{ __("generated.Tous") }}</option>
                                                                            @if (isset($countries))
                                                                                @foreach ($countries as $country)
                                                                                    <option
                                                                                        value="{{ $country->id ?? '' }}"
                                                                                        data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png"
                                                                                        {{ isset($site) && optional(optional($site->city)->region)->country_id == $country->id ? 'selected' : '' }}>
                                                                                        {{ $country?->name ?? '_' }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add .com at last to insert valid data") }}</div>
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
</div>
