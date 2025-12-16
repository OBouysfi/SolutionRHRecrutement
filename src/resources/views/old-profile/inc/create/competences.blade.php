<div class="row justify-content-center mb-4 ">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">
                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences techniques") }}</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center" style="padding: 12px 30px;">
                                    {{-- <h4 class="title custom-title  mb-5 ">{{ __("generated.Compétences techniques") }}</h4> --}}
                                    <div id="technical-skills-list" class="col-10">
                                    </div>
                                    <div class="col-10 mb-4 technical-skill-row" style="">
                                        <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}"
                                            class="technical-profile_id" hidden readonly>
                                        <div class="row" style="padding-left: 21px;">
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Catégorie") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-technical-category technical-category fillter-technical-category"
                                                        id="technical-category" name="category">
                                                        <option value="Tous">{{ __("generated.Choisir une catégorie") }}</option>
                                                        @if (isset($technicalSubTypes))
                                                            @foreach ($technicalSubTypes as $subType)
                                                                <option value="{{ __($subType->id) }}">
                                                                    {{ __($subType->label) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Détail") }}</span><span class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-technical-skill technical-skill fillter-technical-skill"
                                                        id="technical-skill" name="skill" required>
                                                         <option value="Tous">{{ __("generated.Choisir un détail") }}</option>
                                                        @if (isset($technicalSkills))
                                                            @foreach ($technicalSkills as $skill)
                                                                <option value="{{ __($skill->id) }}"
                                                                    data-skill-type="{{ $skill->skill_type_id ?? '' }}"
                                                                    data-skill-name="{{ __($skill->label) }}">
                                                                    {{ __($skill->label) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-2 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Niveau") }}</span><span class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-technical-level technical-level"
                                                        id="technical-level" name="level" required>
                                                         <option>{{ __("generated.Choisir un niveau") }}</option>
                                                        @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                            <option value="{{ $key }}">
                                                                {{ __($level) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-2 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Échelle") }}</span><span class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-technical-weight technical-weight"
                                                        id="technical-weight" name="weight" required>
                                                        <option >{{ __("generated.Choisir une échelle") }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-danger mb-2 mx-2 "
                                                type="button"
                                                style="font-size: 12px;float: right; margin-right: 0px !important;">{{ __("generated.Supprimer") }}</button>
                                            <button class="btn btn-theme btn-ajouter mb-2 mx-2 "
                                                type="button"
                                                style="font-size: 12px;float: right;background-color: #26b6ea;"
                                                id="addTechnicalSkill" data-form-id="profile-form-skills">{{ __("generated.Ajouter une compétence") }}</button>
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
<div class="row justify-content-center mb-4 py-2">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                <div class="row align-items-center">
                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences personnelles") }}</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center" style="padding: 12px 30px;">
                                    {{-- <h4 class="title custom-title  mb-5 ">{{ __("generated.Compétences personnelles") }}</h4> --}}

                                    <div id="personal-skills-list" class="col-10">
                                    </div>
                                    <div class="col-10 mb-4 personal-skill-row" style="">
                                        <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}"
                                            class="personal-profile_id" hidden readonly>
                                        <div class="row skill-container" style="padding-left: 21px;">
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Catégorie") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-category personal-category  fillter-personal-category"
                                                        id="personal-category" name="category">
                                                        <option value="Tous">{{ __("generated.Choisir une catégorie") }}</option>
                                                        @if (isset($personalSubTypes))
                                                            @foreach ($personalSubTypes as $subType)
                                                                <option value="{{ __($subType->id) }}">
                                                                    {{ __($subType->label) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Détail") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-skill main-personal-skill-name personal-skill fillter-personal-skill"
                                                        id="personal-skill" name="skill" required>
                                                        <option value="Tous">{{ __("generated.Choisir un détail") }}</option>
                                                        @if (isset($personalSkills))
                                                            @foreach ($personalSkills as $skill)
                                                                <option value="{{ __($skill->id) }}"
                                                                    data-skill-type="{{ $skill->skill_type_id ?? '' }}"
                                                                    data-skill-name="{{ __($skill->label) }}"
                                                                    data-level="{{ __($skill->level) }}">
                                                                    {{ __($skill->label) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-2 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Niveau") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-level personal-level"
                                                        id="personal-level" name="level" required>
                                                         <option>{{ __("generated.Choisir un niveau") }}</option>
                                                        @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                            <option value="{{ $key }}">
                                                                {{ __($level) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-2 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label><span >{{ __("generated.Échelle") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-weight personal-weight"
                                                        id="personal-weight" name="weight" required>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-danger mb-2 mx-2 "
                                                type="button"
                                                style="font-size: 12px;float: right; margin-right: 0px !important;">{{ __("generated.Supprimer") }}</button>
                                            <button class="btn btn-theme btn-ajouter mb-2 mx-2 "
                                                type="button"
                                                style="font-size: 12px;float: right;background-color: #26b6ea;"
                                                id="addPersonalSkill" data-form-id="profile-form-skills">{{ __("generated.Ajouter une compétence") }}</button>
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
<div class="row mt-5 mb-4 mx-4" style="float: right;margin-right: 11px">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" id="saveSkills">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-white btn-annuler  " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
