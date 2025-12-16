<div class="card border-0 mb-3">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
                  <div class="col-9">
            <h6 class="fw-medium mb-0 translated_text">{{ __("generated.Recommandations") }}</h6>
        </div>
        <div class="col-3 text-end">
            <div class="avatar avatar-50 rounded bg-light-theme  translated_text"
                data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __("generated.Partager") }}">
                <a href="#" type="button" data-bs-toggle="modal"
                    data-bs-target="#emailModal">
                    <i class="bi bi-share avatar icon-bw rounded h5"></i>
                </a>
            </div>
        </div>
        </div>
       
    </div>
    <div class="card-body p-0">
        <div class="row">
            <div class="col-12">
                <div id="recommandations-container">
                </div>
                {{-- <form id="profile-form-recommandations" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row justify-content-center" style="padding: 30px">
                                {{-- <h4 class="title custom-title mb-5 translated_text">{{ __("generated.Recommandations") }}</h4> --}}
                                {{-- <div class="col-11">
                                    <div class="row">

                                        <div class="col-12 col-lg-3 col-xl-2">
                                            <div class="position-relative" style="width: 150px; margin: auto;">
                                                <figure
                                                    class="avatar avatar-100 coverimg  top-80 shadow-md border-3 border-light"
                                                    style="background-image: url(&quot;assets/img/icon/empty-logo.png&quot;);line-height: 0 !important;margin-top: 16px !important;background-repeat: no-repeat;background-size: 127px;">
                                                    <img src="{{ asset('assets/img/icon/empty-logo.png') }}"
                                                        alt="" style="display: none;">
                                                </figure>
                                                <div
                                                    class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto custom-image-logo">
                                                    <label
                                                        class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                                                        <i class="bi bi-camera"></i>
                                                        <input type="file" name="photo"
                                                            class="custom-file-input user-logo logo" id="user-logo"
                                                            accept="image/*" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-2 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="Prénom" value=""
                                                            name="first_name" required=""
                                                            class="form-control border-start-0">
                                                        <label><span class="translated_text">Prénom <span
                                                                    class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-2 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="Nom" value=""
                                                            name="last_name" required=""
                                                            class="form-control border-start-0">
                                                        <label><span >{{ __("generated.Nom") }}</span><span
                                                                class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="Entreprise" value=""
                                                            name="company" required=""
                                                            class="form-control border-start-0">
                                                        <label><span class="translated_text">Entreprise <span
                                                                    class="text-themeColor">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback translated_text">Please enter valid input</div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-radius: 8px !important;">
                                                    <div class="input-group input-group-lg">
                                                        <label><span >{{ __("generated.Poste") }}</span><span
                                                                class="text-themeColor">*</span></label>
                                                        <select class="chosenoptgroup w-100" name="poste"
                                                            id="professiont-select">
                                                            {{-- <option value="Tous">Tous</option> --}}
                                                            {{-- @if (isset($posts))
                                                                @foreach ($posts as $post)
                                                                    <option value="{{ __($post->id) }}">
                                                                        {{ __($post->label) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="form-floating">
                                                    <textarea placeholder="Missions" class="form-control border-start-0 h-auto" name="message" rows="6"></textarea>
                                                    <label><span >{{ __("generated.Message") }}</span><span
                                                            class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback mb-3 ">{{ __("generated.Add insert valid data") }}</div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-danger mb-2 mx-2" type="button"
                                                style="font-size: 12px;float: right;">Supprimer</button>
                                            <button class="btn btn-theme btn-ajouter mb-2 mx-2 "
                                                type="button" onclick="saveForm('recommandations', 5)"
                                                data-form-id="profile-form-recommandations"
                                                style="font-size: 12px;float: right;margin-right: 10px; background-color: #26b6ea;">{{ __("generated.Ajouter une recommandation") }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- </div> --}} 
                    {{-- </div>
                </form>  --}}
            </div>
        </div>
    </div>
</div>
<div class="row mt-3 mb-4 mt-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme " type="button" onclick="switchToNextTab(6)">{{ __("generated.Enregister") }}</button>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-theme btn-annuler " type="button">{{ __("generated.Annuler") }}</button>
    </div>
</div>


<!-- Modal Partager -->
<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> <!-- Center vertically -->
    <div class="modal-content">
      <form method="POST" action="{{ route('recommendation.send') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="emailModalLabel">{{ __("generated.Envoyer le lien temporaire") }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="profile_id" value="{{ $profile->id ?? '' }}"> 
          <div class="mb-3">
            {{-- <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" name="email" required> --}}
            <div class="form-group mb-3 position-relative check-valid is-valid">
                <div class="input-group input-group-lg">
                        <div class="form-floating">
                            <input type="email" class="form-control border-start-0" id="folderName" name="email"
                        required>
                            <label class="translated_text text-bw">{{ __("generated.Adresse Email") }}</label>
                        </div>
                </div>
               
            </div>
            <div class="form-group check-valid is-valid">
                <div class="input-group input-group-lg">
                    <div class="form-floating">
                        <input type="text" class="form-control border-start" id="contactName" name="contactName"
                        required>
                        <label class="translated_text text-bw">{{ __("generated.Nom du contact") }}</label>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">{{ __("generated.Envoyer") }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
 


<script>
$(document).ready(function() {
  $('#emailModal form').on('submit', function(e) {
    e.preventDefault();

    let form = $(this);
    let url = form.attr('action') || window.location.href;
    let data = form.serialize();

    $.post(url, data)
      .done(function(response) {
        Swal.fire({
          icon: 'success',
          title: 'Succès',
          text: 'Le lien a été envoyé avec succès !',
          confirmButtonText: 'OK'
        });
        $('#emailModal').modal('hide');
        form.trigger("reset");
      })
      .fail(function() {
        Swal.fire({
          icon: 'error',
          title: 'Erreur',
          text: 'Erreur lors de l\'envoi, veuillez réessayer.',
          confirmButtonText: 'OK'
        });
      });
  });
});
</script>

