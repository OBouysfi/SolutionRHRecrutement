<div class="card border-0" style="margin-top: -34px;margin-bottom: 19px;">
    <div class="card-header bg-gradient-theme-light">
        <div class="row align-items-center">
            {{-- <div class="col-auto">
                <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
            </div> --}}
            <div class="col ps-0">
                <h6 class="fw-medium mb-0 ">{{ __("generated.Lettre de motivation") }}</h6>
            </div>
            <div class="col-auto">
                <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('7')">
                    <i class="bi bi-pen h5 me-1 avatar avatar-40 bg-light-theme rounded me-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Modifier"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center py-2">
    <div class="col-12">
        <div class="card border-0 mb-4">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body" style="padding: 15px 42px;">
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <span class="ms-auto"
                                            style="float: right;font-size: 14px; text-align: justify;color: #5d6266 !important;">
                                            {{ $coverLetter->created_at ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <p class="text-secondary"
                                        style="font-size: 14px; text-align: justify;">
                                        <span >{{ __("generated.Objet :") }}</span>{{ $coverLetter->subject ?? '' }}<br><br>
                                        {{ $coverLetter->description ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mb-4">
            <a href="{{ route('candidate-portal.profile.edit') }}" onclick="saveTabAndGo('7')">
                <button class="btn btn-theme " type="button"
                    style="font-size: 12px;float: right;margin-right: 10px">{{ __("generated.Modifier") }}</button></a>
        </div>
    </div>
</div>
