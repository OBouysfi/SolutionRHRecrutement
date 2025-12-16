<div class="card border-0 mb-3">
    <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            <h6 class="fw-medium mb-0 ">{{ __("generated.Compétences Linguistiques") }}</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row justify-content-center" style="padding: 30px">
                            {{-- <h4 class="title custom-title  mb-5 ">{{ __("generated.Compétences Linguistiques") }}</h4> --}}
                            <div class="col-10">
                                <div id="languages-container">
                                </div>
                                <form id="profile-form-languages" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-xl-3 mb-2">
                                            <div class="row">
                                                <div class="col-12 col-md-12 mb-2">
                                                    <div class="custom-multiple-select rounded border poste-chosen"
                                                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                        <label><span >{{ __("generated.Langue") }}</span><span
                                                                class="text-themeColor">*</span></label>
                                                        <select class="chosenoptgroup w-100" id="languages-language"
                                                            name="language" required>
                                                            <option value="" >{{ __("generated.Sélectionner une langue") }}</option>
                                                            @if (isset($languagesSubTypes) && count($languagesSubTypes) > 0)
                                                                @foreach ($languagesSubTypes as $subType)
                                                                    <option value="{{ __($subType->id) }}">
                                                                        {{ __($subType->label) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Language skills will dynamically populate here -->
                                        <div id="language-skills-container" class="col-12 col-xl-9 mb-2">
                                            @include('profile.inc.language-skill-select')
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-10 mt-4" style="padding-right: 0;margin-right: 0px;">
                                <button class="btn btn-danger mb-2 mx-2 " type="button"
                                    style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                <button class="btn btn-theme btn-ajouter mb-2 mx-2 " type="button"
                                    onclick="saveForm('languages', 4)" data-form-id="profile-form-languages"
                                    style="font-size: 12px;float: right;margin-right: 10px; background-color: #26b6ea;">{{ __("generated.Ajouter une langue") }}</button>
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
        <button class="btn btn-theme translated_text" type="button" onclick="switchToNextTab(5)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler translated_text" type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
