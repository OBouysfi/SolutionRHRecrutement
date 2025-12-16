<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['full_name'];


    protected $table = "profiles";

    protected $casts = [
        'is_talented'   => 'boolean',
        'is_candidate' => 'boolean',
        'is_active'     => 'boolean',
        'is_qualified'  => 'boolean',
        'has_vehicle'   => 'boolean',
        'has_driving_license' => 'boolean',
        'birth_date'    => 'date',
        'identity_expiration_date' => 'date',
    ];

    public function talentFolder()
    {
        return $this->belongsTo(TalentFolder::class, 'talent_folder_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nationality_name()
    {
        return $this->belongsTo(Country::class, 'nationality', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function getCvUrl()
    {
        return $this->path_cv_manual ? Storage::url($this->path_cv_manual) : "";
    }
    public function getCoverLetterUrl()
    {
        return $this->path_cover_letter ? Storage::url($this->path_cover_letter) : "";
    }
    public function getVideoUrl()
    {
        return $this->path_cv_video ? Storage::url($this->path_cv_video) : "";
    }
    public function getAvatarUrl()
    {
        if ($this->path_picture) {
            return Storage::url($this->path_picture);
        }

        if ($this->sexe == 'Homme') {
            return asset('assets/img/male-perso-default.webp');
        } elseif ($this->sexe == 'Femme') {
            return asset('assets/img/female-perso-default.jpg');
        }

        return asset('assets/img/male-perso-default.webp');
    }

    public function getCoverUrl()
    {
        return $this->cover_photo ? Storage::url($this->cover_photo) : asset('assets/img/icon/auth-bg-cover.jpg');
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    // public function experiences()
    // {
    //     return $this->hasMany(Experience::class, 'profile_id');
    // }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'profile_id')->orderBy('finished_at', 'desc');
    }


    // public function getTotalExperienceInYearsAttribute()
    // {
    //     $totalMonths = 0;

    //     foreach ($this->experiences as $experience) {
    //         if ($experience->started_at && $experience->finished_at) {
    //             $start = Carbon::parse($experience->started_at);
    //             $end = Carbon::parse($experience->finished_at);

    //             $months = $start->diffInMonths($end);
    //             $totalMonths += $months;
    //         }
    //     }

    //     return round($totalMonths / 12, 1);
    // }

    // public function getTotalExperienceInYearsAttribute()
    // {
    //     $totalMonths = 0;

    //     foreach ($this->experiences as $experience) {
    //         if ($experience->started_at) {
    //             $start = Carbon::parse($experience->started_at);

    //             // Use current date if it's the current profession
    //             $end = $experience->current_job
    //                 ? Carbon::now()
    //                 : ($experience->finished_at ? Carbon::parse($experience->finished_at) : null);

    //             if ($end) {
    //                 $months = $start->diffInMonths($end);
    //                 $totalMonths += $months;
    //             }
    //         }
    //     }

    //     return round($totalMonths / 12);
    // }

    public function getTotalExperienceInYearsAttribute()
    {
        $totalMonths = 0;

        foreach ($this->experiences as $experience) {
            if (!$experience->started_at) {
                continue;
            }

            try {
                $start = Carbon::parse($experience->started_at);
                
                if ($experience->current_job) {
                    $end = Carbon::now();
                } elseif ($experience->finished_at) {
                    $end = Carbon::parse($experience->finished_at);
                } else {
                    $end = Carbon::now();
                }

                if ($end->lt($start)) {
                    continue;
                }

                $months = $start->diffInMonths($end);
                $totalMonths += $months;
                
            } catch (\Exception $e) {
                continue;
            }
        }

        return round($totalMonths / 12);
    }

    public function formations()
    {
        return $this->hasMany(Formation::class, 'profile_id')->orderBy('date', 'desc');
    }
    public function certifications()
    {
        return $this->hasMany(Certification::class, 'profile_id');
    }

    public function coverLetters()
    {
        return $this->hasMany(CoverLetter::class, 'profile_id');
    }

    public function recommandations()
    {
        return $this->hasMany(Recommandation::class, 'profile_id');
    }

    public function getFullNameAttribute()
    {
        return ucwords("{$this->first_name} {$this->last_name}");
    }

    public function skills()
    {
        // return $this->belongsToMany(
        //     Skill::class,
        //     'profiles_skills', // Nom exact de votre table pivot
        //     'profile_id',             // Clé étrangère de ce modèle (Profile) dans la table pivot
        //     'skill_id'                // Clé étrangère du modèle Skill dans la table pivot
        // )->withPivot('level')        // Indiquez si vous voulez récupérer la colonne 'level'
        //     ->withTimestamps();
        return $this->belongsToMany(Skill::class, 'profiles_skills', 'profile_id', 'skill_id')->withPivot('level', 'weight');
    }

    public function getCategorizedSkills()
    {
        // Fetch skills grouped by type
        return $this->skills()
            ->join('skills', 'profiles_skills.skill_id', '=', 'skills.id')
            ->join('skill_types', 'skills.skill_type_id', '=', 'skill_types.id')
            ->select('skill_types.slug as type', 'skills.label as skill', 'profiles_skills.level', 'profiles_skills.description')
            ->get()
            ->groupBy('type');
    }

    public function languages()
    {
        $skillTypeIds = ProfileSkill::where('profile_id', $this->id)
            ->whereHas('skill', function ($query) {
                $query->whereHas('skillType', function ($subQuery) {
                    $subQuery->where('parent_id', 3);
                });
            })
            ->with('skill.skillType')
            ->get()
            ->pluck('skill.skillType.label')
            ->unique()
            ->flatten();

        return $skillTypeIds;
    }

    // public function languagesSkills($language_id)
    // {
    //     $skillTypeIds = ProfileSkill::where('profile_id', $this->id)
    //         ->whereHas('skill', function ($query) {
    //             $query->whereHas('skillType', function ($subQuery) {
    //                 $subQuery->where('parent_id', 3)->where('id', $language_id);
    //             });
    //         })
    //         ->with("skill")
    //         ->get();

    //     return $skillTypeIds;
    // }


    public function languagesSkills($language_id)
    {
        $skills = ProfileSkill::where('profile_id', $this->id)
            ->whereHas('skill', function ($query) use ($language_id) {
                $query->whereHas('skillType', function ($subQuery) use ($language_id) {
                    $subQuery->where('parent_id', 3)
                        ->where('id', $language_id);
                });
            })
            ->with('skill')
            ->get()
            ->map(function ($profileSkill) {
                $skill = $profileSkill->skill;
                if ($skill) {
                    $skill->label = __($skill->label);
                }
                return $profileSkill;
            });
        return $skills;
    }



    public function getProfileSkillsByType()
    {
        return [
            'technical' => $this->getProfileSkillsType(1),
            'personal' => $this->getProfileSkillsType(2),
            'languages' => $this->getProfileSkillsType(3),
        ];
    }

    private function getProfileSkillsType($parentTypeId)
    {
        $skillTypeIds = ProfileSkill::where('profile_id', $this->id)
            ->whereHas('skill')
            ->with('skill')
            ->get()
            ->pluck('skill.skill_type_id')
            ->unique();

        $skillTypes = SkillType::whereIn('id', $skillTypeIds)
            ->where('parent_id', $parentTypeId)
            ->with(['skills' => function ($query) use ($skillTypeIds) {
                $query->whereIn('skill_type_id', $skillTypeIds);
            }])
            ->get();

        return $skillTypes;
    }

    public function getSkillsByType()
    {
        return [
            'technical' => $this->getSkillsForType(1),
            'personal' => $this->getSkillsForType(2),
            'languages' => $this->getSkillsForType(3),
        ];
    }

    public function getTypeofSkills()
    {
        return [
            'technical' => $this->getTypeSkills(1),
            'personal' => $this->getTypeSkills(2),
            'languages' => $this->getTypeSkills(3),
        ];
    }

    private function getTypeSkills($parentTypeId)
    {
        $typeIds = SkillType::where('parent_id', $parentTypeId)
            ->pluck('id');

        $skillTypes = SkillType::where('parent_id', $parentTypeId)->with('skills')->get();

        return $skillTypes;
    }
    private function getSkillsForType($parentTypeId)
    {
        $typeIds = SkillType::where('parent_id', $parentTypeId)->pluck('id');

        return ProfileSkill::with('skill')
            ->where('profile_id', $this->id)
            ->whereHas('skill', function ($query) use ($typeIds) {
                $query->whereIn('skill_type_id', $typeIds);
            })
            ->get();
    }

    public function mobilityoptions()
    {
        return [
            'geographique' => $this->getMobilityOptions(1),
            'temps_travail' => $this->getMobilityOptions(6),
            'mode_travail' => $this->getMobilityOptions(10),
            'disponibli' => $this->getMobilityOptions(13),
        ];
    }

    private function getMobilityOptions($parent_Id)
    {
        $optionIds = MobilityOptionType::where('parent_id', $parent_Id)
            ->pluck('id');

        $mobilityOptions = MobilityOption::whereIn('mobility_option_type_id', $optionIds)->where("profile_id", $this->id)
            ->with('mobilityOptionType')
            ->get();

        return $mobilityOptions;
    }


    public function activatedMobilityoptions()
    {
        return [
            'geographique' => $this->getMobilityActivatedOptions(1),
            'temps_travail' => $this->getMobilityActivatedOptions(6),
            'mode_travail' => $this->getMobilityActivatedOptions(10),
            'disponibli' => $this->getMobilityActivatedOptions(13),
        ];
    }


    private function getMobilityActivatedOptions($parent_Id)
    {
        $optionIds = MobilityOptionType::where('parent_id', $parent_Id)
            ->pluck('id');

        $mobilityOptions = MobilityOption::whereIn('mobility_option_type_id', $optionIds)
            ->where("profile_id", $this->id)
            ->where("is_active", true)
            ->with('mobilityOptionType')
            ->get();

        // Debug:
        // dd($mobilityOptions);

        return $mobilityOptions;
    }


    public function eventParticipants()
    {
        return $this->hasMany(EventParticipant::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_participants', 'profile_id', 'event_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeQualified($query)
    {
        return $query->where('is_qualified', 1);
    }

    // AssessfirstInvitationHistory relation with one to one
    public function assessfirstInvitationHistory()
    {
        return $this->hasOne(AssessfirstInvitationHistory::class, 'candidate_id', 'id');
    }

    public function temporaryLinks()
    {
        return $this->hasMany(TemporaryLink::class);
    }

    public function trackingApplications()
    {
        return $this->hasMany(TrackingApplication::class, 'profile_id');
        
    }

        public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getIsEmbauchedAttribute()
    {
        return $this->assignments()->exists();
    }

      public function assignments()
    {
        return $this->hasMany(Assignment::class, 'profile_id');
    }
}