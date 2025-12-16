<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">{{ __("generated.Ajouter un dossiers de talent") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="profileFolderform">
                    @csrf

                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" placeholder="{{ __("generated.Code Postal") }}" name="name" id="name"
                                class="form-control border-start-0 translated_text">
                            <label><span >{{ __("generated.Nom") }}</span><span
                                    class="text-themeColor">*</span></label>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <label >{{ __("generated.Parent") }}</label>
                                <select class="form-select chosenoptgroup w-100" name="parent_id" id="parent_id">
                                    @foreach ($folders as $parent)
                                        <option value="{{ __($parent->id) }}">{{ __($parent->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="formFeedback" style="margin-top: 10px; display: none;"></div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-theme"
                    style="font-size: 18px;padding: 5px 9px; border-radius: 5px;"
                    id="save" value="{{ __('generated.Ajouter') }}">
                </form>
            </div>
        </div>
    </div>
</div>
