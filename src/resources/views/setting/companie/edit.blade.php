<div class="modal fade" id="companyEditModal" tabindex="-1" aria-labelledby="agenceEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="agenceEditModalLabel">{{ __("generated.Modifier Entreprise") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAgenceForm" action="" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    <div class="text-center mb-3">
                        <img id="path_logo_preview" alt="Logo" class="img-fluid rounded"
                            style="max-width: none; width: 30% ;">
                        <input type="file" id="edit_path_logo" name="path_logo" class="form-control mt-2"
                            accept="image/*">
                    </div>
                    <div class="mb-3">

                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Adresse") }}" id="business_name" name="business_name"
                                    class="form-control border-start-0 translated_text">
                                <label><span >{{ __("generated.Nom de l'entreprise :") }}</span><span class="text-themeColor">*</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">

                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Adresse") }}" id="address" name="address"
                                    class="form-control border-start-0 translated_text">
                                <label><span >{{ __("generated.Adresse") }}</span><span
                                        class="text-themeColor">*</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="{{ __("generated.Code Postal") }}" id="postal_code" name="postal_code"
                                    class="form-control border-start-0 translated_text">
                                <label><span >{{ __("generated.Code Postal") }}</span><span
                                        class="text-themeColor">*</span></label>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="city_id" class="form-label"><strong >{{ __("generated.Ville :") }}</strong></label>
                        <div  class="rounded border "
                        style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                        <select class="form-select chosenoptgroup w-100 " id="edit_city_name" name="city_name_edit">
                            @foreach ($cities as $city)
                            <option value="{{ __($city->id) }}">{{ __($city->name) }}</option>
                        @endforeach

                        </select>
                        </div>
                    </div> --}}

                    <div class="mb-3">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <label >{{ __("generated.Ville :") }}</label>
                                <select class="form-select chosenoptgroup w-100 " id="edit_city_name" name="city_name_edit">
                                    id="country-select">
                                    @foreach ($cities as $city)
                                        <option value="{{ __($city->id) }}">{{ __($city->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="edit_id" name="id">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-theme m-2 "
                            style="font-size: 18px; padding: 5px 9px; border-radius: 5px;"
                            id="save_edit">{{ __("generated.Sauvegarder") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
