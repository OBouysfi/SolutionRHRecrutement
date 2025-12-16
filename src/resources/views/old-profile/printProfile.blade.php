
<div class="row">
    <div class="col-12 col-lg-4 col-xl-3 mb-4">
        <div class="card border-0" style="height: 100%;">
            <div class="card-body" style="min-height: auto;">
                <div class="row mt-3">
                    <div class="col-auto ms-auto" style="margin-right: 3px;">
                        <div class="dropdown d-inline-block">
                            <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-display="static" role="button">
                                <i class="bi bi-three-dots-vertical" style="font-size: 19px"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="min-width: 10px;">
                                <li>
                                    <a class="dropdown-item "
                                        href="{{ route('profile.viewProfile', $profile?->id) }}"
                                        target="_blank">{{ __('generated.Aperçu') }}</a>
                                </li>
                                <li><a class="dropdown-item " type="button" data-bs-toggle="modal"
                                        data-bs-target="#emailcompose">{{ __('generated.Partager') }}</a></li>
                                <li><a class="dropdown-item" href=""
                                        onclick="printPage()">{{ __('generated.Imprimer') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-7 mb-2">
                        <figure
                        class=" rounded-circle coverimg custom-cv-img vm"
                        style="background-image: url('{{ $profile->getAvatarUrl() }}');">
                        <img src="{{ $profile->getAvatarUrl() }}" alt="Avatar" style="display: none;">
                    </figure>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <p style="text-align: center;font-weight: 700;font-size: 25px;margin-bottom: 2px;">
                            {{ $profile?->first_name && $profile?->last_name ? $profile?->first_name . ' ' . $profile?->last_name : '_' }}
                        </p>

                        <p class="text-secondary" style="text-align: center;">
                            {{ $profile?->profession?->label ?? ' - ' }}</p>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 14px !important;">
                        <div class="col">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="{{ __($profile?->url_facebook) }}"
                                        target="_blank">
                                        <i class="bi bi-facebook h3"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="{{ __($profile?->url_twitter) }}"
                                        target="_blank">
                                        <i class="bi bi-twitter-x h3"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="{{ __($profile?->url_linkedin) }}"
                                        target="_blank">
                                        <i class="bi bi-linkedin h3"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body pb-0 custom-color-icon"
                            style="padding-left: 36px;margin-top: 40px;">
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-telephone h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1 ">{{ __('generated.Téléphone') }}</p>
                                    <p>{{ $profile?->phone_primary ?? ' - ' }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-envelope h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1 ">{{ __('generated.E-mail') }}</p>
                                    <p>{{ $profile?->email ?? '_' }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-calendar2-heart h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1 ">
                                        {{ __('generated.Date de naissance') }}</p>
                                    <p>{{ \Carbon\Carbon::parse($profile?->birth_date)->toDateString() }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-geo h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1 ">
                                        {{ __('generated.Lieu de naissance') }}</p>
                                    <p>{{ $profile?->birth_place ?? '- ' }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-globe h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1 ">{{ __('generated.Nationalité') }}
                                    </p>
                                    <p>{{ $profile?->nationality_name->name ?? ' - ' }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-person-hearts h5 text-theme mb-0">
                                    </i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1 ">
                                        {{ __('generated.Situation familiale') }}</p>
                                    <p>{{ $profile?->family_situation ?? ' - ' }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card border-0 mb-4">
                                <div class="card-body">
                                    <a
                                        href="{{ route('detail.matching.cover.letter.preview', $profile?->id) }}">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-50 rounded bg-blue text-white">
                                                    <i class="bi bi-file-earmark-text h5 vm"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-1 ">
                                                    {{ __('generated.Lettre de motivation') }}</h6>
                                                <p class="text-secondary ">{{ __('generated.Candidat') }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card border-0 mb-4">
                                <div class="card-body">
                                    <a href="{{ route('detail.matching.cv.preview', $profile?->id) }}">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-50 rounded bg-red text-white">
                                                    <i class="bi bi-layout-text-sidebar-reverse h5 vm"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-1 ">
                                                    {{ __('generated.Curriculum Vitae') }}</h6>
                                                <p class="text-secondary ">{{ __('generated.Candidat') }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8 col-xl-9 mb-4">
        <div class="card border-0">
            <div class="card-header" style="padding: 0">
                <ul class="nav nav-tabs nav-adminux footer-tabs nav-fill" id="navtabscard30" role="tablist"
                    style="width: 100%;border-radius: 0;font-size: 18px;">
                    {{-- <li class="nav-item active" role="presentation">
                        <button class="nav-link active translated_text" id="tabM1220-tab"
                            data-bs-toggle="tab" data-bs-target="#tabM1220" type="button"
                            role="tab" aria-controls="tabM1220" aria-selected="false"
                            tabindex="-1">{{ __('generated.CV') }}</button>
                    </li> --}}
                    <li class="nav-item active " role="presentation">
                        <button class="nav-link active translated_text" id="tab1220-tab" data-bs-toggle="tab"
                            data-bs-target="#tab1220" type="button" role="tab" aria-controls="tab1220"
                            aria-selected="false" tabindex="-1">{{ __('generated.CV') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link translated_text" id="tabM11120-tab" data-bs-toggle="tab"
                            data-bs-target="#tabM11120" type="button" role="tab"
                            aria-controls="tabM11120" aria-selected="false"
                            tabindex="-1">{{ __('generated.CV vidéo') }}</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link translated_text" id="tabM1120-tab" data-bs-toggle="tab"
                            data-bs-target="#tabM1120" type="button" role="tab"
                            aria-controls="tabM1120" aria-selected="false"
                            tabindex="-1">{{ __('generated.Timeline') }}</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-3">

            <div class="card-body p-0">
                <div class="tab-content" id="nav-navtabscard30">
                    <div class="tab-pane fade show active" id="tab1220" role="tabpanel"
                        aria-labelledby="tab1220-tab">

                        <div class="row">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1220" role="tabpanel"
                                    aria-labelledby="tab1220-tab">
                                    <div class="tab-pane fade show active" id="posts" role="tabpanel"
                                        aria-labelledby="posts-tab">
                                        <div class="card border-0" style="margin-bottom: 19px;">
                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <i
                                                            class="bi bi-mortarboard h5 me-1 avatar avatar-40  rounded me-2"></i> --}}
                                                    </div>
                                                    <div class="col ps-0">
                                                        <h6 class="fw-medium mb-0 ">
                                                            {{ __('generated.Formations') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @forelse ($profile?->formations as $formation)
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body"
                                                                    style="padding-left: 30px">
                                                                    <div class="row mb-3 mt-3">
                                                                        <div class="col-auto">
                                                                            <img src="{{ $formation->logo && file_exists(public_path('storage/' . $formation->logo))
                                                                                ? asset('storage/' . $formation->logo)
                                                                                : asset('assets/img/high-school-modern-simple-icon-vector.jpg') }}"
                                                                                alt="Logo de la formation"
                                                                                style="width: 60px;">
                                                                        </div>
                                                                        <div class="col">
                                                                            <h6 class="translated_text">
                                                                                {{ $formation->name ?? ' - ' }}
                                                                            </h6>
                                                                            <p class="text-secondary"
                                                                                style="margin-bottom: 0;">
                                                                                {{ __($formation->diploma->label) ?? ' - ' }}
                                                                            </p>
                                                                            <p>
                                                                                {{ $formation->date ? \Carbon\Carbon::parse($formation->date)->locale('fr')->translatedFormat('d F Y') : ' - ' }}
                                                                            </p>
                                                                            <p>{{ __($formation->option->label) ?? ' - ' }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body"
                                                                    style="padding-left: 30px">
                                                                    <div class="row mb-3 mt-3">
                                                                        <div class="col-auto">
                                                                            <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                alt=""
                                                                                style="width: 60px;">
                                                                        </div>
                                                                        <div class="col px-5 py-3">
                                                                            <h6 class="translated_text">
                                                                                {{ __("generated.Ce profil n'a aucune formations") }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="tab-pane fade show active" id="posts2" role="tabpanel"
                                        aria-labelledby="posts2-tab">
                                        <div class="card border-0"
                                            style="margin-bottom: 19px;margin-top: 19px;">
                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <i
                                                            class="bi bi-briefcase h5 me-1 avatar avatar-40  rounded me-2"></i> --}}
                                                    </div>
                                                    <div class="col ps-0">
                                                        <h6 class="fw-medium mb-0 ">
                                                            {{ __('generated.Expériences') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @forelse($profile?->experiences as $experience)
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body" style="padding-left: ">
                                                                    <div class="row mb-3 mt-3">
                                                                        <div class="col-auto">
                                                                            <img src="{{ $experience->logo && file_exists(public_path('storage/' . $experience->logo))
                                                                                ? asset('storage/' . $experience->logo)
                                                                                : asset('assets/img/briefcase-icon-isolated-on-white-background-work-bag-symbol-free-vector.jpg') }}"
                                                                                alt="Logo de l'expérience"
                                                                                style="width: 60px;">
                                                                        </div>
                                                                        <div class="col">
                                                                            <h6 class="translated_text">
                                                                                {{ __($experience->profession?->label) }}
                                                                            </h6>
                                                                            <p
                                                                                class="text-secondary translated_text">
                                                                                {{ __('generated.Du') }}
                                                                                {{ $experience->started_at->translatedFormat('d/m/Y') }}
                                                                                {{ __('generated.à') }}
                                                                                {{ $experience->finished_at == null ? 'ce jour' : $experience->finished_at->translatedFormat('d/m/Y') }}
                                                                            </p>
                                                                            <p>{{ __($experience->description) }}
                                                                            </p>
                                                                            <h6 class="title ">
                                                                                {{ __('generated.Missions réalisées') }}
                                                                            </h6>
                                                                            <p><b>{{ __($experience->project_name) }}</b>
                                                                            </p>
                                                                            @foreach ($experience->missions as $mission)
                                                                                <p>{{ __($mission->description) }}
                                                                                </p>
                                                                            @endforeach
                                                                            <div class="row mb-4">
                                                                                @php
                                                                                    $skills = explode(
                                                                                        ',',
                                                                                        $experience->skills_tech,
                                                                                    );
                                                                                @endphp
                                                                                <div class="row mb-4">
                                                                                    @foreach ($skills as $skill)
                                                                                        <div class="col-auto">
                                                                                            <span
                                                                                                class="badge badge-sm bg-blue">#{{ trim($skill) }}</span>
                                                                                        </div>
                                                                                    @endforeach
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
                                        @empty
                                            <div class="card border-0 mb-3">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body"
                                                                    style="padding-left: 30px">
                                                                    <div class="row mb-3 mt-3">
                                                                        <div class="col-auto">
                                                                            <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                alt=""
                                                                                style="width: 60px;">
                                                                        </div>
                                                                        <div class="col px-5 py-3">
                                                                            <h6>{{ __("generated.Ce profil n'a aucune éxperience") }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="tab-pane fade show active" id="posts4" role="tabpanel"
                                        aria-labelledby="posts4-tab">
                                        <div class="card border-0"
                                            style="margin-bottom: 19px;margin-top: 19px;">
                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <i
                                                                class="bi bi-tools h5 me-1 avatar avatar-40  rounded me-2"></i> --}}
                                                    </div>
                                                    <div class="col ps-0">
                                                        <h6 class="fw-medium mb-0 ">
                                                            {{ __('generated.Compétences techniques') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                            @if ($skillsInType->first()->skillType->parent_id != 1)
                                                @continue
                                            @endif
                                            <div class="card border-0 mb-4">
                                                <div class="card-body p-0">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="card border-0">
                                                                <div class="card-header bg-gradient-theme-light"
                                                                    style="padding: 18px 10px;">
                                                                    <h6>{{ __('generated.Catégorie') }}</h6>
                                                                </div>
                                                                @php
                                                                    $skillTypeLabel =
                                                                        $skillsInType->first()?->skillType
                                                                            ->label ?? 'Unknown';
                                                                @endphp
                                                                <div class="card-body"
                                                                    style="min-height: 304px;">
                                                                    <span
                                                                        style="margin-top: 42%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ __($skillTypeLabel) }}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card border-0" style="height: 100%;">
                                                                <div class="card-body p-0"
                                                                    style="padding: 8px 10px; height: 100%;">
                                                                    <div style="height: 100%;">
                                                                        <table class="table offres-table"
                                                                            data-show-toggle="true"
                                                                            style="margin-bottom: 0px">
                                                                            <thead
                                                                                class="bg-gradient-theme-light">
                                                                                <tr>
                                                                                    <td style="border: 0;">
                                                                                        <h6>{{ __('generated.Compétences') }}
                                                                                        </h6>
                                                                                    </td>
                                                                                    <td style="border: 0;">
                                                                                        <h6>{{ __('generated.Niveau') }}
                                                                                        </h6>
                                                                                    </td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($skillsInType as $skill)
                                                                                    @php
                                                                                        $___skill = \DB::table(
                                                                                            'profiles_skills',
                                                                                        )
                                                                                            ->where(
                                                                                                'skill_id',
                                                                                                $skill?->id,
                                                                                            )
                                                                                            ->where(
                                                                                                'profile_id',
                                                                                                $profile?->id,
                                                                                            )
                                                                                            ->first();
                                                                                    @endphp
                                                                                    <tr>
                                                                                        <td>{{ __($skill?->label) }}
                                                                                        </td>
                                                                                        <td>
                                                                                            @switch($___skill?->level
                                                                                                ?? null)
                                                                                                @case(1)
                                                                                                    <span
                                                                                                        class="badge badge-sm bg-green">{{ __('generated.Débutant') }}</span>
                                                                                                @break

                                                                                                @case(2)
                                                                                                    <span
                                                                                                        class="badge badge-sm bg-yellow">{{ __('generated.Intermédiaire') }}</span>
                                                                                                @break

                                                                                                @case(3)
                                                                                                    <span
                                                                                                        class="badge badge-sm bg-blue">{{ __('generated.Avancé') }}</span>
                                                                                                @break

                                                                                                @case(4)
                                                                                                    <span
                                                                                                        class="badge badge-sm bg-red">{{ __('generated.Expert') }}</span>
                                                                                                @break

                                                                                                @default
                                                                                                    <span
                                                                                                        class="badge badge-sm bg-secondary">{{ __('generated.Inconnu') }}</span>
                                                                                            @endswitch
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            @empty

                                                <div class="card border-0 mb-3">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body"
                                                                        style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                    alt=""
                                                                                    style="width: 60px;">
                                                                            </div>
                                                                            <div class="col px-5 py-3">
                                                                                <h6>{{ __("generated.Ce profil n'a aucune compétence technique") }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                            <div class="card-header bg-gradient-theme-light">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        {{-- <i
                                                        class="bi bi-person h5 me-1 avatar avatar-40  rounded me-2"></i> --}}
                                                    </div>
                                                    <div class="col ps-0">
                                                        <h6 class="fw-medium mb-0 ">
                                                            {{ __('generated.Compétences personnelles') }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card border-0 mb-4">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0 ">
                                                            <div>
                                                                <table class="table offres-table"
                                                                    data-show-toggle="true"
                                                                    style="margin-bottom: 0px">
                                                                    <thead class="bg-gradient-theme-light">
                                                                        <tr>
                                                                            <th rowspan="2"
                                                                                style="font-weight: 600;border-bottom: 0;">
                                                                                <h6>{{ __('generated.Catégorie') }}
                                                                                </h6>
                                                                            </th>
                                                                            <th rowspan="2"
                                                                                style="font-weight: 600;border-bottom: 0;">
                                                                                <h6>{{ __('generated.Détail') }}
                                                                                </h6>
                                                                            </th>
                                                                            <th rowspan="2"
                                                                                style="font-weight: 600;border-bottom: 0;">
                                                                                <h6>{{ __('generated.Niveau') }}
                                                                                </h6>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                                                            @if ($skillsInType->first()->skillType->parent_id != 2)
                                                                                @continue
                                                                            @endif

                                                                            @php
                                                                                $skillTypeLabel =
                                                                                    $skillsInType->first()
                                                                                        ->skillType
                                                                                        ->label ??
                                                                                    'Unknown';
                                                                            @endphp

                                                                            @foreach ($skillsInType as $index => $skill)
                                                                                @php
                                                                                    $__skill = \DB::table(
                                                                                        'profiles_skills',
                                                                                    )
                                                                                        ->where(
                                                                                            'skill_id',
                                                                                            $skill?->id,
                                                                                        )
                                                                                        ->where(
                                                                                            'profile_id',
                                                                                            $profile?->id,
                                                                                        )
                                                                                        ->first();
                                                                                @endphp
                                                                                <tr>
                                                                                    @if ($index === 0)
                                                                                        <td
                                                                                            rowspan="{{ count($skillsInType) }}">
                                                                                            {{ __($skillTypeLabel) }}
                                                                                        </td>
                                                                                    @endif

                                                                                    <td>{{ __($skill?->label) }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @switch($__skill?->level ??
                                                                                            null)
                                                                                            @case(1)
                                                                                                <span
                                                                                                    class="badge badge-sm bg-green">{{ __('generated.Débutant') }}</span>
                                                                                            @break

                                                                                            @case(2)
                                                                                                <span
                                                                                                    class="badge badge-sm bg-yellow">{{ __('generated.Intermédiaire') }}</span>
                                                                                            @break

                                                                                            @case(3)
                                                                                                <span
                                                                                                    class="badge badge-sm bg-blue">{{ __('generated.Avancé') }}</span>
                                                                                            @break

                                                                                            @case(4)
                                                                                                <span
                                                                                                    class="badge badge-sm bg-red">{{ __('generated.Expert') }}</span>
                                                                                            @break

                                                                                            @default
                                                                                                <span
                                                                                                    class="badge badge-sm bg-secondary">{{ __('generated.Inconnu') }}</span>
                                                                                        @endswitch
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            @empty

                                                                                <div class="card border-0 mb-3">
                                                                                    <div class="card-body p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <div
                                                                                                    class="card border-0">
                                                                                                    <div class="card-body"
                                                                                                        style="padding-left: 30px">
                                                                                                        <div
                                                                                                            class="row mb-3 mt-3">
                                                                                                            <div
                                                                                                                class="col-auto">
                                                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                                    alt=""
                                                                                                                    style="width: 60px;">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col px-5 py-3">
                                                                                                                <h6> {{ __("generated.Ce profil n'a aucune compétences personnelles") }}

                                                                                                                </h6>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade show active" id="posts3" role="tabpanel"
                                            aria-labelledby="posts3-tab">
                                            <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            {{-- <i
                                                                class="bi bi-translate h5 me-1 avatar avatar-40  rounded me-2"></i> --}}
                                                        </div>
                                                        <div class="col ps-0">
                                                            <h6 class="fw-medium mb-0 ">
                                                                {{ __('generated.Compétences linguistiques') }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                                @if ($skillsInType->first()->skillType->parent_id != 3)
                                                    @continue
                                                @endif
                                                <div class="card border-0 mb-4">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                @php
                                                                    $skillTypeLabel =
                                                                        $skillsInType->first()->skillType
                                                                            ->label ?? 'Unknown';
                                                                @endphp
                                                                <div class="card border-0">
                                                                    <div class="card-header bg-gradient-theme-light"
                                                                        style="padding: 18px 10px;">
                                                                        <h6>{{ __('generated.Langue') }}</h6>
                                                                    </div>
                                                                    <div class="card-body" style="min-height: 271px;">
                                                                        <span
                                                                            style="margin-top: 42%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ __($skillTypeLabel) }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="card border-0" style="height: 100%;">
                                                                    <div class="card-body p-0"
                                                                        style="padding: 8px 10px; height: 100%;">
                                                                        <div style=" height: 100%;">
                                                                            <table class="table offres-table"
                                                                                data-show-toggle="true"
                                                                                style="margin-bottom: 0px">
                                                                                <thead class="bg-gradient-theme-light">
                                                                                    <tr>
                                                                                        <td style="border: 0;">
                                                                                            <h6>{{ __('generated.Compétences') }}
                                                                                            </h6>
                                                                                        </td>
                                                                                        <td style="border: 0;">
                                                                                            <h6>{{ __('generated.Niveau') }}
                                                                                            </h6>
                                                                                        </td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($skillsInType as $skill)
                                                                                        @php
                                                                                            $_skill = \DB::table(
                                                                                                'profiles_skills',
                                                                                            )
                                                                                                ->where(
                                                                                                    'skill_id',
                                                                                                    $skill?->id,
                                                                                                )
                                                                                                ->where(
                                                                                                    'profile_id',
                                                                                                    $profile?->id,
                                                                                                )
                                                                                                ->first();
                                                                                        @endphp
                                                                                        <tr>
                                                                                            <td>{{ __($skill?->label) }}
                                                                                            </td>
                                                                                            <td>
                                                                                                @switch($_skill?->level
                                                                                                    ?? null)
                                                                                                    @case(5)
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-green">{{ __('generated.A1 : Débutant') }}</span>
                                                                                                    @break

                                                                                                    @case(6)
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-green">{{ __('generated.A2 : Intermédiaire bas') }}</span>
                                                                                                    @break

                                                                                                    @case(7)
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-blue">{{ __('generated.B1 : Intermédiaire') }}</span>
                                                                                                    @break

                                                                                                    @case(8)
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-blue">{{ __('generated.B2 : Intermédiaire avancé') }}</span>
                                                                                                    @break

                                                                                                    @case(9)
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-red">{{ __('generated.C1 : Avancé') }}</span>
                                                                                                    @break

                                                                                                    @case(10)
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-red">{{ __('generated.C2 : Maîtrise') }}</span>
                                                                                                    @break

                                                                                                    @default
                                                                                                        <span
                                                                                                            class="badge badge-sm bg-secondary">{{ __('generated.Inconnu') }}</span>
                                                                                                @endswitch
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <div class="card border-0 mb-3">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-body" style="padding-left: 30px">
                                                                            <div class="row mb-3 mt-3">
                                                                                <div class="col-auto">
                                                                                    <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                        alt=""
                                                                                        style="width: 60px;">
                                                                                </div>
                                                                                <div class="col px-5 py-3">
                                                                                    <h6 class="translated_text">
                                                                                        {{ __("generated.Ce profil n'a aucune compétences linguistiques") }}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse

                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="posssts3" role="tabpanel"
                                            aria-labelledby="posssts3-tab">
                                            <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            {{-- <i
                                                            class="bi bi-arrow-repeat h5 me-1 avatar avatar-40  rounded me-2"></i> --}}
                                                        </div>
                                                        <div class="col ps-0">
                                                            <h6 class="fw-medium mb-0 ">{{ __('generated.Mobilité') }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    @if (
                                                                        (empty($mobility['geographique']) || count($mobility['geographique']) === 0) &&
                                                                            (empty($mobility['mode_travail']) || count($mobility['mode_travail']) === 0) &&
                                                                            (empty($mobility['temps_travail']) || count($mobility['temps_travail']) === 0) &&
                                                                            (empty($mobility['disponibli']) || count($mobility['disponibli']) === 0))
                                                                        <div class="card border-0 mb-3">
                                                                            <div class="card-body p-0">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="card border-0">
                                                                                            <div class="card-body"
                                                                                                style="padding-left: 30px">
                                                                                                <div class="row mb-3 mt-3">
                                                                                                    <div class="col-auto">
                                                                                                        <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                                            alt=""
                                                                                                            style="width: 60px;">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col px-5 py-3">
                                                                                                        <h6
                                                                                                            class="translated_text">
                                                                                                            {{ __("generated.Ce profil n'a aucune Mobilité") }}
                                                                                                        </h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="card border-0">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <!-- Mobilité géographique -->
                                                                                    <div class="col-12 col-lg-6 mb-4">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <strong>{{ __('generated.Mobilité géographique :') }}</strong>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <ul
                                                                                                    class="mb-0 translated_text">
                                                                                                    @foreach ($mobility['geographique'] as $m)
                                                                                                        <li>{{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                            :
                                                                                                            {{ $m->weight ?? ' -' }}%
                                                                                                        </li>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Mode de travail -->
                                                                                    <div class="col-12 col-lg-6 mb-4">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <strong>{{ __('generated.Mode de travail :') }}</strong>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <ul
                                                                                                    class="mb-0 translated_text">
                                                                                                    @foreach ($mobility['mode_travail'] as $m)
                                                                                                        <li>{{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                            :
                                                                                                            {{ $m->weight ?? ' -' }}%
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Temps de travail -->
                                                                                    <div class="col-12 col-lg-6 mb-4">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <strong>{{ __('generated.Temps de travail :') }}</strong>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <ul
                                                                                                    class="mb-0 translated_text">
                                                                                                    @foreach ($mobility['temps_travail'] as $m)
                                                                                                        <li>{{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                            :
                                                                                                            {{ $m->weight ?? ' -' }}%
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Disponibilité -->
                                                                                    <div class="col-12 col-lg-6 mb-4">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <strong>{{ __('generated.Disponibilité :') }}</strong>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <ul
                                                                                                    class="mb-0 translated_text">
                                                                                                    @foreach ($mobility['disponibli'] as $m)
                                                                                                        <li>
                                                                                                            {{ __('generated.' . $m->mobilityOptionType?->label) ?? ' - ' }}
                                                                                                            :
                                                                                                            {{ $m->notice_period_per_month !== null
                                                                                                                ? App\Enums\Profile\NoticePeriodEnum::getLabel($m->notice_period_per_month)
                                                                                                                : '' }}
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> <!-- row -->

                                                                            </div> <!-- card-body -->
                                                                        </div> <!-- card -->
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="tab-pane fade show active" id="posts5" role="tabpanel"
                                            aria-labelledby="posts5-tab">
                                            <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            {{-- <i
                                                            class="bi bi-balloon-heart h5 me-1 avatar avatar-40 rounded me-2"></i> --}}
                                                        </div>
                                                        <div class="col ps-0">
                                                            <h6 class="fw-medium mb-0 ">
                                                                {{ __('generated.Recommandations') }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @forelse ($recommendations as $recommandation)
                                                <div class="card border-0 mb-4">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding: 14px 33px;">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">

                                                                                <img src="{{ $recommandation->photo ? asset('storage/' . $recommandation->photo) : asset('assets/img/male-perso-default.webp') }}"
                                                                                    alt="Photo de {{ $recommandation?->first_name ?? 'Utilisateur' }}"
                                                                                    class="avatar-60 avatar rounded-circle coverimg">

                                                                            </div>


                                                                            <div class="col">
                                                                                <h6 class="mb-1">
                                                                                    {{ $recommandation?->first_name && $recommandation?->last_name ? $recommandation?->first_name . ' ' . $recommandation?->last_name : '_' }}
                                                                                    </p>
                                                                                </h6>
                                                                                <p class="text-secondary translated_text">
                                                                                    {{ __($recommandation->profession->label) ?? ' - ' }}.
                                                                                    {{ __('generated.Recommandé le') }}
                                                                                    {{ \Carbon\Carbon::parse($recommandation->created_at)->translatedFormat('d F Y') }}
                                                                                </p>

                                                                                <h6 class="fw-normal"
                                                                                    style="text-align: justify">
                                                                                    {{ $recommandation?->message ?? ' - ' }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @empty
                                                <div class="card border-0 mb-3">
                                                    <div class="card-body p-0">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card border-0">
                                                                    <div class="card-body" style="padding-left: 30px">
                                                                        <div class="row mb-3 mt-3">
                                                                            <div class="col-auto">
                                                                                <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                    alt="" style="width: 60px;">
                                                                            </div>
                                                                            <div class="col px-5 py-3">
                                                                                <h6 class="translated_text">
                                                                                    {{ __('generated.Ce profil n\'a aucune recommandation') }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="tab-pane fade show active" id="posts5" role="tabpanel"
                                            aria-labelledby="posts5-tab">
                                            {{-- <div class="row mb-4 mt-4" style="    margin-bottom: 30px !important;">
                                            <div class="col-12">
                                                <h4 class="title custom-title">Poste souhaité</h4>
                                            </div>
                                        </div> --}}
                                            <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                                <div class="card-header bg-gradient-theme-light">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            {{-- <i
                                                            class="bi bi-balloon-heart h5 me-1 avatar avatar-40 rounded me-2"></i> --}}
                                                        </div>
                                                        <div class="col ps-0">
                                                            <h6 class="fw-medium mb-0 ">
                                                                {{ __('generated.Poste souhaité') }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 mt-5">
                                                @if (empty($profile?->profession?->label))
                                                    <div class="card border-0 mb-3">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card border-0">
                                                                        <div class="card-body" style="padding-left: 30px">
                                                                            <div class="row mb-3 mt-3">
                                                                                <div class="col-auto">
                                                                                    <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                        alt=""
                                                                                        style="width: 60px;">
                                                                                </div>
                                                                                <div class="col px-5 py-3">
                                                                                    <h6 class="translated_text">
                                                                                        {{ __('generated.Ce profil n\'a aucun poste souhaité') }}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-5">
                                                        <span
                                                            style="font-weight: 700;margin-left: 38px">{{ __($profile?->profession?->label) }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row mb-4 mt-5">
                                                
                                                    @forelse($profile?->coverLetters as $coverLetter)
                                                        <div class="col-5">
                                                        <p style="text-align: justify">
                                                            {{ __($coverLetter?->description ?? ' - ') }}
                                                        </p>
                                                        </div>
                                                    @empty

                                                        <div class="mb-3">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card border-0">
                                                                            <div class="card-body"
                                                                                style="padding-left: 30px">
                                                                                <div class="row mb-3 mt-3">
                                                                                    <div class="col-auto">
                                                                                        <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                                                            alt=""
                                                                                            style="width: 60px;">
                                                                                    </div>
                                                                                    <div class="col px-5 py-3">
                                                                                        <h6 class="translated_text">
                                                                                            {{ __('generated.Ce profil n’a aucune lettre de motivation') }}
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                </div>

                                            {{-- </div> --}}
                                            <div class="row">
                                                @if ($profile?->min_expected_salary)
                                                    <div class="col-5">
                                                        <span
                                                            style="font-weight: 700;margin-left: 38px">{{ __('generated.Prétentions salariales Minimum') }}
                                                            : </span>
                                                    </div>
                                                    <div class="col-5">
                                                        <p style="text-align: justify">
                                                            {{ $profile?->min_expected_salary }}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($profile?->max_expected_salary)
                                                    <div class="col-5">
                                                        <span
                                                            style="font-weight: 700;margin-left: 38px">{{ __('generated.Prétentions salariales Maximum') }}
                                                            : </span>
                                                    </div>
                                                    <div class="col-5">
                                                        <p style="text-align: justify">
                                                            {{ $profile?->max_expected_salary }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabM11120" role="tabpanel"
                                    aria-labelledby="tabM11120-tab">
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0">
                                                        <div class="card-body p-0">
                                                            <div class="card border-0 h-100 ">
                                                                <div class="card-header">
                                                                    <div class="row align-items-center"
                                                                        style="padding: 25px 12px 0px;">
                                                                        <div class="col-auto">
                                                                            <i class="bi bi-play-btn h5 avatar avatar-40 bg-light-blue text-blue rounded"
                                                                                style="font-size: 26px;"></i>
                                                                        </div>
                                                                        <div class="col">
                                                                            <h6 class="fw-medium mb-0 translated_text">
                                                                                {{ __('generated.CV vidéo') }}
                                                                            </h6>
                                                                            <p class="text-secondary small">
                                                                                {{ __('generated.Durée :') }}
                                                                                {{ $profile?->cv_video_duration ?? '' }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-0"
                                                                    style="min-height: 518px;padding:15px 24px !important;">
                                                                    <div class="row justify-content-center">
                                                                        @if ($profile?->path_cv_video == null)
                                                                            <img src="{{ asset('assets/img/no-result-data-not-found-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-etc-vector.PNG') }}"
                                                                                alt="" style="width: 400px">
                                                                            <h4 class="text-center translated_text">
                                                                                {{ __("generated.Ce profil n'a aucun CV Vidéo") }}
                                                                            </h4>
                                                                            <video style="width: 100%; display:none"
                                                                                id="myVideo" controls="false">
                                                                                <source src="" type="video/mp4" />
                                                                            </video>
                                                                        @else
                                                                            <video style="width: 100%;" id="myVideo"
                                                                                controls="false">
                                                                                <source
                                                                                    src="{{ Storage::url($profile?->path_cv_video) }}"
                                                                                    type="video/mp4" />
                                                                            </video>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer card-footer-separated"
                                                                    style="padding: 21px 13px;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <input id="seekBar" type="range"
                                                                                min="0" max="100"
                                                                                value="0">
                                                                        </div>
                                                                        <div class="col-2" style="margin-right: -33px;">
                                                                            <div class="custom-controls controls1">
                                                                                <div class="avatar avatar-50 rounded bg-light-cyan translated_text"
                                                                                    id="playPause"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Lire') }}"
                                                                                    style="cursor: pointer;background-color: transparent !important;">
                                                                                    <i class="bi bi-play-fill h2"></i>
                                                                                </div>

                                                                                <div class="avatar avatar-50 rounded bg-light-cyan hidden"
                                                                                    id="rewind"
                                                                                    style="cursor: pointer;background-color: transparent !important;">
                                                                                    <i class="bi bi-rewind-btn h5"></i>
                                                                                </div>
                                                                                <span id="timeDisplay">00:00</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="custom-controls controls2">
                                                                                <div class="volume-show">
                                                                                    <div class="avatar avatar-50 rounded bg-light-cyan translated_text"
                                                                                        id="mute"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="{{ __('generated.Activer / Désactiver le son') }}"
                                                                                        style="cursor: pointer;background-color: transparent !important;">
                                                                                        <i class="bi bi-volume-up h4"></i>
                                                                                    </div>
                                                                                    <input id="volumeBar" type="range"
                                                                                        min="0" max="1"
                                                                                        step="0.1" value="1"
                                                                                        class="hidden">
                                                                                </div>
                                                                                <div class="avatar avatar-50 rounded bg-light-cyan translated_text"
                                                                                    id="fullscreen"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ __('generated.Plein écran') }}"
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
                                </div>
                                @include('profile.inc.timeline')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       