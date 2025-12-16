<div class="card border-0 mb-3 p-0" id="languages-skills-container">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences Linguistiques") }}</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 p-0">
                    <div class="card-body">
                        <div class="row justify-content-center" style="padding: 30px">
                            {{-- <h4 class="title custom-title  mb-5 ">{{ __("generated.Compétences Linguistiques") }}</h4> --}}
                            <div class="col-10">
                                @php
                                    $skillsByType = $profile->getProfileSkillsByType()['languages'];
                                @endphp
                                <div id="languages-container">
                                    @if (isset($skillsByType) && count($skillsByType) > 0)
                                        @foreach ($skillsByType as $language)
                                            <div>
                                                {{-- <div class="bg-light-theme card mb-4 shadow-lg border-0 rounded-lg block-view"
                                                    id="view-languages-{{ __($language->id) }}">
                                                    <div class="card-body p-4">
                                                        <div class="row align-items-center justify-content-between">
                                                            <div class="col-md-6">
                                                                <h5 class="text-info mb-3">{{ __($language->label) }}
                                                                </h5>
                                                                <p class="mb-2">
                                                                    <i class="bi bi-translate text-primary"></i>
                                                                    <strong >{{ __("generated.Langue:") }}</strong>
                                                                    {{ __($language->label) }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 text-end">
                                                                <button
                                                                    class="btn btn-outline-danger squered-pill px-3 delete-btn translated_text"
                                                                    data-form-name="languages"
                                                                    data-id="{{ __($language->id) }}"
                                                                    aria-label="Supprimer cette language">
                                                                    <i class="bi bi-trash3"></i>
                                                                </button>
                                                                <button
                                                                    class="btn btn-outline-info squered-pill px-3 translated_text"
                                                                    data-language-id="{{ __($language->id) }}"
                                                                    onclick="toggleFormationForm('languages', this.dataset.languageId, true)">
                                                                    <i class="bi bi-pen"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div id="form-languages-{{ __($language->id) }}"
                                                    class="edit-subform">
                                                    <form id="profile-language-{{ __($language->id) }}" method="POST"
                                                        class="mb-4" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="id"
                                                            value="{{ $language->id ?? '' }}" hidden readonly>
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 col-xl-3 mb-2">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12 mb-2">
                                                                        <div class="custom-multiple-select rounded border poste-chosen"
                                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                            <label class="translated_text">{{ __("generated.Langue") }}
                                                                                <span
                                                                                    class="text-themeColor">*</span></label>
                                                                            <select
                                                                                class="chosenoptgroup w-100 translated_text"
                                                                                id="language" name="language" required>
                                                                                <option value=""
                                                                                    >{{ __("generated.Sélectionner une langue") }}</option>
                                                                                <option value="{{ __($language->id) }}"
                                                                                    selected>
                                                                                    {{ __($language->label) }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-xl-9 mb-2">
                                                                @php
                                                                    $index = 0;
                                                                    $langSkills = $profile->languagesSkills(
                                                                        $language->id,
                                                                    );
                                                                @endphp
                                                                @foreach ($profile->languagesSkills($language->id) as $skill)
                                                                    <div class="row">
                                                                        <div class="col-12 col-xl-6 mb-2">
                                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                <label><span
                                                                                        >{{ __("generated.Compétence") }}</span>
                                                                                    <span
                                                                                        class="text-themeColor">*</span></label>
                                                                                <select
                                                                                    class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                                                                                    id="languages-skill-{{ __($skill->skill->id) }}"
                                                                                    name="skills[{{ __($index) }}][skill]"
                                                                                    required>
                                                                                    <option
                                                                                        value="{{ __($skill->skill->id) }}"
                                                                                        selected>
                                                                                        {{ __($skill->skill->label) }}
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-xl-3 mb-2">
                                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                <label><span
                                                                                        >{{ __("generated.Niveau") }}</span>
                                                                                    <span
                                                                                        class="text-themeColor">*</span></label>
                                                                                <select
                                                                                    class="chosenoptgroup w-100 main-languages-level languages-level"
                                                                                    id="country1M"
                                                                                    name="skills[{{ __($index) }}][level]"
                                                                                    required>
                                                                                    <option>{{ __("generated.Choisir un niveau") }}</option>
                                                                                    @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                                                                                        <option
                                                                                            value="{{ $key }}"
                                                                                            @if ($skill->level == $key) selected @endif>
                                                                                            {{ __($level) }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-xl-3 mb-2">
                                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                                <label><span
                                                                                        >{{ __("generated.Échelle") }}</span>
                                                                                    <span
                                                                                        class="text-themeColor">*</span></label>
                                                                                <select
                                                                                    class="chosenoptgroup w-100 main-languages-weight languages-weight"
                                                                                    id="country1M"
                                                                                    name="skills[{{ __($index) }}][weight]"
                                                                                    required>
                                                                                    <option >{{ __("generated.Choisir une échelle") }}</option>
                                                                                    <option value="1"
                                                                                        @if ($skill->weight == 1) selected @endif>
                                                                                        1</option>
                                                                                    <option value="2"
                                                                                        @if ($skill->weight == 2) selected @endif>
                                                                                        2</option>
                                                                                    <option value="3"
                                                                                        @if ($skill->weight == 3) selected @endif>
                                                                                        3</option>
                                                                                    <option value="4"
                                                                                        @if ($skill->weight == 4) selected @endif>
                                                                                        4</option>
                                                                                    <option value="5"
                                                                                        @if ($skill->weight == 5) selected @endif>
                                                                                        5</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                        $index++;
                                                                    @endphp
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-4"
                                                                style="padding-right: 0;margin-right: 0px;">

                                                                <button class="btn btn-danger mb-2 mx-2 "
                                                                    type="button"
                                                                    data-language-id="{{ __($language->id) }}" onclick="deleteForm('languages', this.dataset.languageId)" style="font-size: 12px; float: right;">{{ __("generated.Supprimer") }}</button>
                                                                <button
                                                                    class="btn btn-theme btn-ajouter mb-2 mx-2 "
                                                                    type="button"
                                                                    onclick="updateForm('languages',4 , 'profile-language-{{ __($language->id) }}')" style="float: right; margin-right: 10px;">{{ __("generated.Modifier") }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <br>
                                                    <hr>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <br>
                                <form id="profile-form-languages" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-xl-3 mb-2">
                                            <div class="row">
                                                <div class="col-12 col-md-12 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label>{{ __("generated.Langue") }}</label>
                                                        {{-- <select class="chosenoptgroup w-100" id="languages-language"
                                                            name="language" required>
                                                            <option value="">Sélectionner une langue
                                                            </option>
                                                            @if (isset($languagesSubTypes) && count($languagesSubTypes) > 0)
                                                                @foreach ($languagesSubTypes as $subType)
                                                                    <option value="{{ __($subType->id) }}">
                                                                        {{ __($subType->label) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select> --}}

                                                        <select class="form-control select2" id="languages-language" name="language" required>
                                                            <option value="">{{ __("generated.Sélectionner une langue") }}</option>
                                                            @if (isset($languagesSubTypes) && count($languagesSubTypes) > 0)
                                                                @foreach ($languagesSubTypes as $subType)
                                                                    <option value="{{ __($subType->id) }}">{{ __($subType->label) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="language-skills-container" class="col-12 col-xl-9 mb-2">
                                            @include('profile.inc.language-skill-select')
                                        </div>

                                        <div class="col-12 mt-4" style="padding-right: 0;margin-right: 0px;">
                                            <button class="btn btn-danger mb-2 mx-2" type="button"
                                                style="font-size: 12px; float: right;">{{ __("generated.Supprimer") }}</button>
                                            <button class="btn btn-theme btn-ajouter mb-2 mx-2" type="button"
                                                onclick="saveForm('languages', 4)"
                                                data-form-id="profile-form-languages"
                                                style="float: right; margin-right: 10px;">{{ __("generated.Ajoute une langue") }}</button>
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
<div class="row mt-3 mb-4" style="float: right">
    <div class="col-auto">
        <button class="btn btn-theme" type="button" onclick="switchToNextTab(5)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
