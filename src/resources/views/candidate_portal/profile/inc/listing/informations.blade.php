<div class="col-12">
    <div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
        <div class="card-header bg-gradient-theme-light">
            <div class="row align-items-center">
                {{-- <div class="col-auto">
                    <i class="bi bi-mortarboard h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                </div> --}}
                <div class="col ps-0">
                    <h6 class="fw-medium mb-0 ">{{ __("generated.Informations personnelles") }}</h6>
                </div>
                <div class="col-auto">
                    <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('1')">
                        <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Modifier"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 p-0">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 p-0">
                        <!-- <div class="card-header bg-gradient-theme-light">
                            <div class="row align-items-center">
                                <h6 class="fw-medium mb-0 ">{{ __("generated.Informations personnelles") }}</h6>
                            </div>
                        </div> -->
                        <div class="card-body">
                            <div class="row" style="padding-left: 15px">
                                <div class="col-12">
                                    {{-- <h4 class="title custom-title mt-4 mb-5 ">{{ __("generated.Informations personnelles") }}</h4> --}}
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="row">
                                                <!-- Civilité -->
                                                <div class="col-12 col-md-2 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"><span
                                                                >{{ __("generated.Civilité") }}</span>
                                                            <span class="text-themeColor">*</span></label>
                                                        <select disabled class="chosenoptgroup w-100" id="civility"
                                                            name="civility" required>
                                                            <option value="1"
                                                                @if ($profile->civility == '1') selected @endif> M.</option>
                                                            <option @if ($profile->civility == '2') selected @endif
                                                                value="2" class="translated_text">Mme</option>
                                                            <option @if ($profile->civility == '3') selected @endif
                                                                value="3" class="translated_text">Mlle
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Prénom -->
                                                <div class="col-12 col-md-5 mb-2">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="first_name" name="first_name"
                                                                    value="{{ __($profile->first_name) }}"
                                                                    placeholder="Prénom" required>
                                                                <label for="first_name"><span
                                                                        >{{ __("generated.Prénom") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('first_name')
                                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                                    @enderror
                                                </div>
                                                <!-- Nom -->
                                                <div class="col-12 col-md-5 mb-2">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="last_name" name="last_name"
                                                                    value="{{ __($profile->last_name) }}" placeholder="Nom"
                                                                    required>
                                                                <label for="last_name"><span >{{ __("generated.Nom") }}</span><span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('last_name')
                                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Situation Familiale -->
                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"><span
                                                                >{{ __("generated.Situation familiale") }}</span><span
                                                                class="text-themeColor">*</span></label>
                                                        <select disabled class="chosenoptgroup w-100"
                                                            id="family_situation" name="family_situation">
                                                            @foreach (App\Enums\Profile\SituationEnum::getAll() as $key => $level)
                                                                <option value="{{ __($level) }}"
                                                                    @if ($profile->family_situation == $level) selected @endif>
                                                                    {{ __($level) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Date de naissance -->
                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="date"
                                                                    value="{{ $profile->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('Y-m-d') : '' }}"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="birth_date" name="birth_date" required>

                                                                <label for="birth_date"><span
                                                                        >{{ __("generated.Date de naissance") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('birth_date')
                                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Lieu de naissance -->
                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="birth_place" name="birth_place"
                                                                    value="{{ __($profile->birth_place) }}"
                                                                    placeholder="Lieu de naissance" required>
                                                                <label for="birth_place"><span
                                                                        >{{ __("generated.Lieu de naissance") }}</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('birth_place')
                                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Nationalité -->
                                                <div class="col-12 col-md-3 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        {{-- <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="nationality" name="nationality"
                                                                    value="{{ __($profile->nationality) }}"
                                                                    placeholder="Nationalité" required>
                                                                <label for="nationality">Nationalité</label>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;">{{ __("generated.Nationalité") }}
                                                            <span class="text-themeColor">*</span></label>
                                                        <select disabled class="chosenoptgroup w-100"
                                                            name="nationality" id="nationality">
                                                            <option value="Tous" >{{ __("generated.Tous") }}</option>
                                                            @if (isset($countries))
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country->id ?? '' }}"
                                                                        @if ($country->id == $profile->nationality) selected @endif
                                                                        data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png"
                                                                        data-country="{{ $country?->country_id ?? '' }}">
                                                                        {{ __($country->name ?? '_' )}}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('nationality')
                                                            <div class="invalid-feedback">{{ __($message) }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"> {{ __("generated.Source") }}
                                                            <span class="text-themeColor">*</span></label>
                                                        <select disabled class="chosenoptgroup w-100" name="source">
                                                            <option selected id="null-value2" >{{ __("generated.Source") }}</option>
                                                            @foreach (App\Enums\Profile\SourceProfileEnum::getAll() as $key => $source)
                                                                <option value="{{ __($source) }}"
                                                                    @if ($profile->source == $source) selected @endif>
                                                                    {{ __($source) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-6 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="address" name="address"
                                                                    value="{{ __($profile->address) }}"
                                                                    placeholder="Adresse" required>
                                                                <label for="address"
                                                                    >{{ __("generated.Adresse") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Code Postal -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="postal_code" name="postal_code"
                                                                    value="{{ __($profile->postal_code) }}"
                                                                    placeholder="Code postal" required>
                                                                <label for="postal_code" >{{ __("generated.Code postal") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('postal_code')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <!-- Pays -->
                                                <div class="col-12 col-md-4 mb-2">

                                                    <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"> {{ __("generated.Pays") }}
                                                            <span class="text-themeColor">*</span></label>
                                                        <select disabled class="chosenoptgroup w-100"
                                                            id="country-select" name="country_id">
                                                            <option value="Tous" >{{ __("generated.Tous") }}</option>
                                                            @if (isset($countries))
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country?->id ?? '' }}"
                                                                        @if ($profile->city?->country?->id === $country?->id) selected @endif
                                                                        data-country="{{ $country?->country_id ?? '' }}"
                                                                        data-image="https://flagcdn.com/16x12/{{ strtolower($country->code) }}.png">
                                                                        {{ $country?->name ?? '_' }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Ville -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label
                                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"><span
                                                                >{{ __("generated.Ville") }}</span>
                                                            <span class="text-themeColor">*</span></label>
                                                        <select disabled class="chosenoptgroup w-100" name="city_id"
                                                            id="filter-ville">
                                                            <option value="Tous">Tous</option>
                                                            @if (isset($cities))
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id ?? '' }}"
                                                                        @if ($profile->city_id === $city?->id) selected @endif
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
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="phone_primary" name="phone_primary"
                                                                    value="{{ __($profile->phone_primary) }}"
                                                                    placeholder="Téléphone 1" required>
                                                                <label for="phone_primary"><span
                                                                        >{{ __("generated.Téléphone 1") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('phone_primary')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- Téléphone 2 -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="text"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="phone_secondary" name="phone_secondary"
                                                                    value="{{ __($profile->phone_secondary) }}"
                                                                    placeholder="Téléphone 2">
                                                                <label for="phone_secondary"><span
                                                                        >{{ __("generated.Téléphone 2") }}</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('phone_secondary')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <!-- E-mail -->
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <div class="input-group input-group-lg">
                                                            <div class="form-floating">
                                                                <input readonly type="email"
                                                                    class="form-control border-start-0 translated_text"
                                                                    id="email" name="email"
                                                                    value="{{ __($profile->email) }}"
                                                                    placeholder="E-mail" required>
                                                                <label for="email"><span
                                                                        >{{ __("generated.E-mail") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <span class="input-group-text text-theme border-end-0"><i
                                                                    class="bi bi-facebook"></i></span>
                                                            <div class="form-floating">
                                                                <input readonly type="url" placeholder="Facebook"
                                                                    name="url_facebook"
                                                                    value="{{ __($profile->url_facebook) }}"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Facebook") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('facebook')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <span class="input-group-text text-theme border-end-0"><i
                                                                    class="bi bi-linkedin"></i></span>
                                                            <div class="form-floating">
                                                                <input readonly type="url" placeholder="Linkedin"
                                                                    name="url_linkedin"
                                                                    value="{{ __($profile->url_linkedin) }}"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Linkedin") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('linkedin')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-4 mb-2">
                                                    <div
                                                        class="form-group mb-3 position-relative check-valid is-valid">
                                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                        <div class="input-group input-group-lg">
                                                            <span class="input-group-text text-theme border-end-0"><i
                                                                    class="bi bi-twitter-x"></i></span>
                                                            <div class="form-floating">
                                                                <input readonly type="url" placeholder="Twitter-x"
                                                                    name="url_twitter"
                                                                    value="{{ __($profile->url_twitter) }}"
                                                                    class="form-control border-start-0 translated_text">
                                                                <label >{{ __("generated.Twitter-x") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('twitter')
                                                        <div class="invalid-feedback">{{ __($message) }}
                                                        </div>
                                                    @enderror
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
    <div class="row">
    <div class="col-12  mb-4">
        <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('1')">
            <button class="btn btn-theme " type="button"
                style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button></a>
    </div>
</div>

</div>
