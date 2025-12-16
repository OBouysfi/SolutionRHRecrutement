<!-- Modal -->
<div class="modal fade" id="AddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-theme-light">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">{{ __('generated.Ajouter un utilisateur') }}</h1>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="UserCreate" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-12 mb-3" style="width: 150px;">
                            <div class="col-auto position-relative">
                                <figure class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                    id="logo"
                                    style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                    <img src="{{ asset('assets/img/icon/empty-logo.png') }}" alt=""
                                        id="user-logo" style="display: none;">
                                </figure>
                                <div
                                    class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto custem-camera-file-label">
                                    <label
                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn custom-camera-file-input">
                                        <i class="bi bi-camera"></i>
                                        <input type="file" name="user_image" class="custom-file-input"
                                            id="UserLogolightinput" accept="image/*" hidden />

                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                        <div class="input-group input-group-lg">

                                            <div class="form-floating">
                                                <input type="text" name="name" placeholder="name"
                                                    class="form-control border-start-0" required>
                                                <label><span>{{ __('generated.Nom Complet') }}</span><span
                                                        class="text-theme">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback mb-3 ">
                                        {{ __('generated.Add .com at last to insert valid data') }}</div>
                                </div>

                                <div class="col-12 col-md-12">
                                    <div>
                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">
                                                    <input type="text" name="email" placeholder="email"
                                                        class="form-control border-start-0" required>
                                                    <label><span>{{ __('generated.email') }}</span><span
                                                            class="text-theme">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-3 ">
                                            {{ __('generated.Add .com at last to insert valid data') }}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div>
                                        <div class="form-group mb-3 position-relative check-valid is-valid">
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating">

                                                    <select class="form-select border-0" id="roles_user" name="roles"
                                                        required>
                                                        <option value="">{{ __('generated.Tous') }}</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ __($role->id) }}"
                                                                data-role-name="{{ strtolower($role->name) }}">
                                                                {{ __($role->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label><span>{{ __('generated.Rôle') }}</span><span
                                                            class="text-theme">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12" style="display: none;" id="client-select-wrapper-add">
                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">

                                                <select id="view-roles" class="form-select" name="client_id">
                                                    @foreach ($clients as $client)
                                                        <option value="{{ __($client->id) }}">
                                                            {{ __($client->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label>{{ __('generated.Client') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>
                                        <div class="form-group mb-3 position-relative" style="box-shadow: none">
                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating d-block">
                                                    {{-- <input class="form-check-input" type="checkbox" id="inlineRadio1"
                                                        name="status" value="1"> --}}
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="inlineCheckbox1" value="1" role="switch" checked>
                                                        <label class="form-check-label "
                                                            for="inlineCheckbox1">{{ __('generated.Activé') }}</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-3 ">
                                            {{ __('generated.Add .com at last to insert valid data') }}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>
                                        <div class="form-group mb-3 position-relative" style="box-shadow: none">
                                            <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                            <div class="input-group input-group-lg">
                                                <div class="form-floating d-block">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="inlineCheckbox2" value="0" role="switch">
                                                        <label class="form-check-label "
                                                            for="inlineCheckbox2">{{ __('generated.Bloqué') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-3 ">
                                            {{ __('generated.Add .com at last to insert valid data') }}</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


            </div>
            <div class="modal-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-outline_primary me-md-2 "
                        data-bs-dismiss="modal">{{ __('generated.Annuler') }}</button>
                    {{-- <button type="submit" class="btn btn-theme ">{{ __('generated.Sauvegarder') }}</button> --}}
                    <button type="submit" id="save-user-btn"
                        class="btn btn-theme d-flex align-items-center justify-content-center position-relative"
                        style="min-width: 120px;">
                        <span id="save-user-text">{{ __('generated.Sauvegarder') }}</span>
                        <span id="save-user-spinner"
                            class="spinner-border spinner-border-sm text-light position-absolute d-none"
                            style="width: 1.2rem; height: 1.2rem;" role="status" aria-hidden="true"></span>
                    </button>

                </div>
            </div>
            </form>



        </div>
    </div>
</div>
