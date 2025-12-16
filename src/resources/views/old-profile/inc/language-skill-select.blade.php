@if (isset($skill) && !isset($profile))
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-{{ __($skill->id) }}" name="skills[{{ __($index) }}][skill]" required>
                    {{-- <option value="">Sélectionner une compétence</option> --}}
                    @if (isset($languagesSkills) && count($languagesSkills) > 0)
                        @foreach ($languagesSkills as $languageSkill)
                            @if ($skill->id == $languageSkill->id)
                                <option value="{{ __($languageSkill->id) }}"
                                    @if ($skill->id == $languageSkill->id) selected @endif>
                                    {{ __($languageSkill->label) }}
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[{{ __($index) }}][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old("skills.{$index}.level", 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[{{ __($index) }}][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>{{ __("generated.Compréhension orale") }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[0][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>{{ __("generated.Expression orale") }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span><span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[0][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span><span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>{{ __("generated.Compréhension écrite") }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[0][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>{{ __("generated.Expression écrite") }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[0][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="">{{ __("generated.Grammaire") }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[0][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Compétence") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>{{ __("generated.Vocabulaire") }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-4 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Niveau") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                     <option>{{ __("generated.Choisir un niveau") }}</option>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-2 mb-2">
            <div  class="custom-multiple-select rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                <label  ><span
                        >{{ __("generated.Échelle") }}</span> <span class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-weight languages-weight" id="country1M"
                    name="skills[0][weight]" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </div>
@endif
<script>
    $(document).ready(function() {
        $('select').chosen({
            width: '100%',
            no_results_text: "{{ __("generated.Aucun résultat trouvé") }}",
            placeholder_text_single: "{{ __("generated.Sélectionnez un choix") }}",
        });
    });
</script>
