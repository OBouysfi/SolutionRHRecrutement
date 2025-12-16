<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card border-0 p-0">
                            <div class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">
                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Poste") }}</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4 justify-content-center">
                                    {{-- <h4 class="title custom-title  mb-5" style="margin-left: 15px;width: 98%">Poste</h4> --}}
                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;">
                                                <span >{{ __("generated.Intitulé du poste") }}</span>
                                                <span class="text-themeColor">*</span></label>
                                            <select class="chosenoptgroup w-100" name="desired_profession_id"
                                                id="professiont-select">
                                                 <option>{{ __("generated.Choisir un intitulé de poste") }}</option>
                                                @if (isset($posts))
                                                    @foreach ($posts as $post)
                                                        <option value="{{ __($post->id) }}"
                                                            @if ($post->id == $profile->profession_id) selected @endif>
                                                            {{ __($post->label) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Type de contrat") }}</span><span class="text-themeColor">*</span></label>
                                            <select class="chosenoptgroup w-100" name="contract_type" id="contract">
                                                <option>{{ __("generated.Choisir un type de contrat") }}</option>
                                                @if (isset($contractsTypes))
                                                    @foreach ($contractsTypes as $key => $contract)
                                                        <option value="{{ $key ?? '' }}"
                                                            @if ($profile->contract_type == $key) selected @endif>
                                                            {{ $contract ?? '_' }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important; border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;">
                                                <span >{{ __("generated.Catégorie Socio Professionnelle") }}</span></label>
                                            <select class="chosenoptgroup w-100" id="permis"
                                                name="categorie_socio_professionnelle">
                                                 <option> {{ __("generated.Choisir une catégorie") }}</option>
                                                @foreach (App\Enums\Profile\CategorySocioProEnum::getAll() as $key => $category)
                                                    <option value="{{ __($category) }}"
                                                        @if ($profile->categorie_socio_professionnelle == $category) selected @endif>
                                                        {{ __($category) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Taille de l'entreprise") }}</span></label>
                                            <select class="chosenoptgroup w-100" id="permis" name="company_size">
                                                <option>{{ __("generated.Choisir une taille d’entreprise") }}</option>
                                                @foreach (App\Enums\Profile\CompanySizeEnum::getAll() as $key => $companySize)
                                                    <option value="{{ __($companySize) }}"
                                                        @if ($profile->company_size == $companySize) selected @endif>
                                                        {{ __($companySize) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control border-start-0 custom-number-input"
                                                        id="min_expected_salary" name="min_expected_salary"
                                                        step="0.01" value="{{ __($profile->min_expected_salary) }}"
                                                        style="height: 55px;">
                                                    <label for="min_expected_salary"> <span
                                                            >{{ __("generated.Prétentions salariales minimal") }}</span><span class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('min_expected_salary')
                                            <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control border-start-0 custom-number-input"
                                                        style="height: 55px;" id="max_expected_salary" step="0.01"
                                                        name="max_expected_salary"
                                                        value="{{ __($profile->max_expected_salary) }}">
                                                    <label for="max_expected_salary"><span
                                                            >{{ __("generated.Prétentions salariales maximal") }}</span><span class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('max_expected_salary')
                                            <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Secteur d'activité") }}</span></label>
                                            <select class="chosenoptgroup w-100" name="activity_area_id"
                                                id="activity_area-select">
                                                 <option >{{ __("generated.Choisir un secteur d'activité") }}</option>
                                                @if (isset($activityArea))
                                                    @foreach ($activityArea as $sector)
                                                        <option value="{{ __($sector->id) }}"
                                                            @if ($sector->id == $profile->activity_area_id) selected @endif>
                                                            {{ __($sector->label) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
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
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card border-0 p-0">
            <div class="card-header bg-gradient-theme-light">
                <div class="row align-items-center">
                    <h6 class="fw-medium mb-0 ">{{ __("generated.Mobilité") }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                {{-- <div class="row justify-content-center">
                                    <h4 class="title custom-title mb-5 "
                                        style="width: 98%; margin-left: 20px;">{{ __("generated.Mobilité") }}</h4>
                                </div> --}}
                                <div class="row justify-content-center">
                                    {{-- <div class="col-lg-1"></div> --}}
                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div
                                                    class="form-group mb-3 mt-4 position-relative check-valid is-valid" style="box-shadow: none !important">
                                                    <div class="input-group input-group-lg input-group-label"
                                                        style="padding: 10px 26px; min-width: 210px;">
                                                        <label >{{ __("generated.Mobilité géographique") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">

                                                <div class="row">
                                                    <div class="col-7"></div>
                                                    <div class="col" style="margin-bottom: 10px; font-size: 12px;">
                                                        <span style="margin-right: 23px;"
                                                            >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                </div>
                                                @foreach (['local' => 'Locale', 'regional' => 'Régionale', 'national' => 'Nationale', 'international' => 'Internationale'] as $key => $label)
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch"
                                                                    name="mobility[{{ $key }}][is_active]"
                                                                    {{ $mobility[$key]['is_active'] ?? false ? 'checked' : '' }}>
                                                                <label class="form-check-label translated_text"
                                                                    for="{{ $key }}">{{ __("generated.".$label) }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col" style="margin-top: -4px;">
                                                            <div class="form-group mb-3 position-relative check-valid"
                                                                style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                                <div class="input-group input-group-lg"
                                                                    style="width: 55px;">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            name="mobility[{{ $key }}][weight]"
                                                                            value="{{ $mobility[$key]['weight'] ?? '' }}"
                                                                            required
                                                                            class="form-control border-start-0 text-center"
                                                                            style="padding-top: 9px; height: 30px; font-size: 13px; width: 40px; padding-right: 4px;">
                                                                    </div>
                                                                    <span
                                                                        class="input-group-text
                                                                            text-theme border-end-0"
                                                                        style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 6px; z-index: 1;">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1"></div>
                                    <!-- Work Mode -->
                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div
                                                    class="form-group mb-3 mt-4 position-relative check-valid is-valid" style="box-shadow: none !important">
                                                    <div class="input-group input-group-lg input-group-label"
                                                        style="padding: 10px 26px; min-width: 210px;">
                                                        <label >{{ __("generated.Mode de travail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">

                                                <div class="row">
                                                    <div class="col-7"></div>
                                                    <div class="col" style="margin-bottom: 10px; font-size: 12px;">
                                                        <span style="margin-right: 23px;"
                                                            >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                </div>
                                                @foreach (['onsite' => 'Présentiel', 'remote' => 'Distanciel', 'hybrid' => 'Hybride'] as $key => $label)
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch"
                                                                    name="work_mode[{{ $key }}][is_active]"
                                                                    {{ $workMode[$key]['is_active'] ?? false ? 'checked' : '' }}>
                                                                <label class="form-check-label translated_text"
                                                                    for="{{ $key }}">{{ __("generated.".$label) }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col" style="margin-top: -4px;">
                                                            <div class="form-group mb-3 position-relative check-valid"
                                                                style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                                <div class="input-group input-group-lg"
                                                                    style="width: 55px;">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            name="work_mode[{{ $key }}][weight]"
                                                                            value="{{ $workMode[$key]['weight'] ?? '' }}"
                                                                            required
                                                                            class="form-control border-start-0 text-center"
                                                                            style="padding-top: 9px; height: 30px; font-size: 13px; width: 40px; padding-right: 4px;">
                                                                    </div>
                                                                    <span
                                                                        class="input-group-text
                                                                            text-theme border-end-0"
                                                                        style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 6px; z-index: 1;">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-1"></div> --}}
                                </div>

                                <div class="row mt-5 justify-content-center">
                                    <!-- Temps de travail Section -->
                                    {{-- <div class="col-lg-1"></div> --}}
                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div
                                                    class="form-group mb-3 mt-4 position-relative check-valid is-valid" style="box-shadow: none !important">
                                                    <div class="input-group input-group-lg input-group-label"
                                                        style="padding: 10px 26px; min-width: 210px;">
                                                        <label >{{ __("generated.Temps de travail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-7"></div>
                                                    <div class="col" style="margin-bottom: 10px; font-size: 12px;">
                                                        <span style="margin-right: 23px;"
                                                            >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                </div>
                                                @foreach (['full_time' => 'Plein', 'part_time' => 'Partiel'] as $key => $label)
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="{{ $key }}"
                                                                    name="work_time[{{ $key }}][is_active]"
                                                                    {{ $workTime[$key]['is_active'] ?? false ? 'checked' : '' }}>
                                                                <label class="form-check-label translated_text"
                                                                    for="{{ $key }}">{{ __("generated.".$label) }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col" style="margin-top: -4px;">
                                                            <div class="form-group mb-3 position-relative check-valid"
                                                                style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                                <div class="input-group input-group-lg"
                                                                    style="width: 55px;">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            name="work_time[{{ $key }}][weight]"
                                                                            class="form-control border-start-0 text-center"
                                                                            style="padding-top: 9px; height: 30px; font-size: 13px; width: 40px; padding-right: 4px;"
                                                                            value="{{ $workTime[$key]['weight'] ?? '' }}">
                                                                    </div>
                                                                    <span
                                                                        class="input-group-text text-theme border-end-0"
                                                                        style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 6px; z-index: 1;">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>

                                    <div class="col-12 col-lg-5 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div class="form-group mb-3 position-relative check-valid is-valid" style="box-shadow: none !important">
                                                    <div class="input-group input-group-lg input-group-label"
                                                        style="padding: 10px 26px; min-width: 210px;">
                                                        <label >{{ __("generated.Disponibilité") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <!-- Immediate Option -->
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="immediate" name="availability[type]"
                                                                        value="immediate"
                                                                        {{ $availability['type'] == 'immediate' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="immediate"
                                                                        >{{ __("generated.Immédiate") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="notice" name="availability[type]"
                                                                        value="notice"
                                                                        {{ $availability['type'] == 'notice' ? 'checked' : '' }}>
                                                                    <label class="form-check-label "
                                                                        for="notice">{{ __("generated.Préavis") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6" id="notice-duration-container">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important; padding-top: 5px !important; border-radius: 8px !important; height:40px !important;">
                                                            {{-- <label
                                                                 ></label> --}}
                                                            {{-- <h1>HHHH{{ __($availability['notice_duration']) }}</h1> --}}
                                                            <select class="chosenoptgroup w-100"
                                                                name="availability[notice_duration]"
                                                                id="notice_duration">
                                                                @foreach (\App\Enums\Profile\NoticePeriodEnum::getAll() as $key => $label)
                                                                    <option value="{{ $key }}"
                                                                        @if ($availability['notice_duration'] == $key) selected @endif>
                                                                        {{ __($label) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-1"></div> --}}
                                </div>

                                <div class="row mb-4 justify-content-center">
                                    <div class="col-6 col-md-3 mt-3">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label >{{ __("generated.Permis de conduire") }}</label>
                                                    <select class="chosenoptgroup w-100" name="has_driving_license"
                                                        id="has_driving_license">
                                                        <option value="true" 
                                                            @if ($profile->has_driving_license) selected @endif> {{ __("generated.Oui") }}</option>
                                                        <option value="false" 
                                                            @if (!$profile->has_driving_license) selected @endif> {{ __("generated.Non") }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 mt-3 license-type-container">
                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <label style="font-size: 12px; margin-left: 9px; display: inline;">
                                                    <span>{{ __("generated.Type de permis") }}</span>
                                                    <span class="text-themeColor">*</span>
                                                </label>
                                                <select class="chosenoptgroup w-100" name="license_types[]" id="license_types-select" multiple>
                                                    @php
                                                        $selectedLicenses = json_decode($profile->license_types ?? '[]', true) ?? [];
                                                    @endphp
                                                    @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                        <option value="{{ $key }}"
                                                            @if (in_array($key, $selectedLicenses)) selected @endif>
                                                            {{ __($license) }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
<div class="row mt-5 mb-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" onclick="saveAttentes()">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
