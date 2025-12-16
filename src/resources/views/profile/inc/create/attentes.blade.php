<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card border-0">
                            <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">
                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Poste") }}</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4 justify-content-center">
                                    {{-- <h4 class="title custom-title  mb-5 " style="margin-left: 15px;width: 98%">{{ __("generated.Poste") }}</h4> --}}
                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Intitulé du poste") }}</span><span class="text-themeColor">*</span></label>
                                            <select class="chosenoptgroup w-100" name="desired_profession_id"
                                                id="professiont-select">
                                                <option>{{ __("generated.Choisir un intitulé de poste") }}</option>
                                                @if (isset($posts))
                                                    @foreach ($posts as $post)
                                                        <option value="{{ __($post->id) }}">
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
                                            <select class="chosenoptgroup w-100" name="contract_type"
                                                id="filter-contrat-type">
                                                 <option>{{ __("generated.Choisir un type de contrat") }}</option>
                                                @if (isset($contractsTypes))
                                                    @foreach ($contractsTypes as $key => $contract)
                                                        <option value="{{ $key ?? '' }}">
                                                            {{ $contract ?? '_' }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-3 mb-4">
                                        <div class="custom-multiple-select rounded border poste-chosen"
                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                            <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Catégorie Socio Professionnelle") }}</span></label>
                                            <select class="chosenoptgroup w-100" id="permis"
                                                name="categorie_socio_professionnelle">
                                               <option> {{ __("generated.Choisir une catégorie") }}</option>
                                                @foreach (App\Enums\Profile\CategorySocioProEnum::getAll() as $key => $category)
                                                    <option value="{{ __($category) }}">{{ __($category) }}
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
                                                    <option value="{{ __($companySize) }}">{{ __($companySize) }}
                                                    </option>
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
                                                        step="0.01" style="height: 55px;">
                                                    <label for="min_expected_salary"> <span
                                                            >{{ __("generated.Prétentions salariales minimal") }}</span><span
                                                            class="text-themeColor">*</span></label>
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
                                                        name="max_expected_salary">
                                                    <label for="max_expected_salary"><span
                                                            >{{ __("generated.Prétentions salariales maximal") }}</span><span
                                                            class="text-themeColor">*</span></label>
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
                                                        <option value="{{ __($sector->id) }}">
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
        <div class="card border-0">
            <div class="card-header bg-gradient-theme-light" style="margin-bottom: 2rem">
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
                                                    <div class="col"
                                                        style="margin-bottom: 10px; font-size: 12px; color: #706f6f;">
                                                        <span style="margin-right: 23px;"
                                                            >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="mobility[local][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="locale">{{ __("generated.Locale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="mobility[local][weight]"
                                                                        value="0"
                                                                        required class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                {{-- <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span> --}}
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="mobility[regional][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="regional">{{ __("generated.Régionale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px ; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="mobility[regional][weight]"
                                                                        value="0" required
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="mobility[national][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="national">{{ __("generated.Nationale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="mobility[national][weight]"
                                                                        value="0" required
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch"
                                                                name="mobility[international][is_active]">
                                                            <label class="form-check-label "
                                                                for="international">{{ __("generated.Internationale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="mobility[international][weight]"
                                                                        value="0" required
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>

                                    <!-- Work Mode -->
                                    {{-- <div class="col-1"></div> --}}
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
                                                    <div class="col"
                                                        style="margin-bottom: 10px; font-size: 12px; color: #706f6f;">
                                                        <span style="margin-right: 23px;"
                                                            >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="work_mode[onsite][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="onsite">{{ __("generated.Présentiel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="work_mode[onsite][weight]"
                                                                        value="0"
                                                                        required class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="work_mode[remote][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="remote">{{ __("generated.Distanciel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="work_mode[remote][weight]"
                                                                        value="0"
                                                                        required class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" name="work_mode[hybrid][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="hybrid">{{ __("generated.Hybride") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="work_mode[hybrid][weight]"
                                                                        value="0"
                                                                        required class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-1"></div> --}}

                                </div>
                                <div class="row mt-5 justify-content-center">
                                    {{-- <div class="col-lg-1"></div> --}}
                                    <!-- Temps de travail Section -->
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
                                                    <div class="col-7" style="min-width: 135px"></div>
                                                    <div class="col"
                                                        style="margin-bottom: 10px; font-size: 12px; color: #706f6f;">
                                                        <span style="margin-right: 23px;"
                                                            >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- Full-Time -->
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="full_time" name="work_time[full_time][is_active]"
                                                                >
                                                            <label class="form-check-label "
                                                                for="full_time">{{ __("generated.Plein") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="work_time[full_time][weight]"
                                                                        value="0"
                                                                        required class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Part-Time -->
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="part_time" name="work_time[part_time][is_active]">
                                                            <label class="form-check-label "
                                                                for="part_time">{{ __("generated.Partiel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-top: -4px;">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px; width: 55px; border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 55px;">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        name="work_time[part_time][weight]"
                                                                        value="0"
                                                                        required class="form-control border-start-0"
                                                                        style="padding-top: 9px; height: 30px; font-size: 13px; width: 38px; padding-right: 2px; text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px; height: 30px; padding-left: 0; padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1"></div>

                                    <div class="col-12 col-lg-5 mt-5 mb-2">
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div class="form-group mb-3 position-relative check-valid is-valid" style="box-shadow: none !important">
                                                    <div class="input-group input-group-lg input-group-label"
                                                        style="padding: 10px 26px; min-width: 210px;" >
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
                                                                        value="immediate">
                                                                    <label class="form-check-label "
                                                                        for="immediate">{{ __("generated.Immédiate") }}</label>
                                                                </div>
                                                            </div>
                                                            <!-- Notice Option -->
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="notice" name="availability[type]"
                                                                        value="notice" >
                                                                    <label class="form-check-label "
                                                                        for="notice">{{ __("generated.Préavis") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6" id="notice-duration-container">
                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important; padding-top: 5px !important; border-radius: 8px !important; height:40px !important">
                                                            {{-- <label
                                                                 ><span class="translated_text"></label> --}}
                                                            <select class="chosenoptgroup w-100"
                                                                name="availability[notice_duration]"
                                                                id="notice_duration">
                                                                <option value="" selected disabled>{{ __("generated.Selectionner") }}</option>
                                                                @foreach (\App\Enums\Profile\NoticePeriodEnum::getAll() as $key => $label)
                                                                    <option value="{{ $key }}">
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
                                                    <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Permis de conduire") }}</span></label>
                                                    <select class="chosenoptgroup w-100" name="has_driving_license"
                                                        id="has_driving_license">
                                                        <option value="true" selected >{{ __("generated.Oui") }}</option>
                                                        <option value="false" >{{ __("generated.Non") }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-3 mt-3" id="license-type-container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">

                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label style="font-size: 12px; margin-left: 9px; display: inline;"><span >{{ __("generated.Type de permis") }}</span><span
                                                                class="text-themeColor">*</span></label>
                                                        <select class="chosenoptgroup w-100" name="license_types[]"
                                                            id="license_types-select" multiple>
                                                            @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                <option value="{{ $key }}"
                                                                    @if (in_array($key, old('license_types', []))) selected @endif>
                                                                    {{ __($license) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            const checkboxes = document.querySelectorAll('.license-option');
                                                            const selectedDisplay = document.getElementById('selected-license');

                                                            function updateSelected() {
                                                                const selected = Array.from(checkboxes)
                                                                    .filter(cb => cb.)
                                                                    .map(cb => cb.parentElement.textContent.trim());

                                                                selectedDisplay.textContent = selected.length > 0 ?
                                                                    selected.join(', ') :
                                                                    'Permis';
                                                            }

                                                            checkboxes.forEach(cb => cb.addEventListener('change', updateSelected));
                                                            updateSelected(); // initial load
                                                        });
                                                    </script>
                                                    {{-- <div class="form-floating"
                                                            style="width: 100%; max-width: 100%;">
                                                            <select class="form-select select2" name="license_types[]"
                                                                id="license_types" multiple style="width: 100% !importants;">
                                                                @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                    <option value="{{ $key }}"
                                                                        @if (in_array($key, old('license_types', []))) selected @endif>
                                                                        {{ __($license) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="license_types"
                                                                style="top: -15px !important">Type de permis</label>
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
        </div>
    </div>
</div>
<div class="row mt-5 mb-4 mx-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" onclick="saveAttentes()">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // For all switches in mobility, work_mode, work_time
        document.querySelectorAll('.form-check-input[type="checkbox"]').forEach(function(switchInput) {
            switchInput.addEventListener('change', function() {
                // Find the related input[type="text"] in the same row/group
                let group = switchInput.closest('.row, .form-check, .form-group');
                if (!group) return;
                let textInput = group.querySelector('input[type="text"]');
                if (!textInput) return;

                if (!switchInput.checked) {
                    textInput.value = 0;
                    textInput.setAttribute('readonly', 'readonly');
                } else {
                    textInput.removeAttribute('readonly');
                }
                updateGroupTotal(group);
            });
        });

        // Update total on input change
        document.querySelectorAll('input[type="text"]').forEach(function(input) {
            input.addEventListener('input', function() {
                let group = input.closest('.row, .form-check, .form-group');
                if (!group) return;
                updateGroupTotal(group);
            });
        });

        function updateGroupTotal(group) {
            // Find all enabled text inputs in the group
            let inputs = group.querySelectorAll('input[type="text"]:not([readonly])');
            let total = 0;
            inputs.forEach(input => {
                let val = parseFloat(input.value) || 0;
                total += val;
            });
            // Optionally, display the total somewhere or enforce the 100% rule here
            // Example: group.querySelector('.total-display').textContent = total + '%';
            // Optionally, you can add logic to prevent exceeding 100%
        }
    });
</script>
