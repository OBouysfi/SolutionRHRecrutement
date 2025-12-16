<div class="modal fade" id="createEventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-block">
                <form id="store-event-form">
                    @csrf
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px"
                                        class="bi bi-calendar-week avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="fw-medium mb-0">{{ __("generated.Créer un événement") }}</h5>
                        </div>
                    </div>

                    <div class="row align-items-center mb-2">
                        <div class="col-12">

                            <div
                                class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input  type="text" name="title" class="form-control border-start-0" id="meetingTitle"
                                            onfocus="setFocus(true)" onblur="setFocus(false)" >
                                        <label >{{ __("generated.Ajouter un titre *") }}</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 text-center">
                            <input type="radio" name="event_type" id="event_pres" value="presentiel" class="d-none"
                                onfocus="setFocus(true)" onblur="setFocus(false)">
                            <label for="event_pres" class="btn action-check">
                                <i class="bi bi-geo-alt"></i> {{ __("generated.Présentiel") }}
                            </label>
                        </div>
                        <div class="col-3 text-center">
                            <input type="radio" name="event_type" id="event_tel" value="telephonique" class="d-none"
                                onfocus="setFocus(true)" onblur="setFocus(false)">
                            <label for="event_tel" class="btn action-check">
                                <i class="bi bi-telephone"></i> {{ __("generated.Téléphonique") }}
                            </label>
                        </div>
                        <div class="col-3 text-center">
                            <input type="radio" name="event_type" id="event_visio" value="visioconference"
                                onfocus="setFocus(true)" onblur="setFocus(false)" class="d-none" checked>
                            <label for="event_visio" class="btn action-check">
                                <i class="bi bi-camera-video"></i> {{ __("generated.Visioconférence") }}
                            </label>
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center">
                        <div class="col-auto">
                            <div class="input-box">
                                <label class="label"></label>
                                <input type="date" class="input-1" name="date" onfocus="setFocus(true)"
                                    onblur="setFocus(false)" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="input-box">
                                <label class="label"></label>
                                <input type="time" class="input-1" min="00:00" max="23:59" name="start_time" id="meetingStartTime"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" />
                            </div>
                        </div>
                        <div class="col-auto" style="padding-top: 25px;">
                            <span>{{ __("generated.À :") }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="input-box">
                                <label class="label"></label>
                                <input type="time" class="input-1" min="00:00" max="23:59" name="end_time" id="meetingEndTime"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" />
                            </div>
                        </div>
                        <div class="col-auto" style="padding-top: 25px;">
                            <span>{{ __("generated.Pour ") }}</span>
                        </div>
                        <div class="col-auto" style="width: 159px;">
                            <div class="input-box">
                                <label class="label" id="eventTime">15
                                    Minutes</label>
                                <input type="time" disabled class="input-1" name="time" style="color: #fff" id="meetingDuration"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" />
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-0 location-part">
                        <div class="col-12">
                            <div
                                class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input type="text" name="location" class="form-control border-start-0"
                                            onfocus="setFocus(true)" onblur="setFocus(false)" >
                                        <label >{{ __("generated.Localisation") }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center mb-0">
                        <div class="col-12">
                            <label class="label">{{ __("generated.Destinataires") }}</label>
                            <div class="input-box">
                                <select name="destinataires[]" class="chosenoptgroup w-100 input-1 select2" data-placeholder="Sélectionnez certaines options"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="destinataires" multiple>
                                    @foreach ($members as $member)
                                        <option value="{{ __($member['id']) }}" data-type="{{ __($member['type']) }}">
                                            {{ __($member['email']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 align-items-center mb-0">
                        <div class="col-12">
                            <label class="label">{{ __("generated.Participants") }}</label>
                            <div class="input-box">
                                <select name="participants[]" class="chosenoptgroup w-100 input-1 select2"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="participants" multiple data-placeholder="Sélectionnez certaines options">
                                    @foreach ($members as $member)
                                        <option value="{{ __($member['id']) }}" data-type="{{ __($member['type']) }}">
                                            {{ __($member['email']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="participants_meta" name="participants_meta">
                    <input type="hidden" id="destinataires_meta" name="destinataires_meta">
                    {{-- <div class="row align-items-center mb-0">
                        <div class="col-12">
                            <label class="label">Destinataires</label>
                            <div class="input-box">
                                <select name="destinataires[]" class="chosenoptgroup w-100 input-1 select2"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="destinataires" multiple>
                                    @foreach ($members as $member)
                                        <option value="{{ __($member['id']) }}">{{ __($member['email']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-center mb-0">
                        <div class="col-12">
                            <label class="label">Participants</label>
                            <div class="input-box">
                                <select name="participants[]" class="chosenoptgroup w-100 input-1 select2"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="participants" multiple>
                                    @foreach ($members as $member)
                                        <option value="{{ __($member['id']) }}">{{ __($member['email']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> --}}


                    <div class="row mb-2 align-items-center mb-0 visio-part">
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-auto">
                                    <i class="bi bi-camera-video" style="font-size: 16px"></i>
                                </div>
                                <div class="col-auto ps-0" style="margin-top: 2px">
                                    <span>{{ __("generated.Entretien Visioconférence") }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"
                            style="border: 1px solid #dadce0;padding: 14px;border-radius: 5px;margin-left: 30px;width: 22%;font-size: 13px;">
                            <div class="row">
                                <div class="col-auto">
                                    <span id="meet-result">{{ __("generated.url_manuel") }}</span>
                                </div>
                                <div class="col-auto ms-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Manuel-url">{{ __("generated.url_manuel") }} </a></li>
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Google-url">{{ __("generated.google_meet") }}</a></li>
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Teams-url">{{ __("generated.microsoft_teams") }}</a></li>
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Zoom-url">Zoom</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto to-change-meet" style="width: 44.5%;">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input  type="url" name="event_url" class="form-control border-start-0" id="meetingLink"
                                            onfocus="setFocus(true)" onblur="setFocus(false)" >
                                        <label >{{ __("generated.Saisir l'URL") }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="message-div hidden">
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center mb-2">
                        <div class="col-sm-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="importanceSwitch"
                                    name="importance">
                                <label class="form-check-label" for="importanceSwitch">{{ __("generated.Importance élevée") }}</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">{{ __("generated.Rappels") }}</label>
                            <div class="input-box">
                                <select name="reminder" class="input-1" onfocus="setFocus(true)"
                                    onblur="setFocus(false)">
                                    <option value="5">{{ __("generated.5_minutes") }}</option>
                                    <option value="10">{{ __("generated.10_minutes") }}</option>
                                    <option value="15">{{ __("generated.15_minutes") }}</option>
                                    <option value="30">{{ __("generated.30_minutes") }}</option>
                                    <option value="60">{{ __("generated.1_hour") }}</option>
                                    <option value="1440">{{ __("generated.1_day") }}</option>
                                    <option value="2880">{{ __("generated.2_day") }}</option>
                                    <option value="10080">{{ __("generated.1_week") }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto  w-100">

                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <textarea placeholder="Description" class="form-control border-start-0 h-auto w-100" name="description" rows="6"
                                    onfocus="setFocus(true)" onblur="setFocus(false)"></textarea>
                                <label><span >{{ __("generated.Description") }}</span></label>
                            </div>
                        </div>
                        <div class="message-div hidden">
                        </div>

                    </div>
                    <div class="row mt-2 gx-2 mt-4">
                        <p>{{ __("generated.Pièces jointes") }}</p>
                        <div class="col-12 col-md-12 mb-2">
                            <div class="card border-0">
                                <div class="card-body lettre-1">
                                    <div class="attachments-container" id="attachments-container">
                                    </div>
                                    <div class="file-upload">
                                        <input type="file" id="file-input-cv" name="attachments[]" multiple
                                            class="doc-file-input profileCvInput" accept=".pdf,.doc,.docx"
                                            onfocus="setFocus(true)" onblur="setFocus(false)">
                                        <label for="file-input-cv">
                                            <span style="padding: 2px 8px;">{{ __("generated.select_files") }}</span>
                                            <br>
                                            {{ __("generated.types_files") }}
                                        </label>
                                        <div id="file-preview-cv" class="file-preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-trash h4 me-2"></i> {{ __("generated.Annuler") }}
                                </button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-theme" type="button" id="save-favorite"
                                    onclick="saveEvent('favorite')">
                                    <i class="bi bi-star me-2"></i> {{ __("generated.save_favorite") }}
                                </button>
                                <button class="btn btn-theme" type="button" id="save-draft"
                                    onclick="saveEvent('draft')">
                                    <i class="bi bi-file-earmark-text me-2" style="color: #005dc7 !importants;"></i>
                                    {{ __("generated.draft") }}
                                </button>
                                <button class="btn btn-theme" type="button" style="color: #005dc7 !importants;"
                                    onclick="saveEvent('save')">
                                    <i class="bi bi-floppy me-2"></i> {{ __("generated.Enregistrer") }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
