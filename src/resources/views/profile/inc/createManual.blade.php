{{-- <div class="tab-pane fade show active" id="manuel" role="tabpanel" aria-labelledby="manuel-tab">
    <div class="row"> --}}
<ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist">
    <!-- <li class="nav-item" role="presentation">
        <button style="font-size: 14px" class="nav-link " id="sub-personal0-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal0" type="button" role="tab" aria-controls="sub-personal"
            aria-selected="true">{{ __("generated.Parcing") }}</button>
    </li> -->
    <li class="nav-item" role="presentation">
        <button style="font-size: 14px" class="nav-link active" id="sub-personal1-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal1" type="button" role="tab" aria-controls="sub-personal"
            aria-selected="true">{{ __("generated.Informations") }}</button>
    </li>
    <li class="nav-item" role="presentation2">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal2-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal2" type="button" role="tab" aria-controls="sub-personal2"
            aria-selected="true">{{ __("generated.Formations") }}</button>
    </li>
    <li class="nav-item" role="presentation3">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal3-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal3" type="button" role="tab" aria-controls="sub-personal3"
            aria-selected="true">{{ __("generated.Expériences") }}</button>
    </li>
    <li class="nav-item" role="presentation4">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal4-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal4" type="button" role="tab" aria-controls="sub-personal4"
            aria-selected="true">{{ __("generated.Compétences") }}</button>
    </li>
    <li class="nav-item" role="presentation5">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal5-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal5" type="button" role="tab" aria-controls="sub-personal5"
            aria-selected="true">{{ __("generated.Langues") }}</button>
    </li>
    <li class="nav-item" role="presentation6">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal6-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal6" type="button" role="tab" aria-controls="sub-personal6"
            aria-selected="true">{{ __("generated.Recommandations") }}</button>
    </li>
    <li class="nav-item" role="presentation7">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal7-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal7" type="button" role="tab" aria-controls="sub-personal7"
            aria-selected="true">{{ __("generated.Lettre de motivation") }}</button>
    </li>
    <li class="nav-item" role="presentation8">
        <button style="font-size: 14px" class="nav-link  " id="sub-personal8-tab" data-bs-toggle="tab"
            data-bs-target="#sub-personal8" type="button" role="tab" aria-controls="sub-personal8"
            aria-selected="true">{{ __("generated.Attentes") }}</button>
    </li>
</ul>

<div class="tab-content py-3 custom-profile-create-bg" id="mySubTabContent" 
{{-- style="background-color: #fff" --}}
> 
    <div class="card border-0 mb-3 bg-none shadow-none"> 
        <div class="card border-0 mb-3 bg-none shadow-none">
            <input type="file" id="demofile" class="hidden">
            <figure class="cover-figure coverimg w-100 h-300 mb-0 position-relative rounded">
                <div class="position-absolute top-0 end-0 m-3">
                    <label class="btn btn-light d-flex justify-content-between">
                    <i class="bi bi-camera" style="margin-right: 5px !important;"></i><span >{{ __("generated.Modifier la couverture") }}</span>

                        <input type="file" name="profile_cover" class="custom-file-input profilecoverlightinput"
                            id="profilecoverlightinput" accept="image/*" />
                    </label>
                </div>
                <img src="{{ isset($profile) ? $profile->cover : asset('assets/img/icon/auth-bg-cover.jpg') }}"
                    class="mw-100 profile-cover" alt="" />
            </figure>
            <div class="row align-items-start justify-content-center mb-3">
                <div class="col-auto position-relative">
                    <figure
                        class="avatar-figure avatar avatar-160 coverimg rounded-circle top-80 shadow-md border-3 border-light"
                        style="background-size: cover;">
                        <img src="{{ isset($profile) ? $profile->avatar : asset('assets/img/icon/photo-empty.png') }}"
                            class="profile-avatar custom-file-input" alt="" />
                    </figure>
                    <div class="position-absolute bottom-0 end-0 z-index-1 me-3 mb-1 h-auto">
                        <label class="btn btn-theme btn-44 shadow-sm rounded-circle input-btn">
                            <i class="bi bi-camera"></i>
                            <input type="file" name="profile_avatar"
                                class="custom-file-input profileavatarlightinput" id="profileavatarlightinput"
                                accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="row align-items-start justify-content-center mt-4 civillity-section"
                    id="civillity-section" style="display: flex;">
                    <div class="col-auto">
                        <div class="form-check form-check-circle">
                            <input class="form-check-input priceupgrade1" type="radio" name="civility1"
                                value="1" id="priceupgrade1" style="margin-top: 3px"
                                @if (isset($profile) && $profile->civility && $profile->civility == '1') selected @endif>
                            <label class="form-check-label" for="priceupgrade1">
                                <span class="h6 " style="font-size: 15px;font-weight: 100;">{{ __("generated.Homme") }}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-circle">
                            <input class="form-check-input priceupgrade2" type="radio" name="civility1"
                                value="2" id="priceupgrade2" style="margin-top: 3px"
                                @if (isset($profile) && $profile->civility && $profile->civility == '2') selected @endif>
                            <label class="form-check-label" for="priceupgrade2">
                                <span class="h6 " style="font-size: 15px;font-weight: 100;">{{ __("generated.Femme") }}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start justify-content-center mt-4" id="name-section"
                    style="display: none;">
                    <div class="col-auto">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="Prénom" id="profileFirstName"
                                    value="@if (isset($profile) && $profile->first_name) {{ __($profile->first_name) }} @endif"
                                    required class="form-control border-start-0 translated_text">
                                <label >{{ __("generated.Prénom") }}</label>
                            </div>
                        </div>
                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="Nom" id="profileLastName"
                                    value="@if (isset($profile) && $profile->last_name) {{ __($profile->last_name) }} @endif" required
                                    class="form-control border-start-0 translated_text">
                                <label >{{ __("generated.Nom") }}</label>
                            </div>
                        </div>
                        <div class="invalid-feedback ">{{ __("generated.Please enter valid input") }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- personal info tab-->
    <!-- <div class="tab-pane fade" id="sub-personal0" role="tabpanel" aria-labelledby="sub-personal0-tab">
        @include('profile.inc.create.parcing')
    </div> -->
    <div class="tab-pane fade show active" id="sub-personal1" role="tabpanel" aria-labelledby="sub-personal1-tab">
        @include('profile.inc.create.informations')
    </div>
    <div class="tab-pane fade" id="sub-personal2" role="tabpanel" aria-labelledby="sub-personal2-tab">
        @include('profile.inc.create.formations')
    </div>

    <div class="tab-pane fade" id="sub-personal3" role="tabpanel" aria-labelledby="sub-personal3-tab">
        @include('profile.inc.create.experiences')
    </div>

    <div class="tab-pane fade" id="sub-personal4" role="tabpanel" aria-labelledby="sub-personal4-tab">
        @include('profile.inc.create.competences')
    </div>

    <div class="tab-pane fade" id="sub-personal5" role="tabpanel" aria-labelledby="sub-personal4-tab">
        @include('profile.inc.create.languages')
    </div>

    <div class="tab-pane fade" id="sub-personal6" role="tabpanel" aria-labelledby="sub-personal5-tab">
        @include('profile.inc.create.recommandations')
    </div>

    <div class="tab-pane fade" id="sub-personal7" role="tabpanel" aria-labelledby="sub-personal7-tab">
        @include('profile.inc.create.coverLetter')
    </div>

    <div class="tab-pane fade" id="sub-personal8" role="tabpanel" aria-labelledby="sub-personal8-tab">
        @include('profile.inc.create.attentes')
    </div>
</div>
</div>
</div>
