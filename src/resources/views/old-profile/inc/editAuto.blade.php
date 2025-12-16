<div class="tab-pane fade show active" id="automatique" role="tabpanel" aria-labelledby="automatique-tab">
    <!-- personal info tab-->
    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
        <div class="card border-0 mb-3 bg-none shadow-none">
            <input type="file" id="demofile" class="hidden">
            <figure class="cover-figure coverimg w-100 h-300 mb-0 position-relative rounded">
                <div class="position-absolute top-0 end-0 m-3">
                    <label class="btn btn-light">
                        <i class="bi bi-camera"></i> Modifier la couverture
                        <input type="file" name="profile_cover" class="custom-file-input profilecoverlightinput"
                            id="profilecoverlightinput" accept="image/*" />
                    </label>
                </div>
                <img src="{{ isset($profile) ? $profile->getCoverUrl() : asset('assets/img/icon/auth-bg-cover.jpg') }}"
                    class="mw-100 profile-cover" alt="" />
            </figure>
            <div class="row align-items-start justify-content-center mb-3">
                <div class="col-auto position-relative">
                    <figure
                        class="avatar-figure avatar avatar-160 coverimg rounded-circle top-80 shadow-md border-3 border-light"
                        style="background-size: cover;">
                        <img src="{{ $profile->getAvatarUrl() }}" class="profile-avatar" alt="" />
                    </figure>
                    <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                        <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                            <i class="bi bi-camera"></i>
                            <input type="file" name="profile_avatar"
                                class="custom-file-input profileavatarlightinput" id="profileavatarlightinput"
                                accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="row align-items-start justify-content-center mt-4 civillity-section" id="civillity-section"
                    style="display: flex;">
                    <div class="col-auto">
                        <div class="form-check form-check-circle">
                            <input class="form-check-input priceupgrade1" type="radio" name="civility"
                                value="1" id="priceupgrade1" style="margin-top: 3px"
                                @if (isset($profile)  && $profile->civility == '1') checked @endif>
                            <label class="form-check-label" for="priceupgrade1">
                                <span class="h6" style="font-size: 15px;font-weight: 100;">Homme</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-circle">
                            <input class="form-check-input priceupgrade2" type="radio" name="civility"
                                value="2" id="priceupgrade2"  style="margin-top: 3px"
                                @if (isset($profile) && $profile->civility != '1') checked @endif>
                            <label class="form-check-label" for="priceupgrade2">
                                <span class="h6" style="font-size: 15px;font-weight: 100;">Femme</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-10">
                <h6 class="title custom-title">Téléchargement des documents</h6>
                <div class="row mt-3">
                    <div class="col-6 col-md-6 mb-2">
                        <div class="card border-0">
                            <div class="card-body lettre-1" style="background-color: #e4e8ee54;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="file-upload">
                                            <input type="file" id="file-input-cv" name="cv"
                                                class="doc-file-input profileCvInput" accept=".pdf,.doc,.docx">
                                            <label for="file-input-cv">
                                                Déposez le CV ici ou cliquez pour le télécharger (PDF, DOC, DOCX - max
                                                10 Mo)
                                            </label>
                                            <div id="file-preview-cv" class="file-preview"></div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <button id="export-cv-button"
                                                    class="btn btn-secondary btn-ajouter export-button" type="button"
                                                    style="font-size: 12px; float: right; background-color: #26b6ea;">
                                                    Exporter CV
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 mb-2">
                        <div class="card border-0">
                            <div class="card-body lettre-2" style="background-color: #e4e8ee54;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="file-upload">
                                            <input type="file" id="file-input-cover-letter" name="cover_letter"
                                                class="doc-file-input profileCoverLetterInput"
                                                accept=".pdf,.doc,.docx">
                                            <label for="file-input-cover-letter">
                                                Déposez le lettre de motivation ici ou cliquez pour le télécharger (PDF,
                                                DOC, DOCX - max 10 Mo)
                                            </label>
                                            <div id="file-preview-cover-letter" class="file-preview"></div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <button id="export-cover-letter-button"
                                                    class="btn btn-theme btn-ajouter export-button" type="button"
                                                    style="font-size: 12px; float: right; background-color: #26b6ea;">
                                                    Exporter Lettre de Motivation
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-10 mt-5">
                <h6 class="title custom-title">Parcing Curriculum Vitae</h6>
                <div class="card border-0" style="background-color: #e4e8ee54">
                    <div class="card-body lettre-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row" style="padding: 0px 17px;">
                                            <div class="col-12">
                                                <div class="card border-0">
                                                    <div class="card-body lettre-2"
                                                        style="background-color: #e4e8ee54;">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="file-upload">
                                                                    <input type="file" id="file-input-cv-parcing"
                                                                        name="cv_parcing"
                                                                        class="doc-file-input file-input-parsing">
                                                                    <label for="file-input-cv-parcing">Déposez le cv
                                                                        ici ou cliquez pour les
                                                                        télécharger (PDF, DOC, DOCX - max 10 Mo)</label>
                                                                    <div id="file-preview-cover-letter"
                                                                        class="file-preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row mt-4">
                                                    <div class="col-6"></div>
                                                    <div class="col-5">
                                                        <div class="progress" style="margin-top: 8px">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated "
                                                                role="progressbar" aria-valuenow="75"
                                                                aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 75%;    background-color: #005dc7 !important;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">

                                                        <button class="btn btn-theme btn-ajouter" type="button"
                                                            style="font-size: 12px;float: right;">Parcing</button>
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
