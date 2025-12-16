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
        // dd($request->min_expected_salary, preg_replace('/\p{Zs}/u', '', $request->min_expected_salary));

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
        $profile->license_types = $request->license_types;
        $profile->has_driving_license = filter_var($request->has_driving_license, FILTER_VALIDATE_BOOLEAN);
        $profile->update();

        foreach ($request->mobility as $type => $mobility) {
            $mobilityOptionType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $mobilityOptionType->id,
                ],
                [
                    'is_active' => filter_var($mobility['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $mobility['weight'],
                ]
            );
        }


        foreach ($request->work_mode as $type => $workMode) {

            $workModeType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $workModeType->id,
                ],
                [
                    'is_active' => filter_var($workMode['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $workMode['weight'],
                ]
            );
        }

        foreach ($request->availability as $type => $value) {
            // $availabilityOptionType = MobilityOptionType::firstOrCreate(
            //     ['slug' => $type],
            //     ['label' => ucfirst($type)]
            // );

            $isActive = false;
            $noticePeriod = null;

            if ($type === 'type' && $value === 'immediate') {
                $availabilityType = MobilityOptionType::where("slug", "immediate")->first();

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
            }

            if ($type === 'notice_duration') {
                $availabilityType = MobilityOptionType::where("slug", "notice")->first();

                MobilityOption::updateOrCreate(
                    [
                        'profile_id' => $profile->id,
                        'mobility_option_type_id' => $availabilityType->id,
                    ],
                    [
                        'is_active' => true,
                        'notice_period_per_month' => $type === 'notice_duration' ? (int) $value : null,
                    ]
                );
            }

            // MobilityOption::updateOrCreate(
            //     [
            //         'profile_id' => $profile->id,
            //         'mobility_option_type_id' => $availabilityOptionType->id,
            //     ],
            //     [
            //         'is_active' => $isActive,
            //         'notice_period_per_month' => $noticePeriod,
            //     ]
            // );
        }



        foreach ($request->work_time as $type => $workTime) {
            if (isset($workTime['is_active']) && isset($workTime['weight'])) {
                $workTimeType = MobilityOptionType::firstOrCreate(
                    ['slug' => $type],
                    ['label' => ucfirst($type)]
                );
                MobilityOption::updateOrCreate(
                    [
                        'profile_id' => $profile->id,
                        'mobility_option_type_id' => $workTimeType->id,
                    ],
                    [
                        'is_active' => filter_var($workTime['is_active'], FILTER_VALIDATE_BOOLEAN),
                        'weight' => (int) $workTime['weight'],
                    ]
                );
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
        $profile->license_types = $request->license_types;
        $profile->has_driving_license = filter_var($request->has_driving_license, FILTER_VALIDATE_BOOLEAN);
        $profile->update();

        foreach ($request->mobility as $type => $mobility) {
            $mobilityOptionType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $mobilityOptionType->id,
                ],
                [
                    'is_active' => filter_var($mobility['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $mobility['weight'],
                ]
            );
        }

        foreach ($request->work_mode as $type => $workMode) {
            $workModeType = MobilityOptionType::firstOrCreate(['slug' => $type], ['label' => ucfirst($type)]);

            MobilityOption::updateOrCreate(
                [
                    'profile_id' => $profile->id,
                    'mobility_option_type_id' => $workModeType->id,
                ],
                [
                    'is_active' => filter_var($workMode['is_active'], FILTER_VALIDATE_BOOLEAN),
                    'weight' => $workMode['weight'],
                ]
            );
        }

        foreach ($request->availability as $type => $value) {
            // $availabilityOptionType = MobilityOptionType::firstOrCreate(['slug' => ucfirst($type)], [
            //     'label' => ucfirst($type),
            // ]);


            if ($type === 'type' && $value === 'immediate') {
                $availabilityType = MobilityOptionType::where("slug", "immediate")->first();

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
            }

            if ($type === 'notice_duration') {
                $availabilityType = MobilityOptionType::where("slug", "notice")->first();

                MobilityOption::updateOrCreate(
                    [
                        'profile_id' => $profile->id,
                        'mobility_option_type_id' => $availabilityType->id,
                    ],
                    [
                        'is_active' => true,
                        'notice_period_per_month' => $type === 'notice_duration' ? (int) $value : null,
                    ]
                );
            }
        }

        foreach ($request->input('work_time', []) as $key => $data) {
            $mobilityOptionType = MobilityOptionType::where('slug', $key)->first();

            if ($mobilityOptionType) {
                MobilityOption::updateOrCreate(
                    [
                        'profile_id' => $profileId,
                        'mobility_option_type_id' => $mobilityOptionType->id,
                    ],
                    [
                        'is_active' => isset($data['is_active']) ? filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN) : false,
                        'weight' => isset($data['weight']) ? (int) $data['weight'] : null,
                    ]
                );
            }
        }


        return response()->json([
            'message' => __('Expectations updated successfully!'),
            'profile' => $profile,
            'profile_id' => $profileId
        ]);
    }
}
