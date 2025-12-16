<div class="offcanvas offcanvas-end" id="offcanvasRightView" tabindex="-1">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Détail
            utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">

        <div class="row justify-content-center mt-5">
            <!-- First Row: Logo Display -->
            <div class="col text-center">
                <!-- Image Preview -->
                <figure class="logo-figure avatar avatar-100 coverimg shadow-md border-3 border-light" id="logo"
                    style="background-size: 119px; line-height: 0 !important; margin-top: 2px !important;">
                    <img id="view-user-logo" src="assets/img/icon/photo-empty.png" class="client-logo custom-file-input"
                        alt="Logo" />
                </figure>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="form-group mb-3 position-relative check-valid is-valid">
                    <div class="input-group input-group-lg">
                        <div class="form-floating">
                            <input id="view-name" name="name" type="text" placeholder="Nom"
                                class="form-control border-start-0" disabled>
                            <label>Nom Complet</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="form-group mb-3 position-relative check-valid is-valid">
                    <div class="input-group input-group-lg">
                        <div class="form-floating">
                            <input id="view-email" name="email" type="email" placeholder="email"
                                class="form-control border-start-0" disabled>
                            <label>email</label>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="form-group mb-3 position-relative check-valid is-valid">
                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                    <div class="input-group input-group-lg">
                        <div class="form-floating">

                            <select id="view-roles" class="form-select" name="roles" disabled>
                                @foreach ($roles as $role)
                                    <option value="{{ __($role->id) }}">
                                        {{ __($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Rôle *</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3 position-relative check-valid is-valid">
                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                    <div class="input-group input-group-lg">
                        <div class="form-floating">
                            <input type="text" placeholder="email" class="form-control border-start-0" readonly>
                            <label>Nom du Rôle *</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="form-group mb-3 position-relative check-valid is-valid">
                    <!-- is-valid or is-invalid cla<ss can be toggled when user focus out and validation checked. on page reload also used.-->
                    <div class="input-group input-group-lg">
                        <div class="form-floating">
                            <select class="form-select" name="agency_id" id="view-agency" disabled>
                                @foreach ($agency as $agenc)
                                    <option value="{{ __($agenc->id) }}">
                                        {{ __($agenc->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Agence *</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">


                <input class="form-check-input" type="checkbox" id="view-status" name="inlineRadioOptions"
                    id="inlineRadio1" name="status" value="1" disabled>

                <label>Utilisateur Activé ?</label>

            </div>


        </div>
    </div>
</div>
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="ViewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" id="#offcanvasRightEdit">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Détail
                    utilisateur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mt-3">
                    <div class="col-2">
                        <div class="col-auto position-relative">
                            <figure
                                class="logo-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                id="logo_Edit"
                                style="background-size: 80px;  line-height: 0 !important; margin-top: 2px !important; ">
                                <img id="view-user-logo" src="{{ asset('assets/img/icon/photo-empty.png') }}"
                                    class="client-logo custom-file-input" alt="" />
                            </figure>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group mb-3 position-relative check-valid is-valid">
                                    <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                    <div class="input-group input-group-lg">

                                        <div class="form-floating">
                                            <input type="text" id="view-name" name="name" placeholder="name"
                                                class="form-control border-start-0">
                                            <label>Nom Complet </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="invalid-feedback mb-3">Add .com
                                    at last
                                    to insert valid data
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div>
                                    <div class="form-group mb-3 position-relative check-valid is-valid">
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating">
                                                <input type="text" name="email" id="view-email"
                                                    placeholder="email" class="form-control border-start-0">
                                                <label>email </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback mb-3">Add .com
                                        at last
                                        to insert valid data
                                    </div>
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

                                                <select class="form-select border-0" id="view-roles" name="roles"
                                                    required>
                                                    <option value="">Tous
                                                    </option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ __($role->id) }}">
                                                            {{ __($role->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label>Rôle</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div>
                                    <div class="form-group mb-3 position-relative">
                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating d-block">
                                                {{-- <input class="form-check-input" type="checkbox" id="inlineRadio1"
                                                        name="status" value="1"> --}}
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="view-status-active" value="1" role="switch">
                                                    <label class="form-check-label" for="inlineCheckbox1">
                                                        Activé</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div>
                                    <div class="form-group mb-3 position-relative">
                                        <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                        <div class="input-group input-group-lg">
                                            <div class="form-floating d-block">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="view-status-bloque" value="0" role="switch">
                                                    <label class="form-check-label" for="inlineCheckbox2">
                                                        Bloqué</label>
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
