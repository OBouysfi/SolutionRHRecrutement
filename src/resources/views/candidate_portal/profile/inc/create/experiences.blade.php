<div class="row justify-content-center">
    <div class="col-11">
        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div id="experiences-container">
                        </div>
                        <form id="profile-form-experiences" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="profile_id" value="{{ $profile_id ?? '' }}" hidden readonly>
                            <div class="card border-0">
                                <div class="card-body" style="padding: 30px">
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-4 col-xl-2">
                                            <div class="col-auto position-relative" style="width: 150px;">
                                                <figure
                                                    class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                    style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                    <img src="{{ asset('assets/img/icon/empty-logo.png') }}"
                                                        alt="" style="display: none;">
                                                </figure>
                                                <div
                                                    class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto custom-image-logo">
                                                    <label
                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                        <i class="bi bi-camera"></i>
                                                        <input type="file" name="logo"
                                                            class="custom-file-input experience-logo"
                                                            id="experience-logo" accept="image/*" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-xl-3" style="margin-top: 15px;">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="{{ __("generated.Entreprise") }}" required
                                                        name="company"
                                                        class="form-control border-start-0 translated_text">
                                                    <label class="translated_text"><span
                                                            >{{ __("generated.Entreprise") }}</span> <span
                                                            class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                            @error('company')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4 col-xl-3" style="margin-top: 15px;">
                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                <label><span >{{ __("generated.Poste") }}</span>
                                                    <span class="text-themeColor">*</span></label>
                                                <select class="chosenoptgroup w-100" name="profession_id"
                                                    class="form-control border-start-0 translated_text">
                                                    <option value="" selected >{{ __("generated.Choisissez un poste") }}</option>
                                                    @if (isset($posts))
                                                        @foreach ($posts as $post)
                                                            <option value="{{ $post->id ?? '' }}">
                                                                {{ __($post->label ?? '_' )}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-xl-2" style="margin-top: 15px;">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="date" placeholder="{{ __("generated.Date début") }}" name="started_at"
                                                        required class="form-control border-start-0 translated_text">
                                                    <label class="translated_text"><span >{{ __("generated.Date début") }}</span><span class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                            @error('started_at')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4 col-xl-2" style="margin-top: -25px;">
                                            <div class="mb-3 position-relative is-valid check-valid">
                                                <div class="form-check form-switch">
                                                    <!-- Fixed: Removed duplicate class attribute and ID conflict -->
                                                    <input class="form-check-input current_job" type="checkbox" name="current_job" value="1">
                                                    <label class="form-check-label">{{ __("generated.Current Position") }}</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="date" placeholder="{{ __("generated.Date fin") }}" name="finished_at"
                                                        required class="form-control border-start-0 translated_text">
                                                    <label class="translated_text"><span>{{ __("generated.Date fin") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                            @error('finished_at')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <!-- <div class="col-12 col-md-4 col-xl-2"
                                            style="padding-right: 0;margin-top: 15px;">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="date" placeholder="{{ __("generated.Date fin") }}" name="finished_at"
                                                        required class="form-control border-start-0 translated_text">
                                                    <label class="translated_text"><span >{{ __("generated.Date fin") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                            @error('finished_at')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div> -->
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 mb-4">
                                            {{-- <h4 class="title custom-title  mt-4 ">{{ __("generated.Projets réalisés") }}</h4> --}}
                                            <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Projets réalisés") }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-5">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="{{ __("generated.Projet") }}" name="project_name"
                                                        required class="form-control border-start-0 translated_text">
                                                    <label >{{ __("generated.Projet") }}</label>
                                                </div>
                                            </div>
                                            @error('project')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-5">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="{{ __("generated.Compétences technique") }}"
                                                        id="techTags" name="skills_tech" required
                                                        class="form-control border-start-0 translated_text">
                                                    <label class="translated_text">{{ __("generated.Compétences technique") }}</label>
                                                </div>
                                            </div>
                                            @error('skills_tech')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-2">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="date" placeholder="{{ __("generated.Date") }}" name="date" required
                                                        class="form-control border-start-0 translated_text">
                                                    <label >{{ __("generated.Date") }}</label>
                                                </div>
                                            </div>
                                            @error('date')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12">

                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <textarea placeholder="{{ __("generated.Déscriptif") }}" class="form-control border-start-0 h-auto" rows="6" name="description"></textarea>
                                                    <label >{{ __("generated.Déscriptif") }}</label>
                                                </div>
                                            </div>
                                            @error('description')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button class="btn btn-danger " type="button"
                                                style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Supprimer") }}</button>
                                            <button class="btn btn-theme btn-ajouter " type="button"
                                                onclick="saveForm('experiences', 2)"
                                                data-form-id="profile-form-experiences"
                                                style="font-size: 12px;float: right;margin-right: 10px; background-color: #26b6ea;">{{ __("generated.Ajouter") }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<style>
    .col-12.col-md-6.col-lg-2.custom-mrg {
        margin-right: -16px;
    }
</style>
<div class="row mt-5 mb-4 mx-4" style="float: right;margin-right: 48px">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" onclick="switchToNextTab(3)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
