<?php

namespace App\Services;

use App\Http\Requests\Profile\AttentesRequest;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\MobilityOption;
use App\Models\MobilityOptionType;
use App\Models\Profile;
use App\Models\ProfileSkill;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProfileAttentesService
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function storeAttentes($request)
    {
        $profile = $this->profileService->getOrCreateProfile();
        $errorParts = [];

        $formation = Formation::where("profile_id", $profile->id)->first();
        $experience = Experience::where("profile_id", $profile->id)->first();
        $skills = ProfileSkill::where("profile_id", $profile->id)->first();

        if (!$formation) {
            $errorParts[] = "diplômes";
        }
        if (!$experience) {
            $errorParts[] = "expériences";
        }
        if (!$skills) {
            $errorParts[] = "compétences";
        }

        if (!empty($errorParts)) {
            return response()->json([
                'error' => __('Vos :fields doivent être ajoutés.', ['fields' => implode(", ", $errorParts)]),
                'profile' => $profile,
                'profile_id' => $profile->id
            ]);
        }

        $profile->profession_id = $request->profession_id;
        $profile->contract_type = $request->contract_type;
        $profile->min_expected_salary = preg_replace('/\p{Zs}/u', '', $request->min_expected_salary);
        $profile->max_expected_salary = preg_replace('/\p{Zs}/u', '', $request->max_expected_salary);
        $profile->activity_area_id = $request->activity_area_id;
        $profile->categorie_socio_professionnelle = $request->categorie_socio_professionnelle;
        $profile->company_size = $request->company_size;
        $profile->license_types = $request->license_types ?? [];
        $profile->has_driving_license = filter_var($request->has_driving_license, FILTER_VALIDATE_BOOLEAN);
        $profile->update();

        if ($request->has('mobility') && is_array($request->mobility)) {
            foreach ($request->mobility as $type => $mobility) {
                if (isset($mobility['is_active']) && isset($mobility['weight'])) {
                    $mobilityOptionType = MobilityOptionType::firstOrCreate(
                        ['slug' => $type],
                        ['label' => ucfirst($type)]
                    );

                    $isActive = filter_var($mobility['is_active'], FILTER_VALIDATE_BOOLEAN);
                    $weight = is_numeric($mobility['weight']) ? max(0, min(100, (int) $mobility['weight'])) : 0;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $mobilityOptionType->id,
                        ],
                        [
                            'is_active' => $isActive,
                            'weight' => $weight,
                        ]
                    );
                }
            }
        }

        if ($request->has('work_mode') && is_array($request->work_mode)) {
            foreach ($request->work_mode as $type => $workMode) {
                if (isset($workMode['is_active']) && isset($workMode['weight'])) {
                    $workModeType = MobilityOptionType::firstOrCreate(
                        ['slug' => $type],
                        ['label' => ucfirst($type)]
                    );

                    $isActive = filter_var($workMode['is_active'], FILTER_VALIDATE_BOOLEAN);
                    $weight = is_numeric($workMode['weight']) ? max(0, min(100, (int) $workMode['weight'])) : 0;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $workModeType->id,
                        ],
                        [
                            'is_active' => $isActive,
                            'weight' => $weight,
                        ]
                    );
                }
            }
        }

        if ($request->has('work_time') && is_array($request->work_time)) {
            foreach ($request->work_time as $type => $workTime) {
                if (isset($workTime['is_active']) && isset($workTime['weight'])) {
                    $workTimeType = MobilityOptionType::firstOrCreate(
                        ['slug' => $type],
                        ['label' => ucfirst($type)]
                    );

                    $isActive = filter_var($workTime['is_active'], FILTER_VALIDATE_BOOLEAN);
                    $weight = is_numeric($workTime['weight']) ? max(0, min(100, (int) $workTime['weight'])) : 0;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $workTimeType->id,
                        ],
                        [
                            'is_active' => $isActive,
                            'weight' => $weight,
                        ]
                    );
                }
            }
        }

        if ($request->has('availability') && is_array($request->availability)) {
            foreach ($request->availability as $type => $value) {
                if ($type === 'type' && $value === 'immediate') {
                    $availabilityType = MobilityOptionType::firstOrCreate(
                        ['slug' => 'immediate'],
                        ['label' => 'Immediate']
                    );

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $availabilityType->id,
                        ],
                        [
                            'is_active' => true,
                            'notice_period_per_month' => null,
                        ]
                    );

                    $noticeType = MobilityOptionType::where('slug', 'notice')->first();
                    if ($noticeType) {
                        MobilityOption::where('profile_id', $profile->id)
                            ->where('mobility_option_type_id', $noticeType->id)
                            ->update(['is_active' => false, 'notice_period_per_month' => null]);
                    }
                }

                if ($type === 'notice_duration' && $request->availability['type'] === 'notice') {
                    $availabilityType = MobilityOptionType::firstOrCreate(
                        ['slug' => 'notice'],
                        ['label' => 'Notice']
                    );

                    $noticePeriod = is_numeric($value) ? max(1, min(12, (int) $value)) : 1;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $availabilityType->id,
                        ],
                        [
                            'is_active' => true,
                            'notice_period_per_month' => $noticePeriod,
                        ]
                    );

                    $immediateType = MobilityOptionType::where('slug', 'immediate')->first();
                    if ($immediateType) {
                        MobilityOption::where('profile_id', $profile->id)
                            ->where('mobility_option_type_id', $immediateType->id)
                            ->update(['is_active' => false]);
                    }
                }
            }
        }

        return response()->json([
            'message' => __('Mobility saved successfully!'),
            'profile' => $profile,
            'profile_id' => $profile->id
        ]);
    }

    /**
     * Update profile attentes and related options.
     */
    public function updateAttentes($request)
    {
        $profileId = session('profile_id');
        $profile = Profile::findOrFail($profileId);

        $errorParts = [];

        $formation = Formation::where("profile_id", $profile->id)->first();
        $experience = Experience::where("profile_id", $profile->id)->first();
        $skills = ProfileSkill::where("profile_id", $profile->id)->first();

        if (!$formation) {
            $errorParts[] = "diplômes";
        }
        if (!$experience) {
            $errorParts[] = "expériences";
        }
        if (!$skills) {
            $errorParts[] = "compétences";
        }

        if (!empty($errorParts)) {
            return response()->json([
                'error' => __('Vos :fields doivent être ajoutés.', ['fields' => implode(", ", $errorParts)]),
                'profile' => $profile,
                'profile_id' => $profile->id
            ]);
        }

        $profile->profession_id = $request->profession_id;
        $profile->contract_type = $request->contract_type;
        $profile->min_expected_salary = preg_replace('/\p{Zs}/u', '', $request->min_expected_salary);
        $profile->max_expected_salary = preg_replace('/\p{Zs}/u', '', $request->max_expected_salary);
        $profile->activity_area_id = $request->activity_area_id;
        $profile->categorie_socio_professionnelle = $request->categorie_socio_professionnelle;
        $profile->company_size = $request->company_size;
        $profile->license_types = $request->license_types ?? [];
        $profile->has_driving_license = filter_var($request->has_driving_license, FILTER_VALIDATE_BOOLEAN);
        $profile->update();

        if ($request->has('mobility') && is_array($request->mobility)) {
            foreach ($request->mobility as $type => $mobility) {
                if (isset($mobility['is_active']) && isset($mobility['weight'])) {
                    $mobilityOptionType = MobilityOptionType::firstOrCreate(
                        ['slug' => $type],
                        ['label' => ucfirst($type)]
                    );

                    $isActive = filter_var($mobility['is_active'], FILTER_VALIDATE_BOOLEAN);
                    $weight = is_numeric($mobility['weight']) ? max(0, min(100, (int) $mobility['weight'])) : 0;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $mobilityOptionType->id,
                        ],
                        [
                            'is_active' => $isActive,
                            'weight' => $weight,
                        ]
                    );
                }
            }
        }

        if ($request->has('work_mode') && is_array($request->work_mode)) {
            foreach ($request->work_mode as $type => $workMode) {
                if (isset($workMode['is_active']) && isset($workMode['weight'])) {
                    $workModeType = MobilityOptionType::firstOrCreate(
                        ['slug' => $type],
                        ['label' => ucfirst($type)]
                    );

                    $isActive = filter_var($workMode['is_active'], FILTER_VALIDATE_BOOLEAN);
                    $weight = is_numeric($workMode['weight']) ? max(0, min(100, (int) $workMode['weight'])) : 0;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $workModeType->id,
                        ],
                        [
                            'is_active' => $isActive,
                            'weight' => $weight,
                        ]
                    );
                }
            }
        }

        if ($request->has('work_time') && is_array($request->work_time)) {
            foreach ($request->work_time as $type => $workTime) {
                if (isset($workTime['is_active']) && isset($workTime['weight'])) {
                    $workTimeType = MobilityOptionType::firstOrCreate(
                        ['slug' => $type],
                        ['label' => ucfirst($type)]
                    );

                    $isActive = filter_var($workTime['is_active'], FILTER_VALIDATE_BOOLEAN);
                    $weight = is_numeric($workTime['weight']) ? max(0, min(100, (int) $workTime['weight'])) : 0;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $workTimeType->id,
                        ],
                        [
                            'is_active' => $isActive,
                            'weight' => $weight,
                        ]
                    );
                }
            }
        }

        if ($request->has('availability') && is_array($request->availability)) {
            foreach ($request->availability as $type => $value) {
                if ($type === 'type' && $value === 'immediate') {
                    $availabilityType = MobilityOptionType::firstOrCreate(
                        ['slug' => 'immediate'],
                        ['label' => 'Immediate']
                    );

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $availabilityType->id,
                        ],
                        [
                            'is_active' => true,
                            'notice_period_per_month' => null,
                        ]
                    );

                    $noticeType = MobilityOptionType::where('slug', 'notice')->first();
                    if ($noticeType) {
                        MobilityOption::where('profile_id', $profile->id)
                            ->where('mobility_option_type_id', $noticeType->id)
                            ->update(['is_active' => false, 'notice_period_per_month' => null]);
                    }
                }

                if ($type === 'notice_duration' && $request->availability['type'] === 'notice') {
                    $availabilityType = MobilityOptionType::firstOrCreate(
                        ['slug' => 'notice'],
                        ['label' => 'Notice']
                    );

                    $noticePeriod = is_numeric($value) ? max(1, min(12, (int) $value)) : 1;

                    MobilityOption::updateOrCreate(
                        [
                            'profile_id' => $profile->id,
                            'mobility_option_type_id' => $availabilityType->id,
                        ],
                        [
                            'is_active' => true,
                            'notice_period_per_month' => $noticePeriod,
                        ]
                    );

                    $immediateType = MobilityOptionType::where('slug', 'immediate')->first();
                    if ($immediateType) {
                        MobilityOption::where('profile_id', $profile->id)
                            ->where('mobility_option_type_id', $immediateType->id)
                            ->update(['is_active' => false]);
                    }
                }
            }
        }

        return response()->json([
            'message' => __('Expectations updated successfully!'),
            'profile' => $profile,
            'profile_id' => $profileId
        ]);
    }
}
