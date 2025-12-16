<div class="modal fade" id="ModalEditRecruitment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">

        <form id="EditDataRecruitment" method="POST" enctype="multipart/form-data" action="">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="staticBackdropLabel">{{ __("generated.Modifier un Rapports financiers") }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" id="editRecruitmentId" value="">
                <div class="modal-body">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6 mb-3">
                                                                    <div class="card border-0 h-100">
                                                                        <div class="card-body p-0">

                                                                            <div class="col-2">

                                                                                <div class="col-auto position-relative">
                                                                                    <figure
                                                                                        class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                                                        id="avatarEdit"
                                                                                        style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                                                        <img src="{{ asset('assets/img/icon/empty-logo.png') }}"
                                                                                            alt=""
                                                                                            id="avatarImageedit"
                                                                                            style="display: none;">
                                                                                    </figure>
                                                                                    <div
                                                                                        class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto custem-camera-file-label">
                                                                                        <label for="fileInputEdit"
                                                                                            class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn custom-camera-file-input"
                                                                                            style="cursor: pointer;">
                                                                                            <i class="bi bi-camera"></i>
                                                                                            <input type="file"
                                                                                                name="logo"
                                                                                                class="file-input"
                                                                                                id="fileInputEdit"
                                                                                                style="display: none;">
                                                                                        </label>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 mb-3">
                                                                    <div class="card border-0 h-100">
                                                                        <div class="card-body p-0">
                                                                            <h6
                                                                                class="title custom-title ">{{ __("generated.Dépense") }}</h6>
                                                                            <textarea class="form-control border translated_text" name="platform" placeholder="{{ __("generated.Dépense") }}" id="editPlatform">{{ old('platform') }}</textarea>

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
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card border-0 h-100">
                                        <div class="card-body p-0">

                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input required type="number" name="budget"
                                                            placeholder="{{ __("generated.budget") }}"
                                                            class="form-control border-start-0 translated_text"
                                                            id="editBudget" value="{{ old('budget') }}">
                                                        <label for="nbr_profiles"><span
                                                                >{{ __("generated.Budget") }}</span> <span
                                                                class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card border-0 h-100">
                                        <div class="card-body p-0">

                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input required type="number" name="amount" id="editAmount"
                                                            placeholder="{{ __("generated.Montant") }}"
                                                            class="form-control border-start-0 translated_text"
                                                            value="{{ old('nbr_profiles') }}">
                                                        <label for="nbr_profiles"><span
                                                                >{{ __("generated.Montant") }}</span> <span
                                                                class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <div class="card border-0 h-100">
                                        <div class="card-body p-0">

                                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <select required name="devise" id="editDevise"
                                                            class="form-select border-0">
                                                            <option  value="">{{ __("generated.Sélectionnez un Devise") }}</option>
                                                            @foreach ($devises as $key => $devise)
                                                                <option class=" translated_text"
                                                                    value="{{ $key }}">
                                                                    {{ __($devise['label']) }} ({{ __($devise['code']) }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="company_evaluator"><span
                                                                >{{ __("generated.Devise") }}</span> <span
                                                                class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row" style="padding: 7px 0px;">
                                        <div class="col-12">
                                            <div class="card border-0">
                                                <div class="card-body lettre-2 p-0">
                                                    <div class="row">
                                                        <div class="col-12">

                                                            <div class="file-upload">
                                                                <input type="file" id="editInvoice" name="invoice"
                                                                    class="doc-file-input file-input-parsing"
                                                                    accept=".pdf,.doc,.docx">
                                                                <label for="invoice"
                                                                    class="fs-sm-12 fs-md-14 fs-lg-16 ">{{ __("generated.Déposez le document ici ou cliquez pour le télécharger (PDF, DOC, DOCX - max 10 Mo)") }}</label>
                                                                <div id="file-preview-cover-letter"
                                                                    class="file-preview"></div>
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
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-secondary me-md-2 " type="button"
                            data-bs-dismiss="modal">{{ __("generated.Annuler") }}</button>
                        <button class="btn btn-theme " type="submit">{{ __("generated.Enregister") }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
