
<ul class="nav nav-tabs justify-content-center nav-adminux nav-lg" id="myTab" role="tablist" style="margin-top: 3%">
 
    <li class="nav-item" role="presentation6">
    <button style="font-size: 14px" class="nav-link translated_text active" id="sub-personal6-tab" data-bs-toggle="tab"
        data-bs-target="#sub-personal6" type="button" role="tab" aria-controls="sub-personal6"
        aria-selected="true">Recommandations</button>
</li>

   
</ul>

<div class="tab-content py-3 custom-profile-create-bg" id="mySubTabContent" 
{{-- style="background-color: #fff" --}}
> 
    <div class="card border-0 mb-3 bg-none shadow-none"> 
        <div class="card border-0 mb-3 bg-none shadow-none">
            <input type="file" id="demofile" class="hidden">
            <figure class="cover-figure coverimg w-100 h-300 mb-0 position-relative rounded">
                <img src="{{ $profile->cover_photo ? asset('storage/' . $profile->cover_photo) : asset('assets/img/icon/auth-bg-cover.jpg') }}"
                    class="mw-100 profile-cover" alt="Cover Image" />
            </figure>
            <div class="row align-items-start justify-content-center mb-3">
                <div class="col-auto position-relative">
                    <figure
                        class="avatar-figure avatar avatar-160 coverimg rounded-circle top-80 shadow-md border-3 border-light"
                        style="background-size: cover;">
                       <img src="{{ $profile->path_picture ? asset('storage/' . $profile->path_picture) : asset('assets/img/icon/photo-empty.png') }}"
                           class="profile-avatar custom-file-input" alt="Profile Avatar" />
                    </figure>
                </div>

                <div class="row align-items-start justify-content-center mt-4">
                    <div class="col-auto">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="Prénom" 
                                    value="{{ $profile->last_name ?? '' }}"
                                class="form-control border-start-0 translated_text" readonly>
                                <label class="translated_text">Prénom</label>
                            </div>
                        </div>
                        <div class="invalid-feedback translated_text">Please enter valid input</div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group mb-3 position-relative is-valid check-valid">
                            <div class="form-floating">
                                <input type="text" placeholder="Nom" 
                                    value="{{ $profile->first_name ?? '' }}"
                                    class="form-control border-start-0 translated_text" readonly>
                                <label class="translated_text">Nom </label>
                            </div>
                        </div>
                        <div class="invalid-feedback translated_text">Please enter valid input</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

   <div class="tab-pane fade show active" id="sub-personal6" role="tabpanel" aria-labelledby="sub-personal6-tab">
    @include('profile.inc.create.recommandationsModal')
</div>

</div>
</div>
</div>
