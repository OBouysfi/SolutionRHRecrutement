<div class="row justify-content-center mb-4 ">
    <div class="col-12">
        <div class="card border-0 p-0">
            <div class="card-header bg-gradient-theme-light">
                <div class="row align-items-center">
                    <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences techniques") }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row justify-content-center" style="padding: 12px 30px;">
                                    {{-- <h4 class="title custom-title  mb-5 ">{{ __("generated.Compétences techniques") }}</h4> --}}
                                    @php
                                        $skillsByType = $profile->getSkillsByType();
                                    @endphp
                                    <div id="technical-skills-list" class="col-10">
                                        @if (isset($skillsByType['technical']) && count($skillsByType['technical']) > 0)
                                            @foreach ($skillsByType['technical'] as $skill)
                                                <div class="filled-technical-skill-row mb-4">
                                                    <div class="row" style="padding-left: 21px;">
                                                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label class="translated_text">{{ __("generated.Catégorie") }}
                                                                    <span class="text-themeColor">*</span></label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-technical-category technical-category"
                                                                    readonly>
                                                                     <option value="Tous">{{ __("generated.Choisir une catégorie") }}</option>
                                                                    <option value="{{ __($skill->skill?->skill_type_id) }}"
                                                                        selected>
                                                                        {{ __($skill->skill?->skillType->label) }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label class="translated_text">{{ __("generated.Détail") }}
                                                                    <span class="text-themeColor">*</span></label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-technical-skill-name technical-skill"
                                                                    readonly>
                                                                    <option value="Tous">{{ __("generated.Choisir un détail") }}</option>
                                                                    <option value="{{ __($skill->skill?->id) }}" selected>
                                                                        {{ __($skill->skill?->label) }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-5 col-lg-2 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label class="translated_text">{{ __("generated.Niveau") }}
                                                                    <span class="text-themeColor">*</span></label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-technical-level technical-level"
                                                                    readonly>
                                                                    <option>{{ __("generated.Choisir un niveau") }}</option>
                                                                    @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                                        <option value="{{ $key }}"
                                                                            @if ($skill->level == $key) selected @endif>
                                                                            {{ __($level) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-5 col-lg-2 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label class="translated_text">{{ __("generated.Échelle") }}
                                                                    <span class="text-themeColor">*</span></label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-technical-weight technical-weight"
                                                                    readonly>
                                                                    <option >{{ __("generated.Choisir une échelle") }}</option>
                                                                    <option value="{{ __($skill->weight) }}" selected>
                                                                        {{ __($skill->weight) }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-2 col-lg-1 mt-2">
                                                            <button
                                                                class="btn btn-outline-danger squered-pill px-3 remove-technical-skill"
                                                                type="button" style="float: right;">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <form class="col-10 mb-4 technical-skill-row" id="addTechSkillForm" style="">
                                        <input type="hidden" name="id[]" value="{{ $skill->id ?? '' }}"
                                            class="technical-id" readonly>
                                        <div class="row" style="padding-left: 21px;">
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text">{{ __("generated.Catégorie") }}
                                                        <span class="text-themeColor">*</span></label>
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
                                                    <label class="translated_text">{{ __("generated.Détail") }}
                                                        <span class="text-themeColor">*</span></label>
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
                                                    <label class="translated_text">{{ __("generated.Niveau") }}
                                                        <span class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-technical-level technical-level"
                                                        id="technical-level" name="level[]" required>
                                                        <option>{{ __("generated.Choisir un niveau") }}</option>
                                                        @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                            <option @if (isset($skill) && $skill?->skill?->level == $key) selected @endif
                                                                value="{{ $key }}">
                                                                {{ __($level) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-2 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label class="translated_text">{{ __("generated.Échelle") }}
                                                        <span class="text-themeColor">*</span></label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-technical-weight technical-weight"
                                                        id="technical-weight" name="weight[]" required>
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
                                            <button class="btn btn-danger " type="button"
                                                style="font-size: 12px; float: right; margin-right: 0px !important;">{{ __("generated.Supprimer") }}</button>
                                            <button class="btn btn-theme btn-ajouter " type="button"
                                                style="float: right; margin-right: 10px;" id="addTechnicalSkill">{{ __("generated.Ajouter une compétence") }}</button>
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
</div>
<div class="row justify-content-center mb-4 py-2">
    <div class="col-12">
        <div class="card border-0 p-0">
            <div class="card-header bg-gradient-theme-light">
                <div class="row align-items-center">
                    <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences personnelles") }}</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="row justify-content-center" style="padding: 12px 30px;">
                                    {{-- <h4 class="title custom-title  mb-5 ">{{ __("generated.Compétences personnelles") }}</h4> --}}
                                    <div id="personal-skills-list" class="col-10">
                                        @if (isset($skillsByType['personal']) && count($skillsByType['personal']) > 0)
                                            @foreach ($skillsByType['personal'] as $skill)
                                                <div class="filled-personal-skill-row mb-4">
                                                    <div class="row" style="padding-left: 21px;">
                                                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label >{{ __("generated.Catégorie") }}</label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-personal-category personal-category"
                                                                    readonly>
                                                                    <option value="Tous">{{ __("generated.Choisir une catégorie") }}</option>
                                                                    <option
                                                                        value="{{ __($skill->skill?->skill_type_id) }}"
                                                                        selected>
                                                                        {{ __($skill->skill?->skillType->label) }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label >{{ __("generated.Détail") }}</label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-personal-skill-name personal-skill"
                                                                    readonly>
                                                                    <option value="Tous">{{ __("generated.Choisir un détail") }}</option>
                                                                    <option value="{{ __($skill->skill?->id) }}" selected>
                                                                        {{ __($skill->skill?->label) }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-5 col-lg-2 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label >{{ __("generated.Niveau") }}</label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-personal-level personal-level"
                                                                    readonly>
                                                                    <option>{{ __("generated.Choisir un niveau") }}</option>
                                                                    @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                                        <option value="{{ $key }}"
                                                                            class="translated_text"
                                                                            @if ($skill->level == $key) selected @endif>
                                                                            {{ __($level) }}
                                                                        </option>
                                                                    @endforeach
                                                                    {{-- @if ($skill->level)
                                                                        <option value="{{ __($skill->level) }}" selected>
                                                                            {{ App\Enums\Skill\LevelSkillEnum::getValue($skill->level) }}
                                                                        </option>
                                                                    @else
                                                                        <option value="3" selected>
                                                                            {{ App\Enums\Skill\LevelSkillEnum::getValue(3) }}
                                                                        </option>
                                                                    @endif --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 col-md-5 col-lg-2 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label >{{ __("generated.Échelle") }}</label>
                                                                <select
                                                                    class="chosenoptgroup w-100 filled-personal-weight personal-weight"
                                                                    readonly>
                                                                    <option >{{ __("generated.Choisir une échelle") }}</option>
                                                                    @if ($skill->weight)
                                                                        <option value="{{ __($skill->weight) }}" selected>
                                                                            {{ __($skill->weight) }}</option>
                                                                    @else
                                                                        <option value="3" selected>
                                                                            3
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-2 col-lg-1  mt-2">
                                                            <button
                                                                class="btn btn-outline-danger squered-pill px-3 remove-personal-skill"
                                                                type="button" style="float: right;">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="col-10 mb-4 personal-skill-row" style="">
                                        <input type="hidden" name="id[]" value="{{ $skill->id ?? '' }}"
                                            class="personal-id" readonly>
                                        <div class="row" style="padding-left: 21px;">
                                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label >{{ __("generated.Catégorie") }}</label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-category main-personal-skill-name personal-category fillter-personal-category"
                                                        id="personal-category" name="category">
                                                        <option value="Tous">{{ __("generated.Choisir une catégorie") }}</option>
                                                        @if (isset($personalSubTypes))
                                                            @foreach ($personalSubTypes as $subType)
                                                                <option value="{{ __($subType->id) }}"
                                                                    data-level="{{ __($subType->level) }}">
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
                                                    <label >{{ __("generated.Détail") }}</label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-skill personal-skill fillter-personal-skill"
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
                                                    <label >{{ __("generated.Niveau") }}</label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-level personal-level"
                                                        id="personal-level" name="level[]" required>
                                                        <option>{{ __("generated.Choisir un niveau") }}</option>
                                                        @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                            <option @if (isset($skill) && $skill?->skill?->level == $key) selected @endif
                                                                value="{{ $key }}">
                                                                {{ __($level) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-6 col-lg-2 mb-2">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label >{{ __("generated.Échelle") }}</label>
                                                    <select
                                                        class="chosenoptgroup w-100 main-personal-weight personal-weight"
                                                        id="personal-weight" name="weight[]" required>
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
                                            <button class="btn btn-danger " type="button"
                                                style="font-size: 12px; float: right; margin-right: 0px !important;">{{ __("generated.Supprimer") }}</button>
                                            <button class="btn btn-theme btn-ajouter " type="button"
                                                style="float: right; margin-right: 10px;" id="addPersonalSkill">{{ __("generated.Ajouter une compétence") }}</button>
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
<div class="row mt-3 mb-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" id="updateSkills">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
