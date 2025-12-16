<form id="profile-form-cover-letters" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card border-0 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body" style="padding: 30px">
                            <div class="row justify-content-center">
                                <div class="col-8" style="">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="Objet" value=""
                                                            required="" name="subject"
                                                            class="form-control border-start-0">
                                                        <label><span >{{ __("generated.Objet") }}</span> <span class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-12 mt-3">
                                            <label class="mb-2 translated_text">{{__("generated.Votre text")}}<span
                                                    class="text-themeColor">*</span></label>

                                            <div class="input-group input-group-lg">

                                                <div class="form-floating">
                                                    <textarea class="form-control border " style="height: 300px;" id="cover_letter_ckeditor" name="description">{{ __("generated.Votre texte") }}</textarea>

                                                    {{-- <textarea class="form-control border" rows="10" id="cover_letter_ckeditor" name="description">Votre texte</textarea> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mt-4">
                                            <button class="btn btn-danger " type="button"
                                                style="font-size: 12px;float: right;">{{ __("generated.Supprimer") }}</button>
                                            <!-- <button class="btn btn-theme btn-ajouter " type="button"
                                                style="font-size: 12px;float: right;margin-left: 10px;margin-right: 10px; background-color: #26b6ea;"
                                                onclick="saveForm('cover-letters', 6)"
                                                data-form-id="profile-form-cover-letters">{{ __("generated.Modifier") }}</button> -->
                                                <button
                                                    onclick="updateCKEditorAndSave('cover_letter_ckeditor', 'cover-letters', 6)"
                                                    type="button"
                                                    class="btn btn-theme btn-ajouter "
                                                    style="font-size: 12px; float: right; margin-left: 10px; margin-right: 10px; background-color: #26b6ea;"
                                                >{{ __("generated.Modifier") }}</button>

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
    <div class="row mt-3 mb-4 mx-4" style="float: right">
        <div class="col-auto">
            <button class="btn btn-theme " type="button" onclick="switchToNextTab(7)">{{ __("generated.Enregister") }}</button>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
        </div>
    </div>
</form>
