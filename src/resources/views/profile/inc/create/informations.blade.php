<form id="profile-form-informations" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center" style="padding: 5px 23px">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                    <div class="row align-items-center">
                                        <h6 class="fw-medium mb-0 ">{{ __("generated.Informations personnelles") }}</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row" style="padding-left: 15px">
                                        <div class="col-12">
                                            {{-- <h4 class="title custom-title mt-4 mb-5 ">{{ __("generated.Informations personnelles") }}</h4> --}}
                                            <div class="row justify-content-center">
                                                <div class="col-9">
                                                    <div class="row">
                                                        <div class="col-12 col-md-2 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label><span >{{ __("generated.Civilité") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                                <select class="chosenoptgroup w-100" id="civility"
                                                                    name="civility">
                                                                    {{-- <option value="Tous" selected>Tous</option> --}}
                                                                    <option value="1" >{{ __("generated.M.") }}</option>
                                                                    <option value="2" >{{ __("generated.Mme") }}</option>
                                                                    <option value="3" 
                                                                        selected>{{ __("generated.Mlle") }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Prénom -->
                                                        <div class="col-12 col-md-5 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="first_name" name="first_name"
                                                                            placeholder="{{ __("generated.Prénom") }}" required>
                                                                        <label for="first_name"><span
                                                                                >{{ __("generated.Prénom") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('first_name')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Nom -->
                                                        <div class="col-12 col-md-5 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="last_name" name="last_name"
                                                                            placeholder="{{ __("generated.Nom") }}" required>
                                                                        <label for="last_name"><span
                                                                                >{{ __("generated.Nom") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('last_name')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <!-- Situation Familiale -->
                                                        <div class="col-12 col-md-3 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label><span >{{ __("generated.Situation familiale") }}</span></label>
                                                                <select class="chosenoptgroup w-100"
                                                                    id="family_situation" name="family_situation">
                                                                    <option>{{ __("generated.Choisir une situation") }}</option>
                                                                    @foreach (App\Enums\Profile\SituationEnum::getAll() as $key => $level)
                                                                        <option value="{{ __($level) }}">
                                                                            {{ __($level) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Date de naissance -->
                                                        <div class="col-12 col-md-3 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="date"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="birth_date" name="birth_date" required>
                                                                        <label for="birth_date"><span
                                                                                >{{ __("generated.Date de naissance") }}</span> </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('birth_date')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Lieu de naissance -->
                                                        <div class="col-12 col-md-3 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="birth_place" name="birth_place"
                                                                            placeholder="{{ __("generated.Lieu de naissance") }}" required>
                                                                        <label for="birth_place"><span
                                                                                >{{ __("generated.Lieu de naissance") }}</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('birth_place')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Nationalité -->
                                                        <div class="col-12 col-md-3 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                {{-- <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="nationality" name="nationality"
                                                                            placeholder="{{ __("generated.Nationalité") }}" required>  --}}
                                                                <label><span >{{ __("generated.Nationalité") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                                <select class="chosenoptgroup w-100"
                                                                    name="nationality" id="nationality">
                                                                    <option>{{ __("generated.Choisir une nationalité") }}</option>
                                                                    @if (isset($countries))
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id ?? '' }}"
                                                                                {{-- data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png" --}}
                                                                                data-country="{{ $country?->country_id ?? '' }}">
                                                                                {{ __($country->name ?? '_' )}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                {{-- <label for="nationality">Nationalité <span
                                                                                class="text-themeColor">*</span></label> --}}
                                                                {{-- </div>
                                                                </div> --}}
                                                            </div>
                                                            @error('nationality')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <!-- Adresse -->
                                                        <div class="col-lg-4 col-md-6 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label><span >{{ __("generated.Source") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                                <select class="chosenoptgroup w-100" name="source">
                                                                    <option selected id="null-value2">Source</option>
                                                                    @foreach (App\Enums\Profile\SourceProfileEnum::getAll() as $key => $source)
                                                                        <option value="{{ __($source) }}">
                                                                            {{ __($source) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 col-md-6 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="address" name="address"
                                                                            placeholder="{{ __("generated.Adresse") }}" required>
                                                                        <label for="address"
                                                                            >{{ __("generated.Adresse") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('address')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Code Postal -->
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="postal_code" name="postal_code"
                                                                            placeholder="{{ __("generated.Code postal") }}" required>
                                                                        <label for="postal_code"
                                                                            >{{ __("generated.Code postal") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('postal_code')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>


                                                        <!-- Pays -->
                                                        <div class="col-12 col-md-4 mb-2">

                                                            <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                                                <label><span >{{ __("generated.Pays") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                                <select class="chosenoptgroup w-100" name="country_id"
                                                                    id="country-select">
                                                                    <option>{{ __("generated.Choisir un pays") }}</option>
                                                                    @if (isset($countries))
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id ?? '' }}"
                                                                                {{-- data-image="https://flagcdn.com/w160/{{ strtolower($country->code) }}.png" --}}
                                                                                data-country="{{ $country?->country_id ?? '' }}">
                                                                                {{ __($country->name ?? '_' )}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Ville -->
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div class="custom-multiple-select rounded border poste-chosen"
                                                                style="border-bottom: 1px solid #76787a !important;border-radius: 8px !important;">
                                                                <label><span >{{ __("generated.Ville") }}</span> <span
                                                                        class="text-themeColor">*</span></label>
                                                                <select class="chosenoptgroup w-100" name="city_id"
                                                                    id="filter-ville">
                                                                    <option>{{ __("generated.Choisir une ville") }}</option>
                                                                    @if (isset($cities))
                                                                        @foreach ($cities as $city)
                                                                            <option value="{{ $city->id ?? '' }}"
                                                                                data-country="{{ $city->country?->id ?? '' }}">
                                                                                {{ __($city->name ?? '_' )}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <!-- Téléphone 1 -->
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="phone_primary" name="phone_primary"
                                                                            placeholder="{{ __("generated.Téléphone 1") }}" required>
                                                                        <label for="phone_primary"><span
                                                                                >{{ __("generated.Téléphone 1") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('phone_primary')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Téléphone 2 -->
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="text"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="phone_secondary"
                                                                            name="phone_secondary"
                                                                            placeholder="{{ __("generated.Téléphone 2") }}">
                                                                        <label for="phone_secondary"><span
                                                                                >{{ __("generated.Téléphone 2") }}</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('phone_secondary')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- E-mail -->
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <div class="input-group input-group-lg">
                                                                    <div class="form-floating">
                                                                        <input type="email"
                                                                            class="form-control border-start-0 translated_text"
                                                                            id="email" name="email"
                                                                            placeholder="{{ __("generated.E-mail") }}" required>
                                                                        <label for="email"><span
                                                                                >{{ __("generated.E-mail") }}</span><span
                                                                                class="text-themeColor">*</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('email')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                <div class="input-group input-group-lg">
                                                                    <span
                                                                        class="input-group-text text-theme border-end-0"><i
                                                                            class="bi bi-facebook"></i></span>
                                                                    <div class="form-floating">
                                                                        <input type="url" placeholder="{{ __("generated.Facebook") }}"
                                                                            name="url_facebook" value=""
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label >{{ __("generated.Facebook") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('facebook')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                <div class="input-group input-group-lg">
                                                                    <span
                                                                        class="input-group-text text-theme border-end-0"><i
                                                                            class="bi bi-linkedin"></i></span>
                                                                    <div class="form-floating">
                                                                        <input type="url" placeholder="{{ __("generated.Linkedin") }}"
                                                                            name="url_linkedin" value=""
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label >{{ __("generated.Linkedin") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('linkedin')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-md-4 mb-2">
                                                            <div
                                                                class="form-group mb-3 position-relative check-valid is-valid">
                                                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                                                <div class="input-group input-group-lg">
                                                                    <span
                                                                        class="input-group-text text-theme border-end-0"><i
                                                                            class="bi bi-twitter-x"></i></span>
                                                                    <div class="form-floating">
                                                                        <input type="url" placeholder="{{ __("generated.Twitter-x") }}"
                                                                            name="url_twitter" value=""
                                                                            class="form-control border-start-0 translated_text">
                                                                        <label
                                                                            >{{ __("generated.Twitter-x") }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('twitter')
                                                                <div class="invalid-feedback translated_text">
                                                                    {{ __($message) }}</div>
                                                            @enderror
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
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div style="margin-bottom: 2rem" class="card-header bg-gradient-theme-light">
                                    <div class="row align-items-center">
                                        <h6 class="fw-medium mb-0 ">{{ __("generated.Téléchargement") }}</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row" style="padding-left: 28px">
                                        {{-- <h4 class="title custom-title  mb-5 " style="margin-bottom: 38px !important;">{{ __("generated.Téléchargement") }}</h4> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-5 "
                                                    style="margin-bottom: 38px !important;">{{ __("generated.Télécharger documents") }}</h6>
                                            </div>
                                            <div class="col-6 col-md-6 mb-2">
                                                <div class="card border-0">
                                                    <div class="card-body lettre-1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body">
                                                                        <div class="row" style="padding: 0px 17px">
                                                                            <div class="col-12">

                                                                                <div class="file-upload">
                                                                                    <input type="file"
                                                                                        id="file-input-cv"
                                                                                        name="cv"
                                                                                        class="doc-file-input profileCvInput"
                                                                                        accept=".pdf,.doc,.docx">
                                                                                    <label for="file-input-cv"
                                                                                        >{{ __("generated.Déposez le CV ici ou cliquez pour le télécharger (PDF, DOC, DOCX - max 10 Mo)") }}</label>
                                                                                    <div id="file-preview-cv"
                                                                                        class="file-preview">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="row mt-4">
                                                                                <div class="col-12">
                                                                                    <button id="export-cv-button"
                                                                                        class="btn btn-theme btn-ajouter export-button"
                                                                                        type="button"
                                                                                        style="font-size: 12px; float: right; background-color: #26b6ea;">
                                                                                        Exporter CV
                                                                                    </button>
                                                                                </div>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-2">
                                                <div class="card border-0">
                                                    <div class="card-body lettre-1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body">
                                                                        <div class="row" style="padding: 0px 17px">
                                                                            <div class="col-12">
                                                                                <div class="file-upload">
                                                                                    <input type="file"
                                                                                        id="file-input-cover-letter"
                                                                                        name="cover_letter"
                                                                                        class="doc-file-input profileCoverLetterInput"
                                                                                        accept=".pdf,.doc,.docx">
                                                                                    <label
                                                                                        for="file-input-cover-letter"
                                                                                        >{{ __("generated.Déposez la lettre de motivation ici ou cliquez pour la télécharger (PDF, DOC, DOCX - max 10 Mo)") }}</label>
                                                                                    <div id="file-preview-cover-letter"
                                                                                        class="file-preview"></div>
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="row mt-4">
                                                                                <div class="col-12">
                                                                                    <button id="export-cv-button"
                                                                                        class="btn btn-theme btn-ajouter export-button"
                                                                                        type="button"
                                                                                        style="font-size: 12px; float: right; background-color: #26b6ea;">
                                                                                        Exporter la lettre de motivation
                                                                                    </button>
                                                                                </div>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <h6 class="mb-5 "
                                                    style="margin-bottom: 38px !important;">{{ __("generated.Télécharger CV vidéo") }}</h6>
                                            </div>

                                            <div class="col-12 col-md-12 mb-2">
                                                <div class="card border-0">
                                                    <div class="card-body lettre-1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body">
                                                                        <div class="row" style="padding: 0px 17px">
                                                                            <div class="col-12">
                                                                                <div class="file-upload">
                                                                                    <input type="file"
                                                                                        id="file-input-video"
                                                                                        name="video"
                                                                                        class="doc-file-input"
                                                                                        accept="video/*">
                                                                                    <label for="file-input-video"
                                                                                        >{{ __("generated.Déposez la vidéo ici ou cliquez pour la télécharger (MP4, MOV, AVI, WMV - max 50 Mo)") }}</label>
                                                                                    <div id="file-preview-video"
                                                                                        class="file-preview">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            {{-- <div class="row mt-4">
                                                                                <div class="col-12">
                                                                                    <button id="export-cv-button"
                                                                                        class="btn btn-theme btn-ajouter export-button"
                                                                                        type="button"
                                                                                        style="font-size: 12px; float: right; background-color: #26b6ea;">
                                                                                        Exporter Video
                                                                                    </button>
                                                                                </div>
                                                                            </div> --}}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-4 mx-4" style="float: right;margin-right: 11px">
        <div class="col-auto">
            <button class="btn btn-theme " data-form-id="profile-form-informations" type="button"
                onclick="saveForm('informations', 1)">{{ __("generated.Enregister") }}</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
        </div>
    </div>
</form>
