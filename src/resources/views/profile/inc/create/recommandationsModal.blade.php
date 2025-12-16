<div class="card border-0 mb-3">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
                  <div class="col-9">
                    <h6 class="fw-medium mb-0 translated_text">{{ __('generated.Recommandations') }}</h6>
                </div>
        
         </div>
       
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div id="recommandations-container">
                </div>
                <form id="recommandation-form" method="POST" enctype="multipart/form-data" action="{{ route('recommandation.form.store', $token) }}">
                    @csrf
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row justify-content-center" style="padding: 30px">
                                {{-- <h4 class="title custom-title mb-5 translated_text">Recommandations</h4> --}}
                                <div class="col-11">
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
                                                        <input type="text" placeholder="{{ __('generated.Prénom') }}" value=""
                                                            name="first_name" required=""
                                                            class="form-control border-start-0">
                                                        <label><span class="translated_text">{{ __('generated.Prénom') }} <span class="text-themeColor">*</span></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback translated_text">{{ __('generated.Please enter valid input') }}</div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-2 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="{{ __('generated.Nom') }}" value=""
                                                            name="last_name" required=""
                                                            class="form-control border-start-0">
                                                        <label><span class="translated_text">{{ __('generated.Nom') }} <span class="text-themeColor">*</span></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback translated_text">{{ __('generated.Please enter valid input') }}</div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="input-group input-group-lg">
                                                    <div class="form-floating">
                                                        <input type="text" placeholder="{{ __('generated.Entreprise') }}" 
                                                            name="company" required=""
                                                            class="form-control border-start-0">
                                                        <label><span class="translated_text">{{ __('generated.Entreprise') }} <span class="text-themeColor">*</span></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback translated_text">{{ __('generated.Please enter valid input') }}</div>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3 mt-3">
                                            <div class="form-group mb-3 position-relative is-valid check-valid">
                                                <div class="custom-multiple-select rounded border poste-chosen"
                                                    style="border-radius: 8px !important;">
                                                    <div class="input-group input-group-lg">
                                                        <label><span class="translated_text">{{ __('generated.Poste') }} <span class="text-themeColor">*</span></span></label>
                                                        <select class="chosenoptgroup w-100" name="poste"
                                                            id="professiont-select">
                                                            {{-- <option value="Tous">Tous</option> --}}
                                                            @if (isset($posts))
                                                                @foreach ($posts as $post)
                                                                    <option value="{{ $post->id }}">
                                                                        {{ $post->label }}</option>
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
                                                    <textarea placeholder="{{ __('generated.Missions') }}" class="form-control border-start-0 h-auto" name="message" rows="6"></textarea>
                                                    <label><span class="translated_text">{{ __('generated.Message') }} </span><span class="text-themeColor">*</span></label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback mb-3 translated_text">{{ __('generated.Add insert valid data') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
<div class="row mt-3 mb-4 mt-4" style="float: right">
    <div class="col-auto">
        <!-- submit button -->
        <button class="btn btn-theme translated_text" type="button" onclick="submitRecommandationForm()">{{ __('generated.Enregistrer') }}</button>
    </div>
  
</div>

<script>
    function submitRecommandationForm() {
        document.getElementById('recommandation-form').submit();
    }
</script>

