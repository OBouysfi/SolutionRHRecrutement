<div class="row justify-content-center">
    <div class="col-12 mb-3">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">
                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Diplômes") }}</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="container">
                                    <h4 class="title custom-title  mt-4 ">{{ __("generated.Diplômes") }}</h4>
                                </div> --}}
                                <div id="formations-container">
                                </div>
                                <form id="profile-form-formations" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}" hidden
                                        readonly>
                                    <div class="row" style="padding-left: 28px">
                                        <div class="row justify-content-center mt-5">
                                            <div class="col-12 mb-3" style="width: 150px;">
                                                <div class="col-auto position-relative">
                                                    <figure
                                                        class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                        style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                        <img src="{{ asset('assets/img/icon/empty-logo.png') }}"
                                                            alt="" style="display: none;">
                                                    </figure>
                                                    <div
                                                        class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                        <label
                                                            class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                            <i class="bi bi-camera"></i>
                                                            <input type="file" name="logo"
                                                                class="custom-file-input formation-logo"
                                                                id="formation-logo" accept="image/*" />
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-10">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 custom-mrg">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder="{{ __("generated.Institution") }}" required
                                                                    name="name"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label><span >{{ __("generated.Institution") }}</span><span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                        @error('name')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Pays") }}</label>
                                                            <select class="chosenoptgroup w-100" name="country_id"
                                                                id="country-select">
                                                                <option>{{ __("generated.Choisir un pays") }}</option>
                                                                @if (isset($countries))
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ __($country->id) }}"
                                                                            {{-- data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png" --}}>
                                                                            {{ __($country->name) }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Ville") }}</label>
                                                            <select class="chosenoptgroup w-100" name="city_id"
                                                                id="filter-ville">
                                                                 <option>{{ __("generated.Choisir une ville") }}</option>
                                                                @if (isset($cities))
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id ?? '' }}"
                                                                            data-country="{{ $city->country?->id ?? '' }}">
                                                                            {{ __($city->name ?? '_' )}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                        <div
                                                            class="form-group mb-2 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="text" placeholder="{{ __("generated.Adresse") }}"
                                                                    name="address" value="" required
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Adresse") }}</label>
                                                            </div>
                                                        </div>
                                                        @error('address')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <div
                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text" placeholder="{{ __("generated.Téléphone 1") }}"
                                                                        value="" required="" name="phone"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Téléphone 1") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('phone')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-3 mb-2">
                                                        <div class="form-group position-relative check-valid is-valid">
                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="text" placeholder="{{ __("generated.Téléphone 2") }}"
                                                                        value="" required=""
                                                                        name="secondary_phone"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Téléphone 2") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('secondary_phone')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div
                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                            <div class="input-group input-group-lg">
                                                                <div class="form-floating">
                                                                    <input type="email" placeholder="{{ __("generated.E-mail") }}"
                                                                        name="email" value="" required=""
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.E-mail") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Niveau") }}</label>
                                                            <select class="chosenoptgroup w-100" id="click2e3"
                                                                name="level_id" style="padding-top: 9px;">
                                                                <option>{{ __("generated.Choisir un niveau") }}</option>
                                                                @if (isset($levels))
                                                                    @foreach ($levels as $level)
                                                                        <option value="{{ $level->id ?? '' }}">
                                                                            {{ __($level->label ?? '_') }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2  custom-mrg">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label class="translated_text">Diplôme
                                                                <span class="text-themeColor">*</span></label>
                                                            <select class="chosenoptgroup w-100" name="diploma_id">
                                                                <option>{{ __("generated.Choisir un diplôme") }}</option>
                                                                @if (isset($diplomas))
                                                                    @foreach ($diplomas as $diploma)
                                                                        <option value="{{ $diploma->id ?? '' }}">
                                                                            {{ __($diploma->label ?? '_' )}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Option") }} <span
                                                                        class="text-themeColor">*</span></label>
                                                            <select class="chosenoptgroup w-100" name="option_id">
                                                                <option>{{ __("generated.Choisir une option") }}</option>
                                                                @if (isset($diplomaOptions))
                                                                    @foreach ($diplomaOptions as $option)
                                                                        <option value="{{ $option->id ?? '' }}">
                                                                            {{ __($option->label ?? '_' )}}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label >{{ __("generated.Mention") }}</label>
                                                            <select class="chosenoptgroup w-100" name="mention">
                                                                <option selected id="null-value2">{{ __("generated.Choisir une mention") }}</option>
                                                                @foreach (App\Enums\Profile\MentionEnum::getAll() as $key => $mention)
                                                                    <option value="{{ __($mention) }}">
                                                                        {{ __($mention) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label class="hidden hidlab">Mention</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-3 mb-2">
                                                        <div
                                                            class="form-group mb-3 position-relative is-valid check-valid">
                                                            <div class="form-floating">
                                                                <input type="date" placeholder="{{ __("generated.Date") }}"
                                                                    value="" required name="date"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label class="translated_text">Date <span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                        @error('date')
                                                            <div class="invalid-feedback translated_text">
                                                                {{ __($message) }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-4 mb-4 d-flex justify-content-end gap-2">
                 
                                                        <button class="btn btn-danger mb-2 mx-2 " type="button"
                                                        style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                    <button class="btn btn-theme btn-ajouter mb-2 " type="button"
                                                                         onclick="saveForm('formations', 1)"
                                                        data-form-id="profile-form-formations"
                                                    style="font-size: 12px;float: right;margin-right: 10px;">{{ __("generated.Ajouter") }}</button>
                                                  
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
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12 mb-3">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">
                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Certifications") }}</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="row" style="padding-left: 28px">
                                    <h4 class="title custom-title  mt-4 ">{{ __("generated.Certifications") }}</h4>
                                </div> --}}
                                <div id="certifications-container">
                                </div>
                                <form method="POST" id="profile-form-certifications">
                                    @csrf
                                    <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}" hidden
                                        readonly>
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-12 mb-3" style="width: 150px;">
                                            <div class="col-auto position-relative">
                                                <figure
                                                    class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                    style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                    <img src="{{ asset('assets/img/icon/empty-logo.png') }}"
                                                        alt="" style="display: none;">
                                                </figure>
                                                <div
                                                    class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                                    <label
                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                        <i class="bi bi-camera"></i>
                                                        <input type="file" name="logo"
                                                            class="custom-file-input certification-logo"
                                                            id="certification-logo" accept="image/*" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="row">
                                                <!-- Organisme -->
                                                <div class="col-12 col-md-8 col-lg-9 mb-2 custom-mrg">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="organisme"
                                                                placeholder="{{ __("generated.Organisme") }}" required
                                                                class="form-control border-start-0 translated_text">
                                                            <label>{{ __("generated.Organisme") }} <span
                                                                    class="text-themeColor">*</span></label>
                                                        </div>
                                                    </div>
                                                    @error('organisme')
                                                        <div class="invalid-feedback mb-3 translated_text">
                                                            {{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <!-- N° d'accréditation -->
                                                <div class="col-12 col-md-4 col-lg-3 mb-2 custom-mrg">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="numero_accreditation"
                                                                placeholder="{{ __("generated.N° d'accréditation") }}" required
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.N° d'accréditation") }}</label>
                                                        </div>
                                                    </div>
                                                    @error('numero_accreditation')
                                                        <div class="invalid-feedback translated_text">
                                                            {{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Adresse -->
                                                <div class="col-12 col-md-6 mb-2 custom-mrg">
                                                    <div
                                                        class="form-group mb-3 position-relative is-valid check-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="adresse"
                                                                placeholder="{{ __("generated.Adresse") }}" required
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.Adresse") }}</label>
                                                        </div>
                                                    </div>
                                                    @error('adresse')
                                                        <div class="invalid-feedback translated_text">
                                                            {{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-6 col-md-3 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Pays") }}</label>
                                                        <select class="chosenoptgroup w-100" name="country_id"
                                                            id="country-select">
                                                            <option>{{ __("generated.Choisir un pays") }}</option>
                                                            @if (isset($countries))
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ __($country->id) }}"
                                                                        {{-- data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png" --}}>
                                                                        {{ __($country->name) }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-md-3 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label >{{ __("generated.Ville") }}</label>
                                                        <select class="chosenoptgroup w-100" name="city_id"
                                                            id="filter-ville">
                                                            <option>{{ __("generated.Choisir une ville") }}</option>
                                                            @if (isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id ?? '' }}"
                                                                        data-country="{{ $city->country?->id ?? '' }}">
                                                                        {{ __($city->name ?? '_' )}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <!-- Téléphone 1 -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="telephone_1"
                                                                placeholder="{{ __("generated.Téléphone 1") }}" required
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.Téléphone 1") }}</label>
                                                        </div>
                                                    </div>
                                                    @error('telephone_1')
                                                        <div class="invalid-feedback translated_text">
                                                            {{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Téléphone 2 -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="form-floating">
                                                            <input type="text" name="telephone_2"
                                                                placeholder="{{ __("generated.Téléphone 2") }}" required
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.Téléphone 2") }}</label>
                                                        </div>
                                                    </div>
                                                    @error('telephone_2')
                                                        <div class="invalid-feedback translated_text">
                                                            {{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <!-- E-mail -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="form-floating">
                                                            <input type="email" name="email" placeholder="{{ __("generated.E-mail") }}"
                                                                required
                                                                class="form-control border-start-0 translated_text">
                                                            <label >{{ __("generated.E-mail") }}</label>
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <div class="invalid-feedback translated_text">
                                                            {{ __($message) }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-4 justify-content-center">
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="nom_certification"
                                                                        placeholder="{{ __("generated.Nom de la certification") }}"
                                                                        value="" required
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Nom de la certification") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label>
                                                                    <span >{{ __("generated.Critères d'évaluation") }}</span>
                                                                    <span class="text-themeColor">*</span></label>
                                                                <select class="form-select border-0" id="eval1"
                                                                    name="criteres_evaluation"
                                                                    style="padding-top: 9px;">
                                                                    <option selected value="0"
                                                                         id="null-value">{{ __("generated.Choisir des critères d'évaluation") }}</option>
                                                                    @foreach (App\Enums\Profile\EvaluationTypeEnum::getAll() as $key => $criteria)
                                                                        <option value="{{ $key }}">
                                                                            {{ __($criteria) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback mb-3 ">{{ __("generated.Add valid data") }}</div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="theme_certification"
                                                                        placeholder="{{ __("generated.Sujet ou thème de la certification") }}"
                                                                        value="" required
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Sujet ou thème de la certification") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="score_resultat"
                                                                        placeholder="{{ __("generated.Score ou résultats obtenus") }}"
                                                                        value="" required
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Score ou résultats obtenus") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label><span >{{ __("generated.Niveau de certification") }}</span>
                                                                    <span class="text-themeColor">*</span></label>
                                                                <div class="form-floating">
                                                                    <select
                                                                        class="form-select border-0 chosenoptgroup w-100"
                                                                        name="niveau_certification" id="country1"
                                                                        style="padding-top: 9px;">
                                                                        <option>{{ __("generated.Choisir le niveau de certification") }}</option>
                                                                        @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                                            <option value="{{ $key }}">
                                                                                {{ __($level) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="date" name="date_obtention"
                                                                        placeholder="{{ __("generated.Date d'obtention") }}" value=""
                                                                        required
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Date d'obtention") }} <span
                                                                        class="text-themeColor">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="volume_horaire"
                                                                        placeholder="{{ __("generated.Durée ou volume horaire") }}"
                                                                        value="" required
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Durée ou volume horaire") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-5">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-12 custom-mrg">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="date"
                                                                        placeholder="{{ __("generated.Date d'expiration") }}" value=""
                                                                        name="date_expiration" required
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label >{{ __("generated.Date d'expiration") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-4 mb-4 d-flex justify-content-end gap-2">
                                                    

                                                    <button class="btn btn-danger mb-2 mx-2 " type="button"
                                                    style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                <button class="btn btn-theme btn-ajouter mb-2 " type="button"
                                                    onclick="saveForm('certifications', 1)"
                                                    data-form-id="profile-form-certifications"
                                                style="font-size: 12px;float: right;margin-right: 10px;">{{ __("generated.Ajouter") }}</button>
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
        </div>
    </div>
</div>
<style>
    .col-12.col-md-6.col-lg-2.custom-mrg {
        margin-right: -16px;
    }
</style>
<div class="row mt-3 mb-4 mx-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" onclick="switchToNextTab(2)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
