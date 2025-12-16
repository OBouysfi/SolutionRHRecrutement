<div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            {{-- <div class="col-auto">
                <i class="bi bi-tools h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
            </div> --}}
            <div class="col ps-0">
                <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences techniques") }}</h6>
            </div>
            <div class="col-auto">
                <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('4')">
                    <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Modifier"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 mb-4">
    <div class="card-body">
        @php
            $skillsByType = $profile->getSkillsByType();
        @endphp
        <div class="row justify-content-center" style="padding: 12px 30px;">
            <div id="technical-skills-list" class="col-12">
                @if (isset($skillsByType['technical']) && count($skillsByType['technical']) > 0)
                    @foreach ($skillsByType['technical'] as $skill)
                        <div class="filled-technical-skill-row mb-4">
                            <div class="row" style="padding-left: 21px;">
                                <div class="col-12 col-md-5 mb-2">
                                    <div  class="custom-multiple-select rounded border poste-chosen"
                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                        <label
                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"> {{ __("generated.Catégorie") }}</label>
                                        <select disabled
                                            class="chosenoptgroup w-100 filled-technical-category technical-category"
                                            readonly>
                                            <option value="{{ __($skill->skill?->skill_type_id) }}" selected>
                                                {{ __($skill->skill?->skillType->label) }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 mb-2">
                                    <div  class="custom-multiple-select rounded border poste-chosen"
                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                        <label
                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"> {{ __("generated.Détail") }}</label>
                                        <select disabled class="chosenoptgroup w-100 filled-technical-skill-name technical-skill"
                                            readonly>
                                            <option value="{{ __($skill->skill?->id) }}" selected>
                                                {{ __($skill->skill?->label) }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 mb-2" >
                                    <div  class="custom-multiple-select rounded border poste-chosen"
                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                        <label
                                            style="margin-top: 8px;margin-left: 17px;font-size: 12px;"> {{ __("generated.Niveau") }}</label>
                                        <select disabled class="chosenoptgroup w-100 filled-technical-level technical-level"
                                            readonly>
                                            @foreach (App\Enums\Skill\LevelSkillEnum::getAll() as $key => $level)
                                                <option value="{{ $key }}"
                                                    @if ($skill->level == $key) selected @endif>
                                                    {{ __($level) }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mb-4">
            <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('4')">
                <button class="btn btn-theme " type="button"
                    style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button></a>
        </div>
    </div>
</div>
