@extends('candidate_portal.layouts.second')

@section('title', 'CV - '. $profile?->first_name .' '. $profile?->last_name)

@section('css_header')
    <style>
        .cv-container {
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            display: flex;
        }
        
        /* Left cv-sidebar */
        .cv-sidebar {
            width: 35%;
            background: #2c3e50;
            color: white;
            padding: 20px;
        }
        
        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 4px solid white;
        }
        
        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .name {
            text-align: left;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        
        .profession {
            text-align: left;
            font-size: 24px;
            color:rgb(0, 0, 0);
            margin-bottom: 25px;
            font-style: italic;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin: 20px 0 10px 0;
            text-transform: uppercase;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        
        .contact-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .contact-icon {
            width: 16px;
            margin-right: 10px;
            color: #3498db;
        }
        
        .skill-item {
            margin-bottom: 8px;
        }
        
        .skill-name {
            font-weight: light !important;
            margin-bottom: 2px;
            font-size: 12px;
        }
        
        .skill-level {
            height: 8px;
            background: #34495e;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .skill-progress {
            height: 100%;
            background: #3498db;
            border-radius: 4px;
        }
        
        .skill-badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 9px;
            margin-bottom: 5px;
            color: white;
            font-weight: light;
        }
        
        .badge-beginner { background: #27ae60;}
        .badge-intermediate { background: #f39c12; }
        .badge-advanced { background: #3498db; }
        .badge-expert { background: #e74c3c; }
        .badge-unknown { background: #95a5a6; }
        
        /* Language levels */
        .badge-a1, .badge-a2 { background: #27ae60; }
        .badge-b1, .badge-b2 { background: #3498db; }
        .badge-c1, .badge-c2 { background: #e74c3c; }
        
        /* Main content */
        .main-content {
            width: 65%;
            padding: 20px;
        }
        
        .header {
            margin-bottom: 25px;
        }
        
        .main-section-title {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            margin: 20px 0 10px 0;
            text-transform: uppercase;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        
        .experience-item, .formation-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .experience-item:last-child, .formation-item:last-child {
            border-bottom: none;
        }
        
        .item-header {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .item-logo {
            width: 40px;
            height: 40px;
            margin-right: 12px;
            border-radius: 4px;
            object-fit: cover;
        }
        
        .item-title {
            font-weight: bold;
            font-size: 12px;
            color: #2c3e50;
        }
        
        .item-subtitle {
            font-size: 10px;
            color: #7f8c8d;
            margin-bottom: 3px;
        }
        
        .item-date {
            font-size: 10px;
            color: #95a5a6;
            font-style: italic;
        }
        
        .item-description {
            margin-top: 8px;
            text-align: justify;
            font-size: 12px;
        }

        .item-description span{
            
        }
        
        .missions-title {
            font-weight: bold;
            margin: 10px 0 5px 0;
            color: #2c3e50;
        }
        
        .mission-item {
            margin-bottom: 5px;
            padding-left: 15px;
            position: relative;
        }
        
        .mission-item:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #3498db;
            font-weight: bold;
        }
        
        .tech-skills {
            margin-top: 10px;
        }
        
        .tech-skill-tag {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 9px;
            margin: 2px 4px 2px 0;
        }
        
        .social-links {
            margin-top: 15px;
        }
        
        .social-link {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            margin-bottom: 5px;
            font-size: 10px;
        }
        
        .no-data {
            color: #95a5a6;
            font-style: italic;
            text-align: center;
            padding: 20px;
        }
        
        @media print {
            body { -webkit-print-color-adjust: exact; }
            .cv-container { box-shadow: none; }
        }
    </style>
@endsection

@section('content')
<main class="main mainheight">
    <!-- title bar -->
    <div class="container-fluid">
        <div class="cv-container" id="printable-content">
            <!-- Left cv-Sidebar -->
            <div class="cv-sidebar">
                <!-- Profile Photo -->
                <div class="profile-photo">
                    <img src="{{ $profile?->getAvatarUrl() }}" alt="Photo">
                </div>
                <br>
                <!-- Contact Information -->
                <div class="section-title">{{ __("generated.Contact") }}</div>
                
                <div class="contact-item">
                    <span class="contact-icon">📞</span>
                    <span>{{ $profile?->phone_primary ?? __("generated.Téléphone non renseigné") }}</span>
                </div>
                
                <div class="contact-item">
                    <span class="contact-icon">✉️</span>
                    <span>{{ $profile?->email ?? __("generated.Email non renseigné") }}</span>
                </div>
                
                <div class="contact-item">
                    <span class="contact-icon">📅</span>
                    <span>{{ $profile?->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('d/m/Y') : __("generated.Date non renseignée") }}</span>
                </div>
                
                <div class="contact-item">
                    <span class="contact-icon">📍</span>
                    <span>{{ __($profile?->birth_place) ?? __("generated.Lieu non renseigné") }}</span>
                </div>
                
                <div class="contact-item">
                    <span class="contact-icon">🌍</span>
                    <span>{{ __($profile?->nationality_name?->name) ?? __("generated.Nationalité non renseignée") }}</span>
                </div>
                
                <div class="contact-item">
                    <span class="contact-icon">👨‍👩‍👧‍👦</span>
                    <span>{{ $profile?->family_situation ?? __("generated.Situation non renseignée") }}</span>
                </div>
                
                <!-- Social Links -->
                @if($profile?->url_facebook || $profile?->url_twitter || $profile?->url_linkedin)
                <div class="section-title">{{ __("generated.Réseaux Sociaux") }}</div>
                <div class="social-links">
                    @if($profile?->url_facebook)
                        <span class="d-flex align-items-center">
                            <i class="bi bi-facebook" style="padding-right:5px"></i> <a target="_blank" href="{{ $profile->url_facebook }}" class="social-link">{{__("generated.Facebook")}}</a>
                        </span>
                    @endif
                    @if($profile?->url_twitter)
                        <span class="d-flex align-items-center">
                            <i class="bi bi-twitter" style="padding-right:5px"></i> <a target="_blank" href="{{ $profile->url_twitter }}" class="social-link">{{__("generated.Twitter")}}</a>
                        </span>
                    @endif
                    @if($profile?->url_linkedin)
                        <span class="d-flex align-items-center">
                            <i class="bi bi-linkedin" style="padding-right:5px"></i> <a target="_blank" href="{{ $profile->url_linkedin }}" class="social-link">{{__("generated.LinkedIn")}}</a>
                        </span>
                    @endif
                </div>
                @endif
                
                <!-- Technical Skills -->
                @if(isset($skillsgroup))
                    @foreach ($skillsgroup as $skillTypeId => $skillsInType)
                        @if ($skillsInType->first()->skillType->parent_id == 1)
                            @php
                                $skillTypeLabel = $skillsInType->first()?->skillType->label ?? 'Compétences Techniques';
                            @endphp
                            <div class="section-title">{{ __($skillTypeLabel) }}</div>
                            @foreach ($skillsInType as $skill)
                                @php
                                    $skillLevel = \DB::table('profiles_skills')
                                        ->where('skill_id', $skill?->id)
                                        ->where('profile_id', $profile?->id)
                                        ->first();
                                @endphp
                                <div class="skill-item">
                                    <div class="skill-name">{{ __($skill?->label) }}</div>
                                    @if($skillLevel)
                                        @switch($skillLevel->level)
                                            @case(1)
                                                <span class="skill-badge badge-beginner">{{__("generated.Débutant")}}</span>
                                                @break
                                            @case(2)
                                                <span class="skill-badge badge-intermediate">{{__("generated.Intermédiaire")}}</span>
                                                @break
                                            @case(3)
                                                <span class="skill-badge badge-advanced">{{__("generated.Avancé")}}</span>
                                                @break
                                            @case(4)
                                                <span class="skill-badge badge-expert">{{__("generated.Expert")}}</span>
                                                @break
                                            @default
                                                <span class="skill-badge badge-unknown">{{__("generated.Inconnu")}}</span>
                                        @endswitch
                                    @endif
                                </div>
                            @endforeach
                            @break
                        @endif
                    @endforeach
                @endif
                
                <!-- Language Skills -->
                <!-- @if(isset($skillsgroup))
                    <h5 class="section-title">{{ __("generated.Langues")}}</h5>
                    @foreach ($skillsgroup as $skillTypeId => $skillsInType)
                        @if ($skillsInType->first()->skillType->parent_id == 3)
                            <h6>{{ $skillsInType->first()->skillType->label }}</h6>
                            @foreach ($skillsInType as $skill)
                                @php
                                    $skillLevel = \DB::table('profiles_skills')
                                        ->where('skill_id', $skill?->id)
                                        ->where('profile_id', $profile?->id)
                                        ->first();
                                @endphp
                                <div class="skill-item d-flex justify-content-between align-items-center">
                                    <div class="skill-name">{{ __($skill?->label) }}</div>
                                    @if($skillLevel)
                                        @switch($skillLevel->level)
                                            @case(5)
                                                <span class="skill-badge badge-a1">A1</span>
                                                @break
                                            @case(6)
                                                <span class="skill-badge badge-a2">A2</span>
                                                @break
                                            @case(7)
                                                <span class="skill-badge badge-b1">B1</span>
                                                @break
                                            @case(8)
                                                <span class="skill-badge badge-b2">B2</span>
                                                @break
                                            @case(9)
                                                <span class="skill-badge badge-c1">C1</span>
                                                @break
                                            @case(10)
                                                <span class="skill-badge badge-c2">C2</span>
                                                @break
                                            @default
                                                <span class="skill-badge badge-unknown">{{ __("generated.Inconnu")}}</span>
                                        @endswitch
                                    @endif
                                </div>
                            @endforeach
                            @break
                        @endif
                    @endforeach
                @endif -->


                @if(isset($skillsgroup))
                    <h5 class="section-title">{{ __("generated.Langues")}}</h5>
                    @foreach ($skillsgroup as $skillTypeId => $skillsInType)
                        @if ($skillsInType->first()->skillType->parent_id == 3)
                            <h7><strong>{{ $skillsInType->first()->skillType->label }}</strong></h7>
                            @foreach ($skillsInType as $skill)
                                @php
                                    $skillLevel = \DB::table('profiles_skills')
                                        ->where('skill_id', $skill?->id)
                                        ->where('profile_id', $profile?->id)
                                        ->first();
                                @endphp
                                <div class="skill-item d-flex justify-content-between align-items-center">
                                    <div class="skill-name">{{ __($skill?->label) }}</div>
                                    @if($skillLevel)
                                        @switch($skillLevel->level)
                                            @case(5)
                                                <span class="skill-badge badge-a1">A1</span>
                                                @break
                                            @case(6)
                                                <span class="skill-badge badge-a2">A2</span>
                                                @break
                                            @case(7)
                                                <span class="skill-badge badge-b1">B1</span>
                                                @break
                                            @case(8)
                                                <span class="skill-badge badge-b2">B2</span>
                                                @break
                                            @case(9)
                                                <span class="skill-badge badge-c1">C1</span>
                                                @break
                                            @case(10)
                                                <span class="skill-badge badge-c2">C2</span>
                                                @break
                                            @default
                                                <span class="skill-badge badge-unknown">{{ __("generated.Inconnu")}}</span>
                                        @endswitch
                                    @endif
                                </div>
                            @endforeach
                            <hr>
                        @endif
                    @endforeach
                @endif
            </div>
            
            <!-- Main Content -->
            <div class="main-content">
                <!-- Print & Download Icons -->
                <div style="display: flex; justify-content: flex-end; gap: 16px; margin-bottom: 10px;">
                    <!-- Print Icon -->
                    <!-- <a href="javascript:window.print()" title="{{ __('generated.Imprimer') }}" style="color: #2c3e50; font-size: 22px;">
                        <i class="bi bi-printer"></i>
                    </a> -->
                    <!-- Print Icon -->
                    <a href="javascript:void(0)" 
                    onclick="printExternalPage('{{ route('candidate-portal.profile.cv.print', $profile->id) }}')" 
                    title="{{ __('generated.Imprimer') }}" 
                    style="color: #2c3e50; font-size: 22px;">
                        <i class="bi bi-printer"></i>
                    </a>
                    <!-- Download Icon (PDF) -->
                    <!-- <a href="{{ route('detail.matching.cv.download', ['profile' => $profile->id]) }}" title="{{ __('generated.Télécharger') }}" style="color: #2c3e50; font-size: 22px;">
                        <i class="bi bi-download"></i>
                    </a> -->
                </div>
                <!-- Name and Profession -->
                <h1 class="name">
                    {{ $profile?->first_name && $profile?->last_name ? $profile->first_name . ' ' . $profile->last_name : 'Nom Prénom' }}
                </h1>
                <h4 class="profession">
                    {{ __($profile?->profession?->label) ?? __('generated.Profession') }}
                </h4>

                <!-- Professional Experience -->
                <div class="main-section-title">{{ __("generated.Expérience Professionnelle") }}</div>
                
                @forelse($profile?->experiences as $experience)
                    <div class="experience-item">
                        <div class="item-header">
                            <img src="{{ $experience->logo && file_exists(public_path('storage/' . $experience->logo)) 
                                ? asset('storage/' . $experience->logo) 
                                : asset('assets/img/briefcase-icon-isolated-on-white-background-work-bag-symbol-free-vector.jpg') }}" 
                                alt="Logo" class="item-logo">
                            <div>
                                <div class="item-title">{{ __($experience->profession?->label) }}</div>
                                <div class="item-subtitle">{{ __($experience->company_name ?? __("generated.Entreprise")) }}</div>
                                <div class="item-date">
                                    {{ __("generated.Du") }} {{ $experience->started_at->format('d/m/Y') }} 
                                    {{ $experience->finished_at ? __("generated.au") . ' ' . $experience->finished_at->format('d/m/Y') : __("generated.à ce jour") }}
                                </div>
                            </div>
                        </div>
                        
                        @if($experience->description)
                            <div class="item-description">{{ __($experience->description) }}</div>
                        @endif
                        
                        @if($experience->project_name || $experience->missions->count() > 0)
                            <div class="missions-title">{{ __("generated.Missions réalisées") }}</div>
                            @if($experience->project_name)
                                <div class="mission-item"><strong>{{ __($experience->project_name) }}</strong></div>
                            @endif
                            @foreach ($experience->missions as $mission)
                                <div class="mission-item">{{ __($mission->description) }}</div>
                            @endforeach
                        @endif
                        
                        @if($experience->skills_tech)
                            <div class="tech-skills">
                                @php
                                    $skills = explode(',', $experience->skills_tech);
                                @endphp
                                @foreach ($skills as $skill)
                                    <span class="tech-skill-tag">#{{ trim($skill) }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="no-data">{{ __("generated.Aucune expérience professionnelle renseignée") }}</div>
                @endforelse
                
                <!-- Education -->
                <div class="main-section-title">{{ __("generated.Formation") }}</div>
                
                @forelse ($profile?->formations as $formation)
                    <div class="formation-item">
                        <div class="item-header">
                            <img src="{{ $formation->logo && file_exists(public_path('storage/' . $formation->logo))
                                ? asset('storage/' . $formation->logo)
                                : asset('assets/img/high-school-modern-simple-icon-vector.jpg') }}" 
                                alt="Logo" class="item-logo">
                            <div>
                                <div class="item-title">{{ $formation->name ?? __("generated.Formation") }}</div>
                                <div class="item-subtitle">{{ __($formation->diploma->label ?? __("generated.Diplôme")) }}</div>
                                <div class="item-date">
                                    {{ $formation->date ? \Carbon\Carbon::parse($formation->date)->format('d/m/Y') : __("generated.Date non renseignée") }}
                                </div>
                            </div>
                        </div>
                        
                        @if($formation->option?->label)
                            <div class="item-description"><strong>{{ __("generated.Option") }}:</strong><span> {{ __($formation->option->label) }} </span></div>
                        @endif
                    </div>
                @empty
                    <div class="no-data">{{ __("generated.Aucune formation renseignée") }}</div>
                @endforelse
                
                <!-- Soft Skills -->
                @if(isset($skillsgroup))
                    @foreach ($skillsgroup as $skillTypeId => $skillsInType)
                        @if ($skillsInType->first()->skillType->parent_id == 2)
                            <div class="main-section-title">{{ __("generated.Compétences Comportementales") }}</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                @foreach ($skillsInType as $skill)
                                    @php
                                        $skillLevel = \DB::table('profiles_skills')
                                            ->where('skill_id', $skill?->id)
                                            ->where('profile_id', $profile?->id)
                                            ->first();
                                    @endphp
                                    <div style="margin-bottom: 10px; width: 48%; font-size: 12px;">
                                        <strong>{{ __($skill?->label) }}</strong>
                                        @if($skillLevel)
                                            @switch($skillLevel->level)
                                                @case(1)
                                                    <span class="skill-badge badge-beginner">{{ __("generated.Débutant") }}</span>
                                                    @break
                                                @case(2)
                                                    <span class="skill-badge badge-intermediate">{{ __("generated.Intermédiaire") }}</span>
                                                    @break
                                                @case(3)
                                                    <span class="skill-badge badge-advanced">{{ __("generated.Avancé") }}</span>
                                                    @break
                                                @case(4)
                                                    <span class="skill-badge badge-expert">{{ __("generated.Expert") }}</span>
                                                    @break
                                                @default
                                                    <span class="skill-badge badge-unknown">{{ __("generated.Inconnu") }}</span>
                                            @endswitch
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            @break
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</main>

<script>
    function printExternalPage(url) {
        const printWindow = window.open(url, '_blank');
        printWindow.focus();

        // Wait for content to fully load before printing
        printWindow.onload = function () {
            printWindow.print();
        };
    }

    function downloadPDF() {
        const element = document.getElementById('printable-content'); // wrap printable content in this div

        const opt = {
            margin:       0.5,
            filename:     'job_offer.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    }

</script>

@endsection