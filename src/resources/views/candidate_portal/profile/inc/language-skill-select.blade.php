@if (isset($skill) && !isset($profile))
    <div class="row">
        <div class="col-12 col-xl-6 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
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
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[{{ __($index) }}][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old("skills.{$index}.level", 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>Compréhension orale</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>Expression orale</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>Compréhension écrite</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>Expression écrite</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="">Grammaire</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Compétence <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                    id="languages-skill-0" name="skills[0][skill]" required>
                    <option value="" selected>Vocabulaire</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Niveau <span
                        class="text-themeColor">*</span></label>
                <select class="chosenoptgroup w-100 main-languages-level languages-level" id="country1M"
                    name="skills[0][level]" required>
                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                        <option value="{{ $key }}" @if (old('skills.{0}.level', 'B1') == $key) selected @endif>
                            {{ __($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6 col-xl-3 mb-2">
            <div class="rounded border poste-chosen"
                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;background-color: var(--adminux-theme-bg) !important;">
                <label style="margin-top: 8px;margin-left: 17px;color: #505050;font-size: 12px;">Échelle <span
                        class="text-themeColor">*</span></label>
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
            no_results_text: "Aucun résultat trouvé",
            placeholder_text_single: "Sélectionnez un choix",
        });
    });
</script>
