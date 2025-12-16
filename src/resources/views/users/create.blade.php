<!-- Modal -->
<div class="modal fade" id="AddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un
                    utilisateur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('api.users.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="row justify-content-center mt-3">
                        <div class="col-2">
                            <div class="col-auto position-relative">
                                <figure
                                    class="logo-figure avatar avatar-100 coverimg top-80 shadow-md border-3 border-light"
                                    id="logo"
                                    style="background-size: 80px;  line-height: 0 !important; margin-top: 2px !important; ">
                                    <img id="user-logo" src="{{ asset('assets/img/icon/photo-empty.png') }}"
                                        class="client-logo custom-file-input" alt="" />
                                </figure>

                                <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                                    <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                        <i class="bi bi-camera"></i>

                                        <input type="file" name="user_image" class="custom-file-input "
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
                                                <label>Nom Complet <span style="color: red">*</span></label>
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
                                                    <input type="text" name="email" placeholder="email"
                                                        class="form-control border-start-0" required>
                                                    <label>email <span style="color: red">*</span> </label>
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

                                                    <select class="form-select border-0" id="roles" name="roles"
                                                        required>
                                                        <option value="">Tous
                                                        </option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ __($role->id) }}">
                                                                {{ __($role->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label>Rôle <span style="color: red">*</span></label>
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
                                                            id="inlineCheckbox1" value="1" role="switch">
                                                        <label class="form-check-label" for="inlineCheckbox1">
                                                            Activé</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-3">Add .com
                                            at last
                                            to insert valid data
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
                                                            id="inlineCheckbox2" value="0" role="switch">
                                                        <label class="form-check-label" for="inlineCheckbox2">
                                                            Bloqué</label>
                                                    </div>
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

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-theme">Sauvegarder</button>
            </div>
            </form>
        </div>
    </div>
</div>
