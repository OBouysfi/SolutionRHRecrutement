<div class="modal fade" id="detailEventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-block">
                <form id="update-event-form">
                    @csrf
                    <input type="text" id="show_event_id" name="id" hidden>
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <div class="avatar avatar-40 rounded bg-light-blue">
                                <a href="#" type="button">
                                    <i style="font-size: 20px" class="bi bi-calendar-week avatar   rounded"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="fw-medium mb-0">{{ __("generated.Modifier un événement")}}</h5>
                        </div>
                    </div>

                    <div class="row align-items-center mb-2">
                        <div class="col-12">
                            <div
                                class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input  type="text" name="title" class="form-control border-start-0" id="show_title"
                                            onfocus="setFocus(true)" onblur="setFocus(false)" readonly>
                                        <label >{{ __("generated.Ajouter un titre *") }}</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="custom-multiple-select rounded border poste-chosen"
                                    style="border-radius: 8px !important;">
                                    <label class="translated_text text-bw">{{ __("generated.Client")}}</label>
                                    <select class="chosenoptgroup w-100" id="client_id" name="client_id">
                                        <option selected class="translated_text">{{ __("generated.Sélectionnez un client")}}
                                        </option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3 position-relative check-valid is-valid">
                                <div class="custom-multiple-select rounded border poste-chosen"
                                    style="border-radius: 8px !important;">
                                    <label class="translated_text text-bw">{{ __("generated.Mission")}}</label>
                                    <select class="chosenoptgroup w-100" id="job_offer_id" name="job_offer_id">
                                        <option selected class="translated_text">{{ __("generated.Sélectionnez une mission")}}
                                        </option>
                                        @foreach ($jobOffers as $jobOffer)
                                            <option value="{{ $jobOffer->id }}"
                                                data-client-id="{{ $jobOffer?->client_id }}">
                                                {{ $jobOffer->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 text-center">
                            <input type="radio" name="event_type" id="show_event_presentiel" value="presentiel"
                                onfocus="setFocus(true)" onblur="setFocus(false)" class="d-none" readonly>
                            <label for="event_pres" class="btn action-check w-100">
                                <i class="bi bi-geo-alt"></i> {{ __("generated.Présentiel")}}
                            </label>
                        </div>
                        <div class="col-3 text-center">
                            <input type="radio" name="event_type" id="show_event_telephonique" value="telephonique"
                                onfocus="setFocus(true)" onblur="setFocus(false)" class="d-none" readonly>
                            <label for="event_tel" class="btn action-check w-100">
                                <i class="bi bi-telephone"></i> {{ __("generated.Téléphonique")}}
                            </label>
                        </div>
                        <div class="col-3 text-center">
                            <input type="radio" name="event_type" id="show_event_visioconference"
                                onfocus="setFocus(true)" onblur="setFocus(false)" value="visioconference"
                                class="d-none">
                            <label for="event_visio" class="btn action-check w-100" readonly>
                                <i class="bi bi-camera-video"></i> {{ __("generated.Visioconférence")}}
                            </label>
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center">
                        <div class="col-3">
                            <div class="input-box">
                                <label class="input-label"></label>
                                <input type="date" class="input-1" name="date" id="show_date"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" readonly />
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="input-box">
                                <label class="input-label"></label>
                                <input type="time" class="input-1" min="00:00" max="23:59" name="start_time"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="show_start_time" readonly />
                            </div>
                        </div>
                        <div class="col-auto" style="padding-top: 25px;">
                            <span>À</span>
                        </div>
                        <div class="col-auto">
                            <div class="input-box">
                                <label class="input-label"></label>
                                <input type="time" class="input-1" min="00:00" max="23:59" name="end_time"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="show_end_time" readonly />
                            </div>
                        </div>
                        <div class="col-auto" style="padding-top: 25px;">
                            <span>Pour</span>
                        </div>
                        <div class="col-auto" style="width: 140px;">
                            <div class="input-box">
                                <label class="input-label" id="eventTime" style="color: #000;font-size: 14px;">15
                                    {{ __("generated.Minutes")}}</label>
                                <input type="time" disabled class="input-1" name="time" style="color: #fff"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" readonly />
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
                                        <input  type="text" class="form-control border-start-0" id="show_location"
                                            onfocus="setFocus(true)" onblur="setFocus(false)" readonly >
                                        <label >{{ __("generated.Localisation") }}</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row align-items-center mb-3">
                        <div class="col-12">
                            <label class="input-label">{{ __("generated.Destinataires")}}</label>
                            <div class="custom-multiple-select rounded border poste-chosen pt-2"
                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <select name="destinataires[]" class="chosenoptgroup w-100 input-1 select2" data-placeholder="Sélectionnez certaines options"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="show_destinataires"
                                    disabled multiple>
                                    @foreach ($members as $member)
                                        <option value="{{ __($member['id']) }}">{{ __($member['email']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-center mb-0">
                        <div class="col-12">
                            <label class="input-label">{{ __("generated.Participants")}}</label>
                            <div class="custom-multiple-select rounded border poste-chosen pt-2"
                                style="border-bottom: 1px solid var(--adminux-theme) !important;border-radius: 8px !important;">
                                <select name="participants[]" class="chosenoptgroup w-100 input-1 select2" data-placeholder="Sélectionnez certaines options"
                                    onfocus="setFocus(true)" onblur="setFocus(false)" id="show_participants" disabled
                                    multiple>
                                    @foreach ($members as $member)
                                        <option value="{{ __($member['id']) }}">{{ __($member['email']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-center mb-0 visio-part">
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-auto">
                                    <i class="bi bi-camera-video" style="font-size: 16px"></i>
                                </div>
                                <div class="col-auto ps-0" style="margin-top: 2px">
                                    <span>{{ __("generated.Entretien Visioconférence")}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"
                            style="border: 1px solid #dadce0;padding: 14px;border-radius: 5px;margin-left: 30px;width: 22%;font-size: 13px;">
                            <div class="row">
                                <div class="col-auto">
                                    <span id="meet-result">{{ __("generated.URL manuel")}}</span>
                                </div>
                                <div class="col-auto ms-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Manuel-url">{{ __("generated.URL manuel")}}</a></li>
                                            {{-- <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Google-url">Google Meet</a></li>
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Teams-url">Microsoft Teams</a></li>
                                            <li><a class="dropdown-item meet-action" href="javascript:void(0)"
                                                    id="Zoom-url">Zoom</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto to-change-meet" style="width: 44.5%;">
                            
                            <div
                                class="form-group mb-3 mt-3 position-relative check-valid is-valid">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="input-group input-group-lg">
                                    <div class="form-floating">
                                        <input  type="url" name="event_url" class="form-control border-start-0" id="show_url"
                                            onfocus="setFocus(true)" onblur="setFocus(false)" readonly >
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
                                <input class="form-check-input" type="checkbox" id="show_high_importance"
                                    name="importance" readonly>
                                <label class="form-check-label" for="importanceSwitch">{{ __("generated.Importance élevée")}}</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-2 position-relative check-valid is-valid rappel">
                                <!-- is-valid or is-invalid class can be toggled when user focus out and validation checked. on page reload also used.-->
                                <div class="custom-multiple-select rounded border poste-chosen"
                                    style="border-radius: 8px !important;">
                                    <label class="input-label">{{ __("generated.Rappels") }}</label>
                                    <div class="input-box">
                                        <select name="reminder" class="input-1" id="show_reminder" onfocus="setFocus(true)"
                                            onblur="setFocus(false)" disabled>
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
                        </div>
                    </div>
                    <div class="col-auto  w-100">
                        
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating mt-2">
                                <textarea placeholder="Description" class="form-control border-start-0 h-auto w-100 description" name="description" rows="6" id="show_description" 
                                    onfocus="setFocus(true)" onblur="setFocus(false)" readonly></textarea>
                                <!-- <label><span >{{ __("generated.Description") }}</span></label> -->
                            </div>
                        </div>
                        <div class="message-div hidden">
                        </div>
                    </div>
                    <div class="row mt-2 gx-2 mt-4">
                        <p>{{ __("generated.Pièces jointes")}}</p>
                        <div class="col-12 col-md-12 mb-2">
                            <div class="card border-0">
                                <div class="card-body lettre-1">
                                    <div class="attachments-container" id="attachments-container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-link text-danger" type="button" data-bs-dismiss="modal">
                                    <i class="bi bi-trash h4 me-2"></i> {{ __("generated.Annuler")}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
