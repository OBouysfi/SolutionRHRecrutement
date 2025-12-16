
{{--historique pour create---------------------------------------------------------------------------------------- --}}

{{-- star for Mobilité --}}
<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card border-0" style="background-color: #e4e8ee54;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h5 class="title mb-5 custom-title" style="width: 98%;margin-left: 20px;">{{ __("generated.Mobilité") }}</h5>
                                    <div class="col-12 col-md-4 mt-2 mb-2" style="width: 35%">
                                        {{-- star Mobilité géographique = Geographic_mobility --}}
                                        <div class="row">
                                            <div id="mobilitys-geographic-label" class="mobilitys-label col-auto">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 10px 26px;background-color: #e3e7f1;">
                                                        <label >{{ __("generated.Mobilité géographique") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col" style="margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-12" style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                        <span style="margin-right: 44px" >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                            type="checkbox"
                                                            role="switch"
                                                            id="local"
                                                            name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"
                                                            {{ old('mobilitys.with_echelle.Geographic_mobilitys.local.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Locale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        class="form-control border-start-0"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][local][weight]"
                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.local.weight') }}"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"
                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.regional.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Régionale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        class="form-control border-start-0"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][regional][weight]"
                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.regional.weight') }}"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"
                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.national.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Nationale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][national][weight]"
                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.national.weight') }}"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"
                                                                {{ old('mobilitys.with_echelle.Geographic_mobilitys.international.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Internationale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][international][weight]"
                                                                        value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.international.weight') }}"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end Mobilité géographique = Geographic_mobility --}}
                                    </div>
                                    <div class="col-1"></div>
                                    {{-- star Mode de travail = work_mode --}}
                                    <div class="col-12 col-md-4 mt-2 mb-2">
                                        <div class="row">
                                            <div id="mobilitys-work-mode-label" class="mobilitys-label col-auto">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                        <label >{{ __("generated.Mode de travail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col" style="margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-12" style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                        <span style="margin-right: 35px" >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][work_modes][onsite][is_active]"
                                                                {{ old('mobilitys.with_echelle.work_modes.onsite.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Présentiel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][work_modes][onsite][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;"
                                                                        value="{{ old('mobilitys.with_echelle.work_modes.onsite.weight') }}">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][work_modes][remote][is_active]"
                                                                {{ old('mobilitys.with_echelle.work_modes.remote.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Distanciel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][work_modes][remote][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;"
                                                                        value="{{ old('mobilitys.with_echelle.work_modes.remote.weight') }}">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][work_modes][hybrid][is_active]"
                                                                {{ old('mobilitys.with_echelle.work_modes.hybrid.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Hybride") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][work_modes][hybrid][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;"
                                                                        value="{{ old('mobilitys.with_echelle.work_modes.hybrid.weight') }}">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end Mode de travail = work_mode --}}
                                </div>

                                {{-- star Temps de travail = working_hours || Disponibilité = Availability --}}
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-12 col-md-6 mb-2" style="width: 34.8%;">
                                        <div class="row">
                                            <div id="mobilitys-working-hours-label" class="mobilitys-label col-auto">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                        <label >{{ __("generated.Temps de travail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col" style="margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-12" style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                        <span style="margin-right: 43px" >{{ __("generated.Echelle") }}</span>
                                                    </div>
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][working_hours][full_time][is_active]"
                                                                {{ old('mobilitys.with_echelle.working_hours.full_time.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Plein") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][working_hours][full_time][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;"
                                                                        value="{{ old('mobilitys.with_echelle.working_hours.full_time.weight') }}">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][working_hours][part_time][is_active]"
                                                                {{ old('mobilitys.with_echelle.working_hours.part_time.is_active') ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="savecard">{{ __("generated.Partiel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid" style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg" style="width: 56px;">
                                                                <div class="form-floating" style="">
                                                                    <input type="number"
                                                                        name="mobilitys[with_echelle][working_hours][part_time][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;"
                                                                        value="{{ old('mobilitys.with_echelle.working_hours.part_time.weight') }}">
                                                                </div>
                                                                <span class="input-group-text text-theme border-end-0" style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2" style="width: 33%;margin-left: 124px;">
                                        <div class="row">
                                            <div id="mobilitys-availabilitys-label" class="mobilitys-label col-auto">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                        <label >{{ __("generated.Disponibilité") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col" style="margin-top: 0px;">
                                                <div class="row">
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                id="immediate"
                                                                value="immediate"
                                                                name="mobilitys[availabilitys][type]"
                                                                {{ old('mobilitys.availabilitys.type') == 'immediate' ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="immediate">{{ __("generated.Immédiate") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="width: 64%;">
                                                        <div class="form-check form-switch">
                                                            <input
                                                                class="form-check-input"
                                                                type="radio"
                                                                id="notice"
                                                                value="notice"
                                                                name="mobilitys[availabilitys][type]"
                                                                {{ old('mobilitys.availabilitys.type') == 'notice' ? 'checked' : '' }}>
                                                            <label class="  form-check-label" for="notice">{{ __("generated.Préavis") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2" style="width: 12%; margin-top: -4px; position: absolute;">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <select
                                                                class="form-select border-0"
                                                                id="notice_duration"
                                                                name="mobilitys[availabilitys][notice_duration]"
                                                                style="font-size: 13px">
                                                                <option   value=""
                                                                    disabled selected>{{ __("generated.Sélectionnez la durée de préavis") }}</option>
                                                                <option   value="1" {{ old('mobilitys.availabilitys.notice_duration') == 1 ? 'selected' : '' }}>{{ __("generated.1 mois") }}</option>
                                                                <option   value="2" {{ old('mobilitys.availabilitys.notice_duration') == 2 ? 'selected' : '' }}>{{ __("generated.2 mois") }}</option>
                                                                <option   value="3" {{ old('mobilitys.availabilitys.notice_duration') == 3 ? 'selected' : '' }}>{{ __("generated.3 mois") }}</option>
                                                                <option   value="4" {{ old('mobilitys.availabilitys.notice_duration') == 4 ? 'selected' : '' }}>{{ __("generated.4 mois") }}</option>
                                                                <option   value="5" {{ old('mobilitys.availabilitys.notice_duration') == 5 ? 'selected' : '' }}>{{ __("generated.5 mois") }}</option>
                                                                <option   value="6" {{ old('mobilitys.availabilitys.notice_duration') == 6 ? 'selected' : '' }}>{{ __("generated.6 mois") }}</option>
                                                                <option   value="7" {{ old('mobilitys.availabilitys.notice_duration') == 7 ? 'selected' : '' }}>{{ __("generated.7 mois") }}</option>
                                                                <option   value="8" {{ old('mobilitys.availabilitys.notice_duration') == 8 ? 'selected' : '' }}>{{ __("generated.8 mois") }}</option>
                                                                <option   value="9" {{ old('mobilitys.availabilitys.notice_duration') == 9 ? 'selected' : '' }}>{{ __("generated.9 mois") }}</option>
                                                                <option   value="10" {{ old('mobilitys.availabilitys.notice_duration') == 10 ? 'selected' : '' }}>{{ __("generated.10 mois") }}</option>
                                                                <option   value="11" {{ old('mobilitys.availabilitys.notice_duration') == 11 ? 'selected' : '' }}>{{ __("generated.11 mois") }}</option>
                                                                <option   value="12" {{ old('mobilitys.availabilitys.notice_duration') == 12 ? 'selected' : '' }}>{{ __("generated.12 mois") }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end Temps de travail = Working hours || Disponibilité = Availability --}}

                                {{-- star for partie Permis --}}
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-6 col-md-6 mt-3">
                                        <div class="row justify-content-end">
                                            <div class="col-6 col-md-6">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" name="has_driving_license" id="has_driving_license" onchange="toggleLicenseType()">
                                                                <option   value="" disabled {{ old('has_driving_license') === null ? 'selected' : '' }}>{{ __("generated.Sélectionnez une option") }}</option>
                                                                <option   value="1" {{ old('has_driving_license') == '1' ? 'selected' : '' }}>{{ __("generated.Oui") }}</option>
                                                                <option   value="0" {{ old('has_driving_license') == '0' ? 'selected' : '' }}>{{ __("generated.Non") }}</option>
                                                            </select>
                                                            <label for="has_driving_license" >{{ __("generated.Permis de conduire") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-6 mt-3" id="licenseTypeContainer">
                                        <div class="row">
                                            <div class="col-6 col-md-6">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 16px 15px 6px;background-color: #e3e7f1;">
                                                        <div class="form-floating">
                                                            <div class="dropdown d-inline-block"  style="width: 100%;">
                                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button" style="color: #111111 !important;">
                                                                    <label  style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem);position: absolute;top: -7px;left: -18px;color: #5f6165;">{{ __("generated.Type de permis") }}</label>
                                                                    <span style="margin-top: 10px !important;float: left;">Sélectionnez type</span><i class="bi bi-chevron-down" style="float: right;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="top: -260px;min-width: 184px;left: -16px;">
                                                                    @php
                                                                        $oldValues = old('license_types', []);
                                                                    @endphp
                                                                    @foreach(['A' => 'Permis A', 'A1' => 'Permis A1', 'AM' => 'Permis AM', 'B' => 'Permis B', 'C' => 'Permis C', 'D' => 'Permis D', 'EB' => 'Permis EB', 'EC' => 'Permis EC', 'ED' => 'Permis ED'] as $value => $label)
                                                                        <li>
                                                                            <div class="row" style="padding-left: 15px;">
                                                                                <div class="col-auto" style="margin-top: 2px;">
                                                                                    <input type="checkbox" name="license_types[]" value="{{ __($value) }}"
                                                                                        {{ in_array($value, $oldValues) ? 'checked' : '' }}>
                                                                                </div>
                                                                                <div class="col-auto" style="margin-left: -15px">{{ __($label) }}</div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end for partie Permis --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end for Mobilité --}}


{{--historique pour edit---------------------------------------------------------------------------------------- --}}

{{-- star for Mobilité --}}
<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card border-0" style="background-color: #e4e8ee54;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h5 class="title mb-5 custom-title"
                                        style="width: 98%;margin-left: 20px;">Mobilité</h5>
                                    <div class="col-12 col-md-4 mt-2 mb-2"
                                        style="width: 35%">
                                        {{-- star Mobilité géographique = Geographic_mobility --}}
                                        <div class="row">
                                            <div class="col-auto">
                                                <div
                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 10px 26px;background-color: #e3e7f1;">
                                                        <label >{{ __("generated.Mobilité géographique") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col"
                                                style="margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-12"
                                                        style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                        <span
                                                            style="margin-right: 44px">Echelle</span>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                @checked($mobilityOptionsByParent[1]->where('slug', 'local')->first()->pivot->is_active)
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Locale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[1]->where('slug', 'local')->first()->pivot->weight }}"
                                                                        class="form-control border-start-0"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][local][weight]"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[1]->where('slug', 'regional')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Régionale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[1]->where('slug', 'regional')->first()->pivot->weight }}"
                                                                        class="form-control border-start-0"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][regional][weight]"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[1]->where('slug', 'national')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Nationale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[1]->where('slug', 'national')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][national][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[1]->where('slug', 'international')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Internationale") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[1]->where('slug', 'international')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][international][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end Mobilité géographique = Geographic_mobility --}}
                                    </div>
                                    <div class="col-1"></div>
                                    {{-- star Mode de travail = work_mode --}}
                                    <div class="col-12 col-md-4 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div
                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                        <label >{{ __("generated.Mode de travail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col"
                                                style="margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-12"
                                                        style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                        <span
                                                            style="margin-right: 35px">Echelle</span>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[6]->where('slug', 'onsite')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][work_modes][onsite][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Présentiel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[6]->where('slug', 'onsite')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][work_modes][onsite][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[6]->where('slug', 'remote')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][work_modes][remote][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Distanciel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[6]->where('slug', 'remote')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][work_modes][remote][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[6]->where('slug', 'hybrid')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][work_modes][hybrid][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Hybride") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[6]->where('slug', 'hybrid')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][work_modes][hybrid][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end Mode de travail = work_mode --}}
                                </div>

                                {{-- star Temps de travail = working_hours || Disponibilité = Availability --}}
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-12 col-md-6 mb-2"
                                        style="width: 34.8%;">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div
                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                        <label >{{ __("generated.Temps de travail") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col"
                                                style="margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-12"
                                                        style="text-align: right;margin-bottom: 10px;font-size: 12px;color: #706f6f;">
                                                        <span
                                                            style="margin-right: 43px">Echelle</span>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[10]->where('slug', 'full_time')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][working_hours][full_time][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Plein") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[10]->where('slug', 'full_time')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][working_hours][full_time][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                @checked($mobilityOptionsByParent[10]->where('slug', 'part_time')->first()->pivot->is_active)
                                                                type="checkbox"
                                                                role="switch"
                                                                id="savecard"
                                                                name="mobilitys[with_echelle][working_hours][part_time][is_active]">
                                                            <label class="  form-check-label"
                                                                for="savecard">{{ __("generated.Partiel") }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 34%;margin-top: -4px">
                                                        <div class="form-group mb-3 position-relative check-valid"
                                                            style="height: 31px;width: 56px;border-bottom: 2px solid var(--adminux-theme);">
                                                            <div class="input-group input-group-lg"
                                                                style="width: 56px;">
                                                                <div class="form-floating"
                                                                    style="">
                                                                    <input type="number"
                                                                        value="{{ $mobilityOptionsByParent[10]->where('slug', 'part_time')->first()->pivot->weight }}"
                                                                        name="mobilitys[with_echelle][working_hours][part_time][weight]"
                                                                        class="form-control border-start-0"
                                                                        style="padding-top: 9px;height: 30px;font-size: 13px;width: 38px;padding-right: 4px;text-align: right;">
                                                                </div>
                                                                <span
                                                                    class="input-group-text text-theme border-end-0"
                                                                    style="font-size: 13px;height: 30px;padding-left: 0;padding-right: 9px;"><i
                                                                        class="bi bi-">%</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2"
                                        style="width: 33%;margin-left: 124px;">
                                        <div class="row">
                                            <div id="mobilitys-availabilitys-label" class="col-auto">
                                                <div
                                                    class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 10px 26px;background-color: #e3e7f1;width: 210px;">
                                                        <label >{{ __("generated.Disponibilité") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col"
                                                style="margin-top: 0px;">
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input
                                                                @checked($mobilityOptionsByParent[13]->first()->slug == "immediate")
                                                                class="form-check-input"
                                                                type="radio"
                                                                id="immediate"
                                                                value="immediate"
                                                                name="mobilitys[availabilitys][type]">
                                                            <label
                                                                class="form-check-label"
                                                                for="immediate">Immédiate</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"
                                                        style="width: 64%;">
                                                        <div
                                                            class="form-check form-switch">
                                                            <input
                                                                @checked($mobilityOptionsByParent[13]->first()->slug == "notice")
                                                                class="form-check-input"
                                                                type="radio"
                                                                id="notice"
                                                                value="notice"
                                                                name="mobilitys[availabilitys][type]">
                                                            <label
                                                                class="form-check-label "
                                                                for="notice">{{ __("generated.Préavis") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2"
                                                        style="width: 12%; margin-top: -4px; position: absolute;">
                                                        <div
                                                            class="form-group mb-3 position-relative check-valid is-valid">
                                                            <select
                                                                class="form-select border-0"
                                                                id="notice_duration"
                                                                name="mobilitys[availabilitys][notice_duration]"
                                                                style="font-size: 13px">
                                                                <option   value="" disabled selected>{{ __("generated.Sélectionnez la durée de préavis") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 1) value="1">1 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 2) value="2">2 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 3) value="3">3 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 4) value="4">4 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 5) value="5">5 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 6) value="6">6 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 7) value="7">7 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 8) value="8">8 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 9) value="9">9 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 10) value="10">10 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 11) value="11">11 mois") }}</option>
                                                                <option  @selected($mobilityOptionsByParent[13]->{{ __("generated.first()->pivot->notice_period_per_month == 12) value="12">12 mois") }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end Temps de travail = Working hours || Disponibilité = Availability --}}

                                {{-- star for partie Permis --}}
                                <div class="row mb-4 justify-content-center">
                                    <div class="col-6 col-md-6 mt-3">
                                        <div class="row justify-content-end">
                                            <div class="col-6 col-md-6">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" name="has_driving_license" id="has_driving_license" onchange="toggleLicenseType()">
                                                                <option   value="" selected disabled>{{ __("generated.Sélectionnez une option") }}</option>
                                                                <option   value="1" {{ old('has_driving_license', $jobOffer->{{ __("generated.has_driving_license) == 1 ? 'selected' : '' }}>Oui") }}</option>
                                                                <option   value="0" {{ old('has_driving_license', $jobOffer->{{ __("generated.has_driving_license) == 0 ? 'selected' : '' }}>Non") }}</option>
                                                            </select>
                                                            <label for="has_driving_license" >{{ __("generated.Permis de conduire") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-6 mt-3" id="licenseTypeContainer">
                                        <div class="row">
                                            <div class="col-6 col-md-6">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 16px 15px 6px;background-color: #e3e7f1;">
                                                        <div class="form-floating">
                                                            <div class="dropdown d-inline-block" style="width: 100%;">
                                                                @php
                                                                    $selectedLicenses = is_array($jobOffer->license_types) ? $jobOffer->license_types : json_decode($jobOffer->license_types, true) ?? [];
                                                                @endphp

                                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button" style="color: #111111 !important;">
                                                                    <label style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem);position: absolute;top: -7px;left: -18px;color: #5f6165;" >{{ __("generated.Type de permis") }}</label>
                                                                    <span style="margin-top: 10px !important;float: left;" class=" translated_text">
                                                                        {{ $jobOffer->license_types ? implode(', ', $selectedLicenses) : 'Sélectionnez type' }}
                                                                    </span>
                                                                    <i class="bi bi-chevron-down" style="float: right;"></i>
                                                                </a>

                                                                <ul class="dropdown-menu dropdown-menu-end" style="top: -260px; min-width: 184px; left: -16px;">
                                                                    @foreach(['A', 'A1', 'AM', 'B', 'C', 'D', 'EB', 'EC', 'ED'] as $license)
                                                                        <li>
                                                                            <div class="row" style="padding-left: 15px;">
                                                                                <div class="col-auto" style="margin-top: 2px;">
                                                                                    <input type="checkbox" name="driving_license_types[]" value="{{ __($license) }}"
                                                                                        {{ in_array($license, $selectedLicenses) ? 'checked' : '' }}>
                                                                                </div>
                                                                                <div class="col-auto" style="margin-left: -15px">
                                                                                    Permis {{ __($license) }}
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end for partie Permis --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end for Mobilité --}}


{{--historique pour create 15/04/2025---------------------------------------------------------------------------------------- --}}

{{-- star for Mobilité --}}
<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card border-0 mb-3" style="background-color: #e4e8ee54">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row justify-content-center p-4">
                                    <div class="col-12">
                                        <h5 class="title mb-4 custom-title">Mobilité</h5>
                                        <div class="row justify-content-center mb-5">
                                            {{-- star Mobilité géographique = Geographic_mobility --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row w-100">
                                                    <div id="mobilitys-geographic-label" class="mobilitys-label col-auto mt-4">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Mobilité géographique") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        {{-- Locale --}}
                                                        <div class="row">
                                                            <div class="col-12 text-end text-muted mb-2 small">
                                                                <span class="me-3">Echelle</span>
                                                            </div>

                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="local"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"
                                                                        {{ old('mobilitys.with_echelle.Geographic_mobilitys.local.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="local">{{ __("generated.Locale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][local][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.local.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Régionale --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="regionale"
                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"
                                                                    {{ old('mobilitys.with_echelle.Geographic_mobilitys.regional.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="regionale">{{ __("generated.Régionale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][regional][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.regional.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Nationale --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="nationale"
                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"
                                                                    {{ old('mobilitys.with_echelle.Geographic_mobilitys.national.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="nationale">{{ __("generated.Nationale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][national][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.national.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Internationale --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="internationale"
                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"
                                                                    {{ old('mobilitys.with_echelle.Geographic_mobilitys.international.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="internationale">{{ __("generated.Internationale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][international][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.Geographic_mobilitys.international.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Mobilité géographique = Geographic_mobility --}}

                                            {{-- Espacement supplémentaire --}}
                                            {{-- <div class="col-12 col-md-2"></div> --}}

                                            {{-- star Mode de travail = work_mode --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row w-100">
                                                    <div id="mobilitys-work-mode-label" class="mobilitys-label col-auto mt-4">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Mode de travail") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        {{-- Présentiel --}}
                                                        <div class="row">
                                                            <div class="col-12 text-end text-muted mb-2 small">
                                                                <span class="me-3">Echelle</span>
                                                            </div>

                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="local"
                                                                        name="mobilitys[with_echelle][work_modes][onsite][is_active]"
                                                                        {{ old('mobilitys.with_echelle.work_modes.onsite.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="onsite">{{ __("generated.Présentiel") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][work_modes][onsite][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.work_modes.onsite.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Distanciel --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="remote"
                                                                    name="mobilitys[with_echelle][work_modes][remote][is_active]"
                                                                    {{ old('mobilitys.with_echelle.work_modes.remote.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="remote">{{ __("generated.Distanciel") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][work_modes][remote][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.work_modes.remote.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Hybride --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="hybrid"
                                                                    name="mobilitys[with_echelle][work_modes][hybrid][is_active]"
                                                                    {{ old('mobilitys.with_echelle.work_modes.hybrid.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="hybrid">{{ __("generated.Hybride") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][work_modes][hybrid][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.work_modes.hybrid.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Mode de travail = work_mode --}}
                                        </div>

                                        <div class="row justify-content-center mb-5">
                                            {{-- star Temps de travail = working_hours --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row w-100">
                                                    <div id="mobilitys-working-hours-label" class="mobilitys-label col-auto mt-4">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Temps de travail") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        {{-- Plein --}}
                                                        <div class="row">
                                                            <div class="col-12 text-end text-muted mb-2 small">
                                                                <span class="me-3">Echelle</span>
                                                            </div>

                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="full_time"
                                                                        name="mobilitys[with_echelle][working_hours][full_time][is_active]"
                                                                        {{ old('mobilitys.with_echelle.working_hours.full_time.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="full_time">{{ __("generated.Plein") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][working_hours][full_time][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.working_hours.full_time.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Partiel --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="part_time"
                                                                    name="mobilitys[with_echelle][working_hours][part_time][is_active]"
                                                                    {{ old('mobilitys.with_echelle.working_hours.part_time.is_active') ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="part_time">{{ __("generated.Partiel") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][working_hours][part_time][weight]"
                                                                            value="{{ old('mobilitys.with_echelle.working_hours.part_time.weight') }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Temps de travail = working_hours --}}

                                            {{-- Espacement supplémentaire --}}
                                            {{-- <div class="col-12 col-md-2"></div> --}}

                                            {{-- star Disponibilité = Availability --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row mt-4">
                                                    <div id="mobilitys-availabilitys-label" class="mobilitys-label col-auto">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Disponibilité") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-check form-switch">
                                                                    <input
                                                                        class="form-check-input"
                                                                        type="radio"
                                                                        id="immediate"
                                                                        value="immediate"
                                                                        name="mobilitys[availabilitys][type]"
                                                                        {{ old('mobilitys.availabilitys.type') == 'immediate' ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="immediate">{{ __("generated.Immédiate") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check form-switch">
                                                                    <input
                                                                        class="form-check-input"
                                                                        type="radio"
                                                                        id="notice"
                                                                        value="notice"
                                                                        name="mobilitys[availabilitys][type]"
                                                                        {{ old('mobilitys.availabilitys.type') == 'notice' ? 'checked' : '' }}>
                                                                    <label class="  form-check-label" for="notice">{{ __("generated.Préavis") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group mb-3 position-relative check-valid is-valid w-100">
                                                                    <select class="form-select border-0"
                                                                        id="notice_duration"
                                                                        name="mobilitys[availabilitys][notice_duration]">
                                                                        <option   value="" disabled selected>{{ __("generated.Sélectionnez la durée de préavis") }}</option>
                                                                        @for ($i = 1; $i <= 12; $i++)
                                                                            <option  class=" translated_text" value="{{ __($i) }}" {{ old('mobilitys.availabilitys.notice_duration') == $i ? 'selected' : '' }}>
                                                                                {{ __($i) }} mois
                                                                            </option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group mb-3 position-relative check-valid is-valid w-100">
                                                                    <select class="form-select border-0"
                                                                        id="notice_duration"
                                                                        name="mobilitys[availabilitys][notice_duration]">
                                                                        <option   value="" disabled selected>{{ __("generated.Sélectionnez la durée de préavis") }}</option>
                                                                        @foreach($noticePeriodEnum as $value => $label)
                                                                            <option  class=" translated_text" value="{{ __($value) }}" {{ old('mobilitys.availabilitys.notice_duration') == $value ? 'selected' : '' }}>
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
                                            {{-- end Disponibilité = Availability --}}
                                        </div>

                                        <div class="row justify-content-center">
                                            {{-- star for partie Permis --}}
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" name="has_driving_license" id="has_driving_license" onchange="toggleLicenseType()">
                                                                <option   value="" disabled {{ old('has_driving_license') === null ? 'selected' : '' }}>{{ __("generated.Sélectionnez une option") }}</option>
                                                                <option   value="1" {{ old('has_driving_license') == '1' ? 'selected' : '' }}>{{ __("generated.Oui") }}</option>
                                                                <option   value="0" {{ old('has_driving_license') == '0' ? 'selected' : '' }}>{{ __("generated.Non") }}</option>
                                                            </select>
                                                            <label for="has_driving_license" >{{ __("generated.Permis de conduire") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-12 col-md-4" id="licenseTypeContainer">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 16px 15px 6px;background-color: var(--adminux-theme-bg);">
                                                        <div class="form-floating">
                                                            <div class="dropdown d-inline-block" style="width: 100%;">
                                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button" style="color: #111111 !important; cursor: pointer; display: block; width: 100%;">
                                                                    <label style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem);position: absolute;top: -7px;left: -18px;color: #5f6165;">Type de permis</label>
                                                                    <span style="margin-top: 10px !important;float: left; width: calc(100% - 20px)">Sélectionnez type</span><i class="bi bi-chevron-down" style="float: right;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="top: -260px;min-width: 184px;left: -16px;">
                                                                    @php
                                                                        $oldValues = old('license_types', []);
                                                                    @endphp
                                                                    @foreach(['A' => 'Permis A', 'A1' => 'Permis A1', 'AM' => 'Permis AM', 'B' => 'Permis B', 'C' => 'Permis C', 'D' => 'Permis D', 'EB' => 'Permis EB', 'EC' => 'Permis EC', 'ED' => 'Permis ED'] as $value => $label)
                                                                        <li>
                                                                            <div class="row" style="padding-left: 15px;">
                                                                                <div class="col-auto" style="margin-top: 2px;">
                                                                                    <input type="checkbox" name="license_types[]" value="{{ __($value) }}"
                                                                                        {{ in_array($value, $oldValues) ? 'checked' : '' }}>
                                                                                </div>
                                                                                <div class="col-auto" style="margin-left: -15px">{{ __($label) }}</div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-12 col-md-4" id="licenseTypeContainer">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg" style="padding: 16px 15px 6px;background-color: var(--adminux-theme-bg);">
                                                        <div class="form-floating">
                                                            <div class="dropdown d-inline-block" style="width: 100%;">
                                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button" style="color: #111111 !important; cursor: pointer; display: block; width: 100%;">
                                                                    <label style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem);position: absolute;top: -7px;left: -18px;color: #5f6165;">Type de permis</label>
                                                                    <span style="margin-top: 10px !important;float: left; width: calc(100% - 20px)">Sélectionnez type</span><i class="bi bi-chevron-down" style="float: right;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" style="top: -260px;min-width: 184px;left: -16px;">
                                                                    @php
                                                                        use App\Enums\DrivingLicense\TypeDrivingLicenseEnum;
                                                                        $oldValues = old('license_types', []);
                                                                    @endphp
                                                                    @foreach (TypeDrivingLicenseEnum::getAll() as $key => $label)
                                                                        <li>
                                                                            <div class="row" style="padding-left: 15px;">
                                                                                <div class="col-auto" style="margin-top: 2px;">
                                                                                    <input type="checkbox" name="license_types[]" value="{{ $key }}"
                                                                                        {{ in_array($key, $oldValues) ? 'checked' : '' }}>
                                                                                </div>
                                                                                <div class="col-auto" style="margin-left: -15px">{{ __($label) }}</div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="col-12 col-md-4" id="licenseTypeContainer">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 16px 15px 6px; background-color: var(--adminux-theme-bg);">
                                                        <div class="form-floating">
                                                            <div class="dropdown d-inline-block" style="width: 100%;">
                                                                <a class="text-secondary dd-arrow-none"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    data-bs-display="static" role="button"
                                                                    style="color: #111111 !important;">
                                                                    <label 
                                                                        style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem); position: absolute; top: -7px; left: -18px; color: #5f6165;">{{ __("generated.Type de permis") }}</label>
                                                                    <span id="selected-license"
                                                                        style="margin-top: 10px; float: left; width: calc(100% - 20px);">Permis</span>
                                                                    <i class="bi bi-chevron-down"
                                                                        style="float: right;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="top: auto; left: 0; width: 100%;">
                                                                    @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                        <li class="dropdown-item">
                                                                            <label class=" translated_text">
                                                                                <input type="checkbox"
                                                                                    name="license_types[]"
                                                                                    value="{{ $key }}"
                                                                                    class="license-option"
                                                                                    @if (in_array($key, old('license_types', []))) checked @endif>
                                                                                {{ __($license) }}
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const checkboxes = document.querySelectorAll('.license-option');
                                                                const selectedDisplay = document.getElementById('selected-license');

                                                                function updateSelected() {
                                                                    const selected = Array.from(checkboxes)
                                                                        .filter(cb => cb.checked)
                                                                        .map(cb => cb.parentElement.textContent.trim());

                                                                    selectedDisplay.textContent = selected.length > 0 ?
                                                                        selected.join(', ') :
                                                                        'Permis';
                                                                }

                                                                checkboxes.forEach(cb => cb.addEventListener('change', updateSelected));
                                                                updateSelected(); // initial load
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-12 col-md-4" id="licenseTypeContainer">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select select2" name="license_types[]" id="license_types" multiple required>
                                                                @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                    <option  class=" translated_text" value="{{ $key }}" @selected(in_array($key, old('license_types', [])))>{{ __($license) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- end for partie Permis --}}
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
{{-- end for Mobilité --}}

{{--historique pour edit 15/04/2025---------------------------------------------------------------------------------------- --}}
{{-- star for Mobilité --}}
<div class="row justify-content-center mb-4">
    <div class="col-12">
        <div class="card border-0 mb-3" style="background-color: #e4e8ee54">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row justify-content-center p-4">
                                    <div class="col-12">
                                        <h5 class="title mb-4 custom-title">Mobilité</h5>
                                        <div class="row justify-content-center mb-5">
                                            {{-- star Mobilité géographique = Geographic_mobility --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row w-100">
                                                    <div id="mobilitys-geographic-label" class="mobilitys-label col-auto mt-4">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Mobilité géographique") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        {{-- Locale --}}
                                                        <div class="row">
                                                            <div class="col-12 text-end text-muted mb-2 small">
                                                                <span class="me-3">Echelle</span>
                                                            </div>

                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="local"
                                                                        name="mobilitys[with_echelle][Geographic_mobilitys][local][is_active]"
                                                                        {{-- @checked($mobilityOptionsByParent[1]->where('slug', 'local')->first()->pivot->is_active) --}}

                                                                        @checked(isset($mobilityOptionsByParent[1]) &&
                                                                            $mobilityOptionsByParent[1]->where('slug', 'local')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="local">{{ __("generated.Locale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][local][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'local')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[1]->where('slug', 'local')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Régionale --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="regionale"
                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][regional][is_active]"
                                                                    @checked(isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'regional')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="regionale">{{ __("generated.Régionale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][regional][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'regional')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[1]->where('slug', 'regional')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Nationale --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="nationale"
                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][national][is_active]"
                                                                    @checked(isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'national')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="nationale">{{ __("generated.Nationale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][national][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'national')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[1]->where('slug', 'national')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Internationale --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="internationale"
                                                                    name="mobilitys[with_echelle][Geographic_mobilitys][international][is_active]"
                                                                    @checked(isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'international')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="internationale">{{ __("generated.Internationale") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][Geographic_mobilitys][international][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[1]) && $mobilityOptionsByParent[1]->where('slug', 'international')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[1]->where('slug', 'international')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Mobilité géographique = Geographic_mobility --}}

                                            {{-- Espacement supplémentaire --}}
                                            {{-- <div class="col-12 col-md-2"></div> --}}

                                            {{-- star Mode de travail = work_mode --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row w-100">
                                                    <div id="mobilitys-work-mode-label" class="mobilitys-label col-auto mt-4">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Mode de travail") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        {{-- Présentiel --}}
                                                        <div class="row">
                                                            <div class="col-12 text-end text-muted mb-2 small">
                                                                <span class="me-3">Echelle</span>
                                                            </div>

                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="local"
                                                                        name="mobilitys[with_echelle][work_modes][onsite][is_active]"
                                                                        @checked(isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'onsite')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="onsite">{{ __("generated.Présentiel") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][work_modes][onsite][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'onsite')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[6]->where('slug', 'onsite')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Distanciel --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="remote"
                                                                    name="mobilitys[with_echelle][work_modes][remote][is_active]"
                                                                    @checked(isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'remote')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="remote">{{ __("generated.Distanciel") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][work_modes][remote][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'remote')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[6]->where('slug', 'remote')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Hybride --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="hybrid"
                                                                    name="mobilitys[with_echelle][work_modes][hybrid][is_active]"
                                                                    @checked(isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'hybrid')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="hybrid">{{ __("generated.Hybride") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][work_modes][hybrid][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[6]) && $mobilityOptionsByParent[6]->where('slug', 'hybrid')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[6]->where('slug', 'hybrid')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Mode de travail = work_mode --}}
                                        </div>

                                        <div class="row justify-content-center mb-5">
                                            {{-- star Temps de travail = working_hours --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row w-100">
                                                    <div id="mobilitys-working-hours-label" class="mobilitys-label col-auto mt-4">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Temps de travail") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        {{-- Plein --}}
                                                        <div class="row">
                                                            <div class="col-12 text-end text-muted mb-2 small">
                                                                <span class="me-3">Echelle</span>
                                                            </div>

                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="full_time"
                                                                        name="mobilitys[with_echelle][working_hours][full_time][is_active]"
                                                                        @checked(isset($mobilityOptionsByParent[10]) && $mobilityOptionsByParent[10]->where('slug', 'full_time')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="full_time">{{ __("generated.Plein") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][working_hours][full_time][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[10]) && $mobilityOptionsByParent[10]->where('slug', 'full_time')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[10]->where('slug', 'full_time')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Partiel --}}
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="part_time"
                                                                    name="mobilitys[with_echelle][working_hours][part_time][is_active]"
                                                                    @checked(isset($mobilityOptionsByParent[10]) && $mobilityOptionsByParent[10]->where('slug', 'part_time')->first()?->pivot?->is_active)>
                                                                    <label class="  form-check-label" for="part_time">{{ __("generated.Partiel") }}</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-5">
                                                                <div class="form-group mb-3 position-relative check-valid">
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control text-end border-primary"
                                                                            name="mobilitys[with_echelle][working_hours][part_time][weight]"
                                                                            {{-- value="{{ isset($mobilityOptionsByParent[10]) && $mobilityOptionsByParent[10]->where('slug', 'part_time')->first()?->pivot?->weight }}" --}}
                                                                            value="{{ optional(optional($mobilityOptionsByParent[10]->where('slug', 'part_time')->first())->pivot)->weight }}">
                                                                        <span class="input-group-text text-primary"><i class="bi bi-percent"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Temps de travail = working_hours --}}

                                            {{-- Espacement supplémentaire --}}
                                            {{-- <div class="col-12 col-md-2"></div> --}}

                                            {{-- star Disponibilité = Availability --}}
                                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                                <div class="row mt-4">
                                                    <div id="mobilitys-availabilitys-label" class="mobilitys-label col-auto">
                                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                                            <div class="input-group input-group-lg p-3" style="background-color: #e3e7f1;">
                                                                <label >{{ __("generated.Disponibilité") }}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col mt-n3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-check form-switch">
                                                                    <input
                                                                        class="form-check-input"
                                                                        type="radio"
                                                                        id="immediate"
                                                                        value="immediate"
                                                                        name="mobilitys[availabilitys][type]"
                                                                        @checked(isset($mobilityOptionsByParent[13]) && $mobilityOptionsByParent[13]->first()?->slug == "immediate")>
                                                                    <label class="  form-check-label" for="immediate">{{ __("generated.Immédiate") }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check form-switch">
                                                                    <input
                                                                        class="form-check-input"
                                                                        type="radio"
                                                                        id="notice"
                                                                        value="notice"
                                                                        name="mobilitys[availabilitys][type]"
                                                                        @checked(isset($mobilityOptionsByParent[13]) && $mobilityOptionsByParent[13]->first()?->slug == "notice")>
                                                                    <label class="  form-check-label" for="notice">{{ __("generated.Préavis") }}</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @php
                                                        $selectedNoticeValue = isset($mobilityOptionsByParent[13])
                                                            ? $mobilityOptionsByParent[13]->first()?->pivot?->notice_period_per_month
                                                            : null;
                                                        @endphp

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group mb-3 position-relative check-valid is-valid w-100">
                                                                    <select
                                                                        class="form-select border-0"
                                                                        id="notice_duration"
                                                                        name="mobilitys[availabilitys][notice_duration]">
                                                                        <option   value="" disabled {{ $selectedNoticeValue === null ? 'selected' : '' }}>{{ __("generated.Sélectionnez la durée de préavis") }}</option>
                                                                        @foreach($noticePeriodEnum as $value => $label)
                                                                            <option  class=" translated_text" value="{{ __($value) }}" @selected($selectedNoticeValue === $value)>
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
                                            {{-- end Disponibilité = Availability --}}
                                        </div>

                                        <div class="row justify-content-center">
                                            {{-- star for partie Permis --}}
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg">
                                                        <div class="form-floating">
                                                            <select class="form-select border-0" name="has_driving_license" id="has_driving_license" onchange="toggleLicenseType()">
                                                                <option   value="" selected disabled>{{ __("generated.Sélectionnez une option") }}</option>
                                                                <option   value="1" {{ old('has_driving_license', $jobOffer->{{ __("generated.has_driving_license) == 1 ? 'selected' : '' }}>Oui") }}</option>
                                                                <option   value="0" {{ old('has_driving_license', $jobOffer->{{ __("generated.has_driving_license) == 0 ? 'selected' : '' }}>Non") }}</option>
                                                            </select>
                                                            <label for="has_driving_license" >{{ __("generated.Permis de conduire") }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4" id="licenseTypeContainer">
                                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                                    <div class="input-group input-group-lg"
                                                        style="padding: 16px 15px 6px; background-color: var(--adminux-theme-bg);">
                                                        <div class="form-floating">
                                                            <div class="dropdown d-inline-block" style="width: 100%;">
                                                                <a class="text-secondary dd-arrow-none"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    data-bs-display="static" role="button"
                                                                    style="color: #111111 !important;">
                                                                    <label 
                                                                        style="transform: scale(0.75) translateY(-0.5rem) translateX(0.15rem); position: absolute; top: -7px; left: -18px; color: #5f6165;">{{ __("generated.Type de permis") }}</label>
                                                                    <span id="selected-license"
                                                                        style="margin-top: 10px; float: left; width: calc(100% - 20px);">
                                                                        @php
                                                                            $licenseKeys = json_decode(
                                                                                $jobOffer->license_types,
                                                                                true,
                                                                            );
                                                                            $licenseLabels = [];

                                                                            if (is_array($licenseKeys)) {
                                                                                foreach ($licenseKeys as $key) {
                                                                                    $licenseLabels[] = \App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getValue(
                                                                                        $key,
                                                                                    );
                                                                                }
                                                                            }
                                                                        @endphp

                                                                        {{ implode(', ', array_filter($licenseLabels)) }}
                                                                    </span>
                                                                    <i class="bi bi-chevron-down"
                                                                        style="float: right;"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    style="top: auto; left: 0; width: 100%;">
                                                                    @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                                        <li class="dropdown-item">
                                                                            <label class=" translated_text">
                                                                                <input type="checkbox"
                                                                                    name="driving_license_types[]"
                                                                                    class="license-option"
                                                                                    value="{{ $key }}"
                                                                                    @if (in_array($key, json_decode($jobOffer->license_types ?? '[]', true) ?? [])) checked @endif>
                                                                                {{ __($license) }}

                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const checkboxes = document.querySelectorAll('.license-option');
                                                                const selectedDisplay = document.getElementById('selected-license');

                                                                function updateSelected() {
                                                                    const selected = Array.from(checkboxes)
                                                                        .filter(cb => cb.checked)
                                                                        .map(cb => cb.parentElement.textContent.trim());

                                                                    selectedDisplay.textContent = selected.length > 0 ?
                                                                        selected.join(', ') :
                                                                        'Permis';
                                                                }

                                                                checkboxes.forEach(cb => cb.addEventListener('change', updateSelected));
                                                                updateSelected(); // initial load
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- <div class="col-12 col-md-4" id="licenseTypeContainer">
                                                <div class="form-group position-relative check-valid is-valid">
                                                    <select class="form-select select2" name="driving_license_types[]" id="license_types" multiple required>
                                                        @foreach (App\Enums\DrivingLicense\TypeDrivingLicenseEnum::getAll() as $key => $license)
                                                            <option  class=" translated_text" value="{{ $key }}" @selected(in_array($key, old('driving_license_types', $jobOffer->license_types)))>{{ __($license) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            {{-- end for partie Permis --}}
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
{{-- end for Mobilité --}}

