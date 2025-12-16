<div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            {{-- <div class="col-auto">
                <i class="bi bi-translate h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
            </div> --}}
            <div class="col ps-0">
                <h6 class="fw-medium mb-0 ">{{ __("generated.Langues") }}</h6>
            </div>
            <div class="col-auto">
                <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('5')">
                    <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Modifier"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@php
    $languages = $profile->getProfileSkillsByType()['languages'];
@endphp
@foreach ($languages as $language)
    <div class="card border-0 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 19px 30px 0;">
                            <form id="profile-form-languages" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 col-lg-3 mb-4">
                                        <div class="row">
                                            <div class="col-12 col-md-12 mb-2">
                                                <div  class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                    <label
                                                        style="margin-top: 8px;margin-left: 17px;font-size: 12px;" >{{ __("generated.Langue") }}</label>
                                                    <select disabled class="chosenoptgroup w-100" id="languages-language"
                                                        name="language" required>
                                                        {{-- <option value="">Sélectionner une langue
                                </option> --}}
                                                        {{-- @if (isset($languagesSubTypes) && count($languagesSubTypes) > 0)
                                    @foreach ($languagesSubTypes as $subType) --}}
                                                        <option value="{{ __($language->id) }}">
                                                            {{ __($language->label) }}</option>
                                                        {{-- @endforeach
                                @endif --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="language-skills-container" class="col-12 col-md-9 mb-4">
                                        @if (isset($language->skills) && count($language->skills) > 0)
                                            @foreach ($language->skills as $languageSkill)
                                                <div class="row mb-4">
                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div  class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;font-size: 12px;" >{{ __("generated.Compétence") }}</label>
                                                            <select disabled
                                                                class="chosenoptgroup w-100 main-languages-skill languages-skill fillter-languages-skill"
                                                                id="languages-skill-{{ __($languageSkill->id) }}" required>
                                                                {{-- @if (isset($language->skills) && count($language->skills) > 0)
                                            @foreach ($language->skills as $languageSkill)
                                                --}}
                                                                <option value="{{ __($languageSkill->id) }}" selected>
                                                                    {{ __($languageSkill->label) }}
                                                                </option>
                                                                {{-- @endif
                                            @endforeach 
                                        @endif --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-2">
                                                        <div  class="custom-multiple-select rounded border poste-chosen"
                                                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                            <label
                                                                style="margin-top: 8px;margin-left: 17px;font-size: 12px;" >{{ __("generated.Niveau") }}</label>
                                                            <select disabled
                                                                class="chosenoptgroup w-100 main-languages-level languages-level"
                                                                id="country1M" required>
                                                                @foreach (App\Enums\Skill\LanguageLevelEnum::getAll() as $key => $level)
                                                                    <option value="{{ $key }}" selected>
                                                                        {{ __($level) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="row">
    <div class="col-12  mb-4">
        <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('5')">
            <button class="btn btn-theme " type="button"
                style="font-size: 12px;float: right;margin-right: 10px">  {{ __("generated.Modifier") }}</button></a>
    </div>
</div>
