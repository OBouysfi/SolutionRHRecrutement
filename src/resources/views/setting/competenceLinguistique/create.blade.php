<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">{{ __("generated.Ajouter une compétence linguistique") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="complangform">
                    @csrf
                    <div class="form-group mb-3 position-relative is-valid check-valid">
                        <div class="form-floating">
                            <input type="text" placeholder="{{ __("generated.Nom") }}" name="label" id="label_linguistique"
                                class="form-control border-start-0 translated_text">
                            <label><span >{{ __("generated.Nom") }}</span><span
                                    class="text-themeColor">*</span></label>
                        </div>
                    </div>

                    <br>
                    <div class="col-12 ">
                        {{-- <label class=" text-bw form-label">{{ __("generated.Catégorie") }}</label>
                        <div  class="rounded border"
                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                            <select class="form-select chosenoptgroup w-100" name="skill_type_id" id="skill_type_id">
                                <option value="Tous" selected >{{ __("generated.Tous") }}</option>
                                @foreach ($skillTypes as $type)
                                   <option value="{{ __($type->id) }}">{{ __($type->label) }}</option>
                               @endforeach
                            
                            </select>
                        </div> --}}
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="custom-multiple-select rounded border poste-chosen Flag_Country"
                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <label >{{ __("generated.Catégorie") }}</label>
                                <select class="form-select chosenoptgroup w-100" name="skill_type_id" id="skill_type_id">
                                    <option value="Tous" selected >{{ __("generated.Tous") }}</option>

                                    @foreach ($skillTypes as $type)
                                        <option value="{{ __($type->id) }}">{{ __($type->label) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="formFeedback" style="margin-top: 10px; display: none;"></div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-theme translated_text"
                    style="font-size: 18px; padding: 5px 9px; border-radius: 5px;"
                    id="save" value="{{ __("generated.Ajouter") }}">
                </form>
            </div>
        </div>
    </div>
</div>
