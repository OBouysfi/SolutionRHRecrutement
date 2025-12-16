<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">{{ __("generated.Ajouter un Filiale") }}</h5>
                <button type="button" class="btn-close translated_text" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="filialeform">
                    @csrf
                    <label class="label-control ">{{ __("generated.Nom du Filiale") }}</label>
                    <input type="text" class="form-control" name="name" id="nameInput"
                        style="border-bottom: 1px solid #005DC7">
                    <br>
                    <div class="col-12 ">
                        <label class=" text-bw form-label">{{ __("generated.Ville") }}</label>
                        <div class="rounded border"
                            style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                            <select class="form-select" name="city_id" id="city_id">
                                <option value="Tous">{{ __("generated.Tous") }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ __($city->id) }}">
                                        {{ __($city->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="formFeedback" style="margin-top: 10px; display: none;"></div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-theme translated_text"
                    style="font-size: 18px; color: #fff; background-color: #035ec7; padding: 5px 9px; border-radius: 5px;"
                    id="save" value="Ajouter"></button>
                </form>
            </div>
        </div>
    </div>
</div>
