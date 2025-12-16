<div class="row justify-content-center">
    <div class="col-11">
        <div class="card border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div id="experiences-container">
                            @if (isset($experiences))
                                @foreach ($experiences as $experience)
                                    <div>
                                        {{-- <div class="bg-light-theme card mb-4 shadow-lg border-0 rounded-lg block-view experience-view"
                                            id="view-experiences-{{ __($experience->id) }}">
                                            <div class="card-body p-4">
                                                <div class="row align-items-center justify-content-between">
                                                    @if (isset($experience->logo))
                                                        <div class="col-md-2 text-center">
                                                            <img src="{{ $experience->getLogoUrl() ?? asset('assets/img/default-company-logo.png') }}"
                                                                alt="Logo"
                                                                class="img-fluid rounded-circle shadow-sm"
                                                                style="width: 80px; height: 80px; object-fit: cover;">
                                                        </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <h5 class="text-info mb-3">
                                                            {{ $experience->profession->label ?? 'Poste inconnue' }}
                                                        </h5>
                                                        <p class="mb-2"><i class="bi bi-calendar-event text-info"></i>
                                                            <strong>Début :</strong>
                                                            {{ $experience->started_at->format('Y-m-d') ?? 'Non disponible' }}
                                                        </p>
                                                        <p class="mb-2"><i
                                                                class="bi bi-calendar-check text-success"></i>
                                                            <strong>Fin :</strong>
                                                            {{ $experience->finished_at->format('Y-m-d') ?? 'Non disponible' }}
                                                        </p>
                                                        <p class="mb-2"><i class="bi bi-briefcase text-warning"></i>
                                                            <strong>Entreprise :</strong>
                                                            {{ $experience->company ?? 'Entreprise inconnue' }}
                                                        </p>
                                                    </div>
                                                    <!-- Action Buttons -->
                                                    <div class="col-md-4 text-end">
                                                        <button
                                                            class="btn btn-outline-danger squered-pill px-3 delete-btn"
                                                            data-form-name="experiences" data-id="{{ __($experience->id) }}"
                                                            aria-label="Supprimer cette expérience">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info squered-pill px-3"
                                                            data-experience-id="{{ __($experience->id) }}"
                                                            onclick="toggleFormationForm('experiences', this.dataset.experienceId, true)">
                                                            <i class="bi bi-pen"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div id="form-experiences-{{ __($experience->id) }}" class="edit-subform">
                                            <form id="profile-experience-{{ __($experience->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="id"
                                                    value="{{ $experience->id ?? '' }}" hidden readonly>
                                                <div class="card border-0">
                                                    <div class="card-body" style="padding: 30px">
                                                        <div class="row mb-3">
                                                            <div class="col-12 col-md-4 col-xl-2">
                                                                <div class="col-auto position-relative"
                                                                    style="width: 150px;">
                                                                    <figure
                                                                        class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                        style="background-image: url(&quot;{{ __($experience->logo) }}&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                                        <img src="{{ $experience->getLogoUrl() }}"
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
                                                            <div class="col-12 col-md-4 col-xl-3"
                                                                style="margin-top: 15px;">
                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="text" placeholder="Entreprise"
                                                                            required value="{{ __($experience->company) }}"
                                                                            name="company"
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label><span >{{ __("generated.Entreprise") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                                @error('company')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 col-md-4 col-xl-3"
                                                                style="margin-top: 15px;">
                                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                                    style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                    <label><span >{{ __("generated.Poste") }}</span>
                                                                        <span class="text-themeColor">*</span></label>
                                                                    <select class="chosenoptgroup w-100"
                                                                        name="profession_id" id="profession">
                                                                        <option value="" selected
                                                                            >{{ __("generated.Choisissez un poste") }}</option>
                                                                        @if (isset($posts))
                                                                            @foreach ($posts as $post)
                                                                                <option value="{{ $post->id ?? '' }}"
                                                                                    @if ($experience->profession_id == $post->id) selected @endif>
                                                                                    {{ __($post->label ?? '_' )}}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                @error('profession_id')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 col-md-4 col-xl-2"
                                                                style="margin-top: 15px;">
                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="date" placeholder="Date début"
                                                                            name="started_at" required
                                                                            value="{{ \Carbon\Carbon::parse($experience->started_at)->format('Y-m-d') }}"
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label><span >{{ __("generated.Date début") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                                @error('started_at')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <!-- Fixed HTML Structure -->
                                                            <div class="col-12 col-md-4 col-xl-2" style="margin-top: -25px;">
                                                                <div class="mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-check form-switch">
                                                                        <!-- Fixed: Removed duplicate class attribute and ID conflict -->
                                                                        <input class="form-check-input current_job" type="checkbox" name="current_job" @if ($experience->current_job) checked @endif value="1">
                                                                        <label class="form-check-label">{{ __("generated.Current Position") }}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="date" placeholder="{{ __("generated.Date fin") }}" name="finished_at"
                                                                            value="{{ \Carbon\Carbon::parse($experience->finished_at)->format('Y-m-d') }}"
                                                                            required class="form-control border-start-0 translated_text finished_at">
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
                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="date" placeholder="Date fin"
                                                                            name="finished_at" required
                                                                            value="{{ \Carbon\Carbon::parse($experience->finished_at)->format('Y-m-d') }}"
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label><span >{{ __("generated.Date fin") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                                @error('finished_at')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div> -->
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-12 mb-4">
                                                                <h4 class="title custom-title  mt-4 ">{{ __("generated.Projets réalisés") }}</h4>
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-5">
                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="text" placeholder="Projet"
                                                                            name="project_name" required
                                                                            value="{{ __($experience->project_name) }}"
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label >{{ __("generated.Projet") }}</label>
                                                                    </div>
                                                                </div>
                                                                @error('project_name')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-5">
                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            placeholder="Compétences technique"
                                                                            name="skills_tech" required
                                                                            value="{{ __($experience->skills_tech) }}"
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label><span >{{ __("generated.Compétences technique") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                                @error('skills_tech')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-2">
                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <input type="date" placeholder="Date"
                                                                            name="date" required
                                                                            value="{{ \Carbon\Carbon::parse($experience->date)->format('Y-m-d') }}"
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label >{{ __("generated.Date") }}</label>
                                                                    </div>
                                                                </div>
                                                                @error('date')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 col-md-6 col-lg-12">

                                                                <div
                                                                    class="form-group mb-3 position-relative is-valid check-valid">
                                                                    <div class="form-floating">
                                                                        <textarea placeholder="{{ __("generated.Déscriptif") }}" class="form-control border-start-0 h-auto" rows="6" name="description">{{ __($experience->description) }}</textarea>
                                                                        <label
                                                                            >{{ __("generated.Déscriptif") }}</label>
                                                                    </div>
                                                                </div>
                                                                @error('description')
                                                                    <div class="invalid-feedback mb-3">{{ __($message) }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 mt-4 mb-4">
                                                                    <button class="btn btn-danger "
                                                                        type="button"
                                                                        data-experience-id="{{ __($experience->id) }}" onclick="deleteForm('experiences', this.dataset.experienceId)" style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                                                    <button
                                                                        class="btn btn-theme btn-ajouter "
                                                                        type="button"
                                                                        onclick="updateForm('experiences', 2, 'profile-experience-{{ __($experience->id) }}')" data-form-id="update-profile-form-experiences" style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                                                    <label><span >{{ __("generated.Entreprise") }}</span><span
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
                                                <label >{{ __("generated.Poste") }}</label>
                                                <select class="chosenoptgroup w-100" name="profession_id"
                                                    id="profession">
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
                                            @error('profession_id')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-4 col-xl-2" style="margin-top: 15px;">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="date" placeholder="{{ __("generated.Date début") }}" name="started_at"
                                                        required class="form-control border-start-0 translated_text">
                                                    <label><span >{{ __("generated.Date début") }}</span><span
                                                            class="text-themeColor">*</span></label>
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
                                                    <label><span >{{ __("generated.Date fin") }}</span><span
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

                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <h6 class="fw-medium mb-0 ">{{ __("generated.Projets réalisés") }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="card-header bg-gradient-theme-light">
                                            <div class="row align-items-center">
                                                <h6 class="fw-medium mb-0 ">{{ __("generated.Projets réalisés") }}</h6>
                                            </div>
                                        </div> --}}
                                        <br>

                                        <div class="col-12 col-md-6 col-lg-5">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="{{ __("generated.Projet") }}" name="project_name"
                                                        required class="form-control border-start-0 translated_text">
                                                    <label >{{ __("generated.Projet") }}</label>
                                                </div>
                                            </div>
                                            @error('project_name')
                                                <div class="invalid-feedback mb-3">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-5">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <input type="text" placeholder="{{ __("generated.Compétences technique") }}"
                                                        id="techTags" name="skills_tech" required
                                                        class="form-control border-start-0 translated_text">
                                                    <label><span >{{ __("generated.Compétences technique") }}</span></label>
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
                                            <button class="btn btn-theme btn-ajouter " type="button"
                                                onclick="saveForm('experiences', 2)"
                                                data-form-id="profile-form-experiences"
                                                style="font-size: 12px;float: right;margin-right: 10px;">{{ __("generated.Ajouter") }}</button>

                                            <button class="btn btn-danger " type="button"
                                                style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Supprimer") }}</button>

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
<div class="row mt-5 mb-4" style="float: right;margin-right: 48px">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" onclick="switchToNextTab(3)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>
