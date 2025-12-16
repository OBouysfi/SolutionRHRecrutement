<div class="row mb-5">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="card border-0 h-100 ">
                            <div class="card-header">
                                <div class="row align-items-center" style="padding: 25px 12px 0px;">
                                    <div class="col-auto">
                                        <i class="bi bi-play-btn h5 avatar avatar-40 bg-light-blue text-blue rounded"
                                            style="font-size: 26px;"></i>
                                    </div>
                                    <div class="col">
                                        <h6 class="fw-medium mb-0 ">{{ __("generated.CV vidéo") }}</h6>
                                        <p class="text-secondary small">
                                            {{ $profile->cv_video_duration ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0" style="min-height: 518px;padding:15px 24px !important;">
                                <div class="row justify-content-center">
                                    @if ($profile->path_cv_video == null)
                                    <img src="{{ asset('assets/img/no-result-data-not-found-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-etc-vector.PNG') }}"
                                    alt="" style="width: 400px">
                                        <h4 class="text-center ">{{ __("generated.Ce profil n'a aucun CV Vidéo") }}</h4>
                                        <video style="width: 100%; display:none" id="myVideo" controls="false">
                                            <source src="" type="video/mp4" />
                                        </video>
                                    @else
                                        <video style="width: 100%;" id="myVideo" controls="false">
                                            <source src="{{ Storage::url($profile->path_cv_video) }}"
                                                type="video/mp4" />
                                        </video>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer" style="padding: 21px 13px;border-top: 10px solid #f7f9fa;">
                                <div class="row justify-content-center" style="display: none">
                                    <div class="col-12">
                                        <input id="seekBar" type="range" min="0" max="100"
                                            value="0">
                                    </div>
                                    <div class="col-2" style="margin-right: -33px;">
                                        <div class="custom-controls controls1">
                                            <div class="avatar avatar-50 rounded bg-light-cyan" id="playPause"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Lire"
                                                style="cursor: pointer;background-color: transparent !important;">
                                                <i class="bi bi-play-fill h2"></i>
                                            </div>

                                            <div class="avatar avatar-50 rounded bg-light-cyan hidden" id="rewind"
                                                style="cursor: pointer;background-color: transparent !important;">
                                                <i class="bi bi-rewind-btn h5"></i>
                                            </div>
                                            <span id="timeDisplay">00:00</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-controls controls2">
                                            <div class="volume-show">
                                                <div class="avatar avatar-50 rounded bg-light-cyan" id="mute"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Activer / Désactiver le son"
                                                    style="cursor: pointer;background-color: transparent !important;">
                                                    <i class="bi bi-volume-up h4"></i>
                                                </div>
                                                <input id="volumeBar" type="range" min="0" max="1"
                                                    step="0.1" value="1" class="hidden">
                                            </div>
                                            <div class="avatar avatar-50 rounded bg-light-cyan" id="fullscreen"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Plein écran"
                                                style="cursor: pointer;background-color: transparent !important;">
                                                <i class="bi bi-fullscreen h4"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
