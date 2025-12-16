
<div class="row">
    <div class="col-3">
        <div class="card border-0" style="height: 100%;">
            <div class="card-body" style="min-height: 700px; background-color: #e4e8ee29">
                <div class="row mt-3">
                    <div class="col-auto ms-auto" style="margin-right: 3px;">
                        <div class="dropdown d-inline-block">
                            <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-display="static" role="button">
                                <i class="bi bi-three-dots-vertical" style="font-size: 19px"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="min-width: 10px;">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.viewProfile', $profile->id) }}" target="_blank">
                                        Aperçu
                                    </a>
                                </li> 
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#emailcompose">Partager</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)">Imprimer</a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-7 mb-2">
                        <figure class="avatar avatar-60 rounded-circle coverimg custom-cv-img vm"
                            style="background-image: url(&quot;assets/img/icon/59902.jpg&quot;);">
                            <img src="
                            @if ($profile->path_picture != null) {{ asset($profile->path_picture) }}
                                @else 
                                @if ($profile->sexe == 'Homme')
                                    {{ asset('assets/img/male-perso-default.webp') }}
                                    @else
                                        {{ asset('assets/img/female-perso-default.jpg') }} @endif
                                @endif
                                    "
                                alt="" style="display: none;">
                        </figure>

                    </div>

                    <div class="row justify-content-center mt-3">
                        <p style="text-align: center;font-weight: 700;font-size: 25px;margin-bottom: 2px;">
                            {{ $profile->first_name && $profile->last_name ? $profile->first_name . ' ' . $profile->last_name : '_' }}
                        </p>

                        <p class="text-secondary" style="text-align: center;">
                            {{ $profile->profession->label ?? ' - ' }}</p>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 14px !important;">
                        <div class="col-6">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="{{ __($profile->url_facebook) }}"
                                        target="_blank">
                                        <i class="bi bi-facebook h3"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="{{ __($profile->url_twitter) }}"
                                        target="_blank">
                                        <i class="bi bi-twitter-x h3"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="{{ __($profile->url_linkedin) }}"
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
                                    <p class="text-secondary small mb-1">Téléphone</p>
                                    <p>{{ $profile->phone_primary ?? ' - ' }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-envelope h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">E-mail</p>
                                    <p>{{ $profile->email ?? '_' }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-calendar2-heart h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Date de naissance</p>
                                    <p>{{ $profile->birth_date }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-geo h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Lieu de naissance</p>
                                    <p>{{ __($profile->birth_place) }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi-globe h5 text-theme mb-0"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Nationalité</p>
                                    <p>{{ __($profile->nationality) }}</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <i class="bi bi- h5 text-theme mb-0"><img
                                            src="{{ asset('assets/img/icon/anneaux.png') }}"
                                            style="width: 21px;"></i>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Situation familiale</p>
                                    <p>{{ __($profile->family_situation) }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card border-0 mb-4">
                                <div class="card-body">
                                    <a href="{{ asset($profile->path_cover_letter ?? '') }}" target="_blank">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-50 rounded bg-blue text-white">
                                                    <i class="bi bi-file-earmark-text h5 vm"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-1">Lettre de motivation</h6>
                                                <p class="text-secondary">Candidat</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card border-0 mb-4">
                                <div class="card-body">
                                    <a href="{{ asset($profile->url_cv ?? '') }}" target="_blank">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar avatar-50 rounded bg-red text-white">
                                                    <i class="bi bi-layout-text-sidebar-reverse h5 vm"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="fw-medium mb-1">Curriculum Vitae</h6>
                                                <p class="text-secondary">Candidat</p>
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
    <div class="col-9">
        <div class="card border-0">

            <div class="card-body">
                <div class="tab-content" id="nav-navtabscard30">
                    <div class="tab-pane fade show active" id="tab1220" role="tabpanel"
                        aria-labelledby="tab1220-tab">

                        <div class="row">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel"
                                    aria-labelledby="posts-tab">
                                    <div class="card border-0" style="margin-bottom: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-mortarboard h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Formations</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($profile->formations as $formation)
                                        <div class="card border-0 mb-3" style="background-color: #e4e8ee47;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0"
                                                            style="background-color: #fff;">
                                                            <div class="card-body" style="padding-left: 30px">
                                                                <div class="row mb-3 mt-3">
                                                                    <div
                                                                    class="col-auto">
                                                                    <img src="{{ $formation->logo ? asset($formation->logo) : asset('assets/img/high-school-modern-simple-icon-vector.jpg') }}"
                                                                        alt=""
                                                                        style="width: 60px;">
                                                                </div>
                                                                    <div class="col">
                                                                        <h6>{{ $formation->name ?? ' - ' }}
                                                                        </h6>
                                                                        <p class="text-secondary"
                                                                            style="margin-bottom: 0;">
                                                                            {{ $formation->diploma->label ?? ' - ' }}
                                                                        </p>
                                                                        <p class="text-secondary">
                                                                            {{ \Carbon\Carbon::parse($formation->stared_at)->translatedFormat('d F Y') ?? ' - ' }}
                                                                            -
                                                                            {{ \Carbon\Carbon::parse($formation->finished_at)->translatedFormat('d F Y') ?? ' - ' }},

                                                                            @if (!empty($formation->durationYears) && $formation->durationYears > 0)
                                                                                {{ __($formation->durationYears) }}
                                                                                ans
                                                                            @endif

                                                                            @if (!empty($formation->durationMonths) && $formation->durationMonths > 0)
                                                                                {{ __($formation->durationMonths) }}
                                                                                mois
                                                                            @endif
                                                                        </p>

                                                                        <p>{{ $formation->option->label ?? ' - ' }}
                                                                        </p>
                                                                        <p><b>Projet de fin d’année :</b>
                                                                            {{ __($formation->description) }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade show active" id="posts2" role="tabpanel"
                                    aria-labelledby="posts2-tab">
                                    <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-briefcase h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Expériences</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @forelse($profile->experiences as $experience)
                                    <div class="card border-0 mb-3" style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0" style="background-color: #fff;">
                                                        <div class="card-body" style="padding-left: 30px">
                                                            <div class="row mb-3 mt-3">
                                                                <div
                                                                class="col-auto">
                                                                <img src="{{ $experience->logo ? asset($experience->logo) : asset('assets/img/briefcase-icon-isolated-on-white-background-work-bag-symbol-free-vector.jpg') }}"
                                                                    alt=""
                                                                    style="width: 60px;">
                                                                </div>
                                                                <div class="col">
                                                                    <h6>{{ __($experience->profession?->label) }}</h6>
                                                                    <p
                                                                        class="text-secondary">
                                                                        Du
                                                                        {{ $experience->started_at->translatedFormat('d/m/Y') }}
                                                                        à
                                                                        {{ $experience->finished_at == null ? 'ce jour' : $experience->finished_at->translatedFormat('d/m/Y') }}
                                                                    </p>
                                                                    <p>{{ __($experience->description) }}</p>
                                                                    <h6 class="title">Missions réalisées</h6>
                                                                    <p><b>{{ __($experience->project_name) }}</b></p>
                                                                @forelse($experience->missions as $mission)
                                                                    <p>{{ __($mission->description) }}</p>
                                                                    <div class="row mb-4">
                                                                        <div class="col-auto">
                                                                            <span class="badge badge-sm bg-blue">#{{ __($mission->experience->skills_tech) }}</span>
                                                                        </div>            
                                                                    </div>
                                                                    @empty
                                                                    <p><b> Aucune
                                                                        mission
                                                                        liée
                                                                        au
                                                                        cette
                                                                        éxperience
                                                                    </b>
                                                                    </p>
                                                                @endforelse 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="card border-0 mb-3"
                                        style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card border-0"
                                                        style="background-color: #fff;">
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
                                                                    <h6>Ce profil
                                                                        n'a aucune
                                                                        éxperience
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
                                    <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-tools h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Compétences techniques</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                    @if ($skillsInType->first()->skillType->parent_id != 1)
                                    @continue
                                    @endif
                                        <div class="card border-0 mb-4" style="background-color: #e4e8ee47;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="card border-0">
                                                            <div class="card-header"
                                                                style="background-color: #f0f2f5;padding: 18px 10px;">
                                                                <h6>Catégorie</h6>
                                                            </div>
                                                            @php
                                                            $skillTypeLabel =
                                                                $skillsInType->first()
                                                                    ->skillType
                                                                    ->label ??
                                                                'Unknown';
                                                        @endphp
                                                            <div class="card-body" style="min-height: 304px;">
                                                                <span
                                                                    style="margin-top: 42%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ __($skillTypeLabel) }}</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="card border-0">
                                                            <div class="card-header"
                                                                style="background-color: #f0f2f5;padding: 8px 10px;">
                                                                <table class="table offres-table"
                                                                    data-show-toggle="true"
                                                                    style="margin-bottom: 0px">
                                                                    <thead>
                                                                        <tr>
                                                                            <td
                                                                                style="border: 0;width: 286px;">
                                                                                <h6>Détail</h6>
                                                                            </td>
                                                                            <td style="border: 0">
                                                                                <h6>Niveau</h6>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <div class="card-body" style="min-height: 274px;">
                                                                <table class="table offres-table"
                                                                    data-show-toggle="true">
                                                                    <tbody
                                                                    style="font-size: 15px">
                                                                    @foreach ($skillsInType as $skill)
                                                                        <tr>
                                                                            <td>
                                                                                {{ __($skill->label) }}
                                                                                </td>
                                                                            @php
                                                                                $level = \DB::table(
                                                                                    'profiles_skills',
                                                                                )
                                                                                    ->where(
                                                                                        'skill_id',
                                                                                        $skill->id,
                                                                                    )
                                                                                    ->select(
                                                                                        'level',
                                                                                    )
                                                                                    ->get()
                                                                                    ->toArray();
                                                                            @endphp
                                                                <td><span
                                                                        @switch($level[0]->level)
                                                                    @case(1)
                                                                    class="badge badge-sm bg-green">@php echo "Débutant" @endphp</span>
                                                                        @break
                                                                        @case(2)
                                                                        class="badge badge-sm bg-yellow">@php echo "Intermédiaire" @endphp </span> 
                                                                                                            @break
                                                                    @case(3)
                                                                        class="badge badge-sm bg-blue">@php echo "Avancé" @endphp </span> 
                                                                        @break
                                                                    @case(4)
                                                                        class="badge badge-sm bg-red">@php echo "Expert" @endphp </span> 
                                                                            @break
                                                                    @default
                                                                    class="badge badge-sm bg-secondary">@php echo "Inconnu" @endphp</span>
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
                                        @empty
                                        <div class="card border-0"
                                            style="height: 180px">
                                            <div class="card-header"
                                                style="background-color: #f0f2f5;padding: 18px 10px;">
                                                <h6>Message</h6>
                                            </div>
                                            <div class="card-body"
                                                style="min-height: 304px;">
                                                <div class="row ">
                                                    <div class="col-auto">
                                                        <img src="{{ asset('assets/img/document-file-not-found-search-no-result-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-icon-vector.jpg') }}"
                                                            alt=""
                                                            style="width: 80px;">
                                                    </div>
                                                    <div class="col py-3">
                                                        <span
                                                            style="font-weight: 700;width: 100%;text-align: center;">
                                                            <h6> Ce profil n'a aucune
                                                                compétence technique
                                                            </h6>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                    <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-person h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Compétences personnelles</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-0 mb-4"
                                    style="background-color: #e4e8ee47;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card border-0 ">
                                                    <div class="card-header"
                                                        style="background-color: #f0f2f5;padding: 8px 10px;">
                                                        <table
                                                            class="table offres-table"
                                                            data-show-toggle="true"
                                                            style="margin-bottom: 0px">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2"
                                                                        style="font-weight: 600;border-bottom: 0;width: 351px;">
                                                                        <h6>Catégorie
                                                                        </h6>
                                                                    </th>
                                                                    <th rowspan="2"
                                                                        style="font-weight: 600;border-bottom: 0;width: 481px;">
                                                                        <h6>Détail
                                                                        </h6>
                                                                    </th>
                                                                    <th rowspan="2"
                                                                        style="font-weight: 600;border-bottom: 0;">
                                                                        <h6>Niveau
                                                                        </h6>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                    <div class="card-body"
                                                        style="background-color: #fff">
                                                        <table
                                                            class="table offres-table"
                                                            data-show-toggle="true">
                                                            <tbody
                                                                style="font-size: 13px">
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
                                                                    <tr>
                                                                        @foreach ($skillsInType as $skill)
                                                                        
                                                                            <td>
                                                                                @php $skill_type = \DB::table('skill_types')->where('id', $skillTypeId)->select('label')->get()->toArray(); @endphp
                                                                                {{ __($skill_type[0]->label) }}
                                                                            </td>
                                                                        @endforeach
                                                                        <td>{{ __($skill->label) }}
                                                                        </td>
                                                                        @php
                                                                            $level = \DB::table(
                                                                                'profiles_skills',
                                                                            )
                                                                                ->where(
                                                                                    'skill_id',
                                                                                    $skill->id,
                                                                                )
                                                                                ->select(
                                                                                    'level',
                                                                                )
                                                                                ->get()
                                                                                ->toArray();
                                                                        @endphp
                                                                        <td><span
                                                                    @switch($level[0]->level)
                                                                        @case(1)
                                                                        class="badge badge-sm bg-green">@php echo "Débutant" @endphp</span>
                                                                            @break
                                                                        @case(2)
                                                                        class="badge badge-sm bg-yellow">@php echo "Intermédiaire" @endphp </span> 
                                                                            @break
                                                                        @case(3)
                                                                            class="badge badge-sm bg-blue">@php echo "Avancé" @endphp </span> 
                                                                            @break
                                                                        @case(4)
                                                                            class="badge badge-sm bg-red">@php echo "Expert" @endphp </span> 
                                                                            @break
                                                                        @default
                                                                        class="badge badge-sm bg-secondary">@php echo "Inconnu" @endphp</span>
                                                                    @endswitch
                                                                        </td>
                                                                    </tr>
                                                            </tbody>
                                                        @empty
                                                            @endforelse
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade show active" id="posts3" role="tabpanel"
                                    aria-labelledby="posts3-tab">
                                    <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-translate h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Compétences linguistiques</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($skillsgroup as $skillTypeId => $skillsInType)
                                    @if ($skillsInType->first()->skillType->parent_id != 3)
                                        @continue
                                    @endif
                                    <div class="card border-0 mb-4"
                                        style="background-color: #e4e8ee47;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    @php
                                                        $skillTypeLabel =
                                                            $skillsInType->first()
                                                                ->skillType
                                                                ->label ??
                                                            'Unknown';
                                                    @endphp
                                                    <div class="card border-0">
                                                        <div class="card-header"
                                                            style="background-color: #f0f2f5;padding: 18px 10px;">
                                                            <h6>Langue</h6>
                                                        </div>
                                                        <div class="card-body"
                                                            style="min-height: 271px;">
                                                            <span
                                                                style="margin-top: 42%;float: left;font-size: 17px;font-weight: 700;width: 100%;text-align: center;">{{ __($skillTypeLabel) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="card border-0">
                                                        <div class="card-header"
                                                            style="background-color: #f0f2f5;padding: 8px 10px;">
                                                            <table
                                                                class="table offres-table"
                                                                data-show-toggle="true"
                                                                style="margin-bottom: 0px">
                                                                <thead>
                                                                    <tr>
                                                                        <td
                                                                            style="border: 0;width: 353px;">
                                                                            <h6>Compétences
                                                                            </h6>
                                                                        </td>
                                                                        <td
                                                                            style="border: 0">
                                                                            <h6>Niveau
                                                                            </h6>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div class="card-body"
                                                            style="min-height: 274px;">
                                                            <table
                                                                class="table offres-table"
                                                                data-show-toggle="true">
                                                                <tbody
                                                                    style="font-size: 15px">
                                                                    @foreach ($skillsInType as $skill)
                                                                        <tr>
                                                                            <td>
                                                                                {{ __($skill->label) }}
                                                                            </td>
                                                                            @php
                                                                                $level = \DB::table(
                                                                                    'profiles_skills',
                                                                                )
                                                                                    ->where(
                                                                                        'skill_id',
                                                                                        $skill->id,
                                                                                    )
                                                                                    ->select(
                                                                                        'level',
                                                                                    )
                                                                                    ->get()
                                                                                    ->toArray();
                                                                            @endphp
                                                                            <td><span
                                                                                    @switch($level[0]->level)
                                                                            @case(5)
                                                                            class="badge badge-sm bg-green">@php echo 'A1 : Débutant' @endphp</span>
                                                                                @break
                                                                            @case(6)
                                                                            class="badge badge-sm bg-green">@php echo 'A2 : Intermédiaire bas' @endphp </span> 
                                                                                @break
                                                                            @case(7)
                                                                                class="badge badge-sm bg-blue">@php echo 'B1 : Intermédiaire' @endphp </span> 
                                                                                @break
                                                                            @case(8)
                                                                                class="badge badge-sm bg-blue">@php echo 'B2 : Intermédiaire avancé' @endphp </span> 
                                                                                @break
                                                                            @case(9)
                                                                                class="badge badge-sm bg-red">@php echo 'C1 : Avancé' @endphp </span> 
                                                                                @break
                                                                            @case(10)
                                                                                class="badge badge-sm bg-red">@php echo 'C2 : Maîtrise' @endphp </span> 
                                                                                @break
                                                                            @default
                                                                            class="badge badge-sm bg-secondary">@php echo "Inconnu" @endphp</span>
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
                                @empty
                                @endforelse

                            </div>
                                <div class="tab-pane fade show active" id="posssts3" role="tabpanel"
                                    aria-labelledby="posssts3-tab">
                                    <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-arrow-repeat h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Mobilité</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card border-0" style="background-color: #e4e8ee47;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card border-0">
                                                                <div class="card-body"
                                                                    style="padding-left: 60px;">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="row mb-4 mt-3">
                                                                                <div class="col-4"
                                                                                    style="width: 38%;padding-right: 0 !important;">
                                                                                    <span>Mobilité géographique
                                                                                        :</span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <ul>
                                                                                        @php
                                                                                            $mobility = $profile->mobilityoptions();
                                                                                        @endphp

                                                                                        @foreach ($mobility['geographique'] as $m)
                                                                                            <li>{{ $m->mobilityOptionType->label ?? ' - ' }}
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="row mb-4 mt-3">
                                                                                <div class="col-4"
                                                                                    style="width: 27%;padding-right: 0 !important;">
                                                                                    <span>Mode de travail
                                                                                        :</span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <ul>
                                                                                        @php
                                                                                            $mobility = $profile->mobilityoptions();
                                                                                        @endphp

                                                                                        @foreach ($mobility['mode_travail'] as $m)
                                                                                            <li>{{ $m->mobilityOptionType->label ?? ' - ' }}
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="row  mt-3">
                                                                                <div class="col-4"
                                                                                    style="width: 29%;padding-right: 0 !important;">
                                                                                    <span>Temps de travail
                                                                                        :</span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <ul>
                                                                                        @php
                                                                                            $mobility = $profile->mobilityoptions();
                                                                                        @endphp

                                                                                        @foreach ($mobility['temps_travail'] as $m)
                                                                                            <li>{{ $m->mobilityOptionType->label ?? ' - ' }}
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="row  mt-3">
                                                                                <div class="col-4"
                                                                                    style="width: 22%;padding-right: 0 !important;">
                                                                                    <span>Disponibilité :</span>
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    <ul>
                                                                                        @php
                                                                                            $mobility = $profile->mobilityoptions();
                                                                                        @endphp

                                                                                        @foreach ($mobility['disponibli'] as $m)
                                                                                            <li>{{ $m->mobilityOptionType->label ?? ' - ' }}
                                                                                                :
                                                                                                {{ __($m->notice_period_per_month) }}
                                                                                                mois</li>
                                                                                        @endforeach
                                                                                    </ul>
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
                                <div class="tab-pane fade show active" id="posts5" role="tabpanel"
                                    aria-labelledby="posts5-tab">
                                    <div class="card border-0" style="margin-bottom: 19px;margin-top: 19px;">
                                        <div class="card-header" style="background-color: #f0f2f5;">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i
                                                        class="bi bi-balloon-heart h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <h6 class="fw-medium mb-0">Recommendations</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($recommandations as $recommandation)
                                        <div class="card border-0 mb-4">
                                            <div class="card-body " style="background-color: #e4e8ee47;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card border-0"
                                                            style="background-color: #fff;">
                                                            <div class="card-body"
                                                                style="padding: 14px 33px;">
                                                                <div class="row mb-3 mt-3">
                                                                    <div class="col-auto">
                                                                        <figure
                                                                            class="avatar-60 avatar rounded-circle coverimg"
                                                                            style="background-image: url('{{ $recommandation->photo ? asset($recommandation->photo) : asset('assets/img/default-avatar-photo-placeholder-grey-600nw-2004239303.webp') }}');">
                                                                            <img src="{{ $recommandation->photo ? asset($recommandation->photo) : asset('assets/img/default-avatar-photo-placeholder-grey-600nw-2004239303.webp') }}"
                                                                                alt="Photo de {{ $recommandation->first_name ?? 'Utilisateur' }}"
                                                                                class="d-none">
                                                                        </figure>
                                                                    </div>

                                                                    <div class="col">
                                                                        <h6 class="mb-1">
                                                                            {{ $recommandation->first_name && $recommandation->last_name ? $recommandation->first_name . ' ' . $recommandation->last_name : '_' }}
                                                                            </p>
                                                                        </h6>
                                                                        <p class="text-secondary">
                                                                            {{ $recommandation->poste ?? ' - ' }}.
                                                                            Recommandé le
                                                                            {{ \Carbon\Carbon::parse($recommandation->created_at)->translatedFormat('d F Y') }}
                                                                        </p>

                                                                        <h6 class="fw-normal"
                                                                            style="text-align: justify">
                                                                            {{ $recommandation->message ?? ' - ' }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="tab11120" role="tabpanel"
                        aria-labelledby="tab11120-tab">
                        <div class="row mb-5 mt-5">
                            2
                        </div>
                    </div>
                    <div class="tab-pane fade " id="tab1120" role="tabpanel"
                        aria-labelledby="tab1120-tab">
                        <div class="row mb-5 mt-5">
                            3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

