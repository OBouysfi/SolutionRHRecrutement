<div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="admin-tab">


    <form action="#" method="post" id="addEditDataUserAdmin" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" id="client-id-admin-user">


        <div class="col-12">

            <div class="card border-0" data-index="0">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-header bg-gradient-theme-light">
                                    <div class="row align-items-center">

                                        <h6 class="fw-medium mb-0 ">{{ __('generated.account_user') }}</h6>

                                    </div>
                                </div>
                                <div class="card-body" style="padding-top: 4rem">


                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="row mb-3" style="padding-left: 10px">

                                                <div class="col-2"></div>

                                                <div class="col-2" style="width: 9%;">
                                                    <div class="col-auto position-relative">
                                                        <figure
                                                            class="logo-evaluator-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                                            style="background-size: 119px; line-height: 0 !important; margin-top: 2px !important;">
                                                            <img src="{{ asset('assets/img/icon/empty-logo2.png') }}"
                                                                class="client-evaluator-logo custom-file-input"
                                                                alt="" />
                                                        </figure>
                                                        <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto"
                                                            style="top: 78% !important;left: 60%;">
                                                            <label
                                                                class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn"
                                                                style="width: 35px; height: 35px;display: flex;align-items: center;justify-content: center;">
                                                                <i class="bi bi-camera"></i>
                                                                <input type="file" name="user_image"
                                                                    class="custom-file-input clientEvaluatorLogolightinput"
                                                                    accept="image/*" />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width:35%;margin-top: 10px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="first_name"
                                                                        value = "{{ isset($client) && isset($adminUser) ? $adminUser->first_name : null }}"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __('generated.Prénom') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">
                                                                {{ __('generated.Please enter valid input') }}</div>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width:35%;margin-top: 10px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="last_name"
                                                                        value = "{{ isset($client) && isset($adminUser) ? $adminUser->last_name : null }}"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __('generated.Nom') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">
                                                                {{ __('generated.Please enter valid input') }}</div>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 35%;margin-top: 10px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" name="email"
                                                                        value = "{{ isset($client) && isset($adminUser) ? $adminUser->email : null }}"
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __('generated.Email') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">
                                                                {{ __('generated.Please enter valid input') }}</div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col-lg-3"
                                                            style="width: 35%;margin-top: 10px;margin-right: -10px;">
                                                            <div
                                                                class="form-group mb-3 position-relative is-valid check-valid">
                                                                <div class="form-floating">
                                                                    <input type="text" value="admin" disabled
                                                                        class="form-control border-start-0 translated_text">
                                                                    <label>{{ __('generated.Role') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="invalid-feedback ">
                                                                {{ __('generated.Please enter valid input') }}</div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-5 mb-4" style="float: right;">

                                        <div class="col-auto">
                                            <button class="btn btn-theme " id="btn-add-general-informations"
                                                data-form-id="general-informations"
                                                type="submit">{{ __('generated.Enregistrer') }}</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>




    </form>

</div>
