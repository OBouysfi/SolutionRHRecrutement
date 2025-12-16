<?php

namespace App\Services;

use App\Mail\WelcomeUserMailFromProfile;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use DateTime;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Services\SettingService;

use Illuminate\Support\Str;
use App\Mail\WelcomeUserMail;

class ProfileService
{
    public function getOrCreateProfile()
    {
        $profileId = session('profile_id');
        if ($profileId) {
            $profile = Profile::find($profileId);
            if ($profile) {
                return $profile;
            }
        }

        // Create a new profile if no valid profile is found
        $profile = new Profile();
        // $profile->client_id = Auth::user()->client_id;
        $profile->sexe = 'Homme';
        $profile->first_name = "_";
        $profile->last_name = "_";
        $profile->email = time() . random_int(1, 100) . "@hj.com";
        $profile->phone_primary = time() . random_int(1, 100);
        $profile->save();
        session(['profile_id' => $profile->id]);
        return $profile;
    }
    function generateMatricule($profile)
    {
        if ($profile->id < 999) {
            $formattedId = str_pad($profile->id, 4, '0', STR_PAD_LEFT);  // Ex: 0012, 0999
        } else {
            $formattedId = $profile->id;  // Laisser l'ID tel quel s'il est >= 999
        }

        $matricule = "HJ" . $formattedId;

        $originalMatricule = $matricule;
        $counter = 1;

        while (Profile::where('matricule', $matricule)->exists()) {
            $matricule = $originalMatricule . '-' . $counter;
            $counter++;
        }

        return $matricule;
    }
    public function storeInformation($request)
    {
        // Get or create the profile
        $profile = $this->getOrCreateProfile();

        // Generate a random password
        $password = Str::random(12);

        $userId = Auth::id();

        // if (!Auth::check()) {
        //     $user = User::create([
        //         'name' => $request->first_name . " " . $request->last_name,
        //         'email' => $request->email,
        //         'password' => Hash::make($password),
        //     ]);
        //     $userId = $user->id;
        // }

        $user = User::where("email", $request->email)->get()->first();

        // if ($user->count()<1) {
        //     $user = User::create([
        //         'name' => $request->first_name . " " . $request->last_name,
        //         'email' => $request->email,
        //         'password' => Hash::make($password),
        //     ]);
        //     $userId = $user->id;
        // }

        if (!$user) {
            
            $role = Role::where("name", "Candidat")->get()?->first();
            $user = User::create([
                'name' => $request->first_name . " " . $request->last_name,
                'email' => $request->email,
                'role_id'=> $role?->id,
                'password' => Hash::make($password),
                'email_verified_at' => null, // Set to null for first-time users
            ]);

            $userId = $user->id;
            
            $sendMail = Setting::where('key', "candidate_email")->get()->first();
            
            // Send welcome email
            if($sendMail?->value === '1'){
                try {
                    Mail::to($user->email)->send(new WelcomeUserMailFromProfile($user));
                    
                    // Optional: Log the email sending
                    \Log::info('Welcome email sent to: ' . $user->email);
                } catch (\Exception $e) {
                    // Handle email sending error
                    \Log::error('Failed to send welcome email to ' . $user->email . ': ' . $e->getMessage());
                }
            }
        }

        $profile->user_id = $userId;
        $profile->sexe = $request->civility == 1 ? 'Homme' : 'Femme';
        $profile->civility = $request->civility;
        $profile->matricule = $this->generateMatricule($profile);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->family_situation = $request->family_situation;
        $profile->birth_date = $request->birth_date;
        $profile->birth_place = $request->birth_place;
        $profile->nationality = $request->nationality;
        $profile->address = $request->address;
        $profile->postal_code = $request->postal_code;
        $profile->city_id = $request->city_id;
        $profile->phone_primary = $request->phone_primary;
        $profile->phone_secondary = $request->phone_secondary;
        $profile->email = $request->email;
        $profile->url_facebook = $request->url_facebook;
        $profile->url_linkedin = $request->url_linkedin;
        $profile->url_twitter = $request->url_twitter;
        $profile->source = $request->source;
        $profile->salary_expectation = $request->salary_expectation;
        // Handle file uploads (uncomment if needed)
        // if ($request->hasFile('cv')) {
        //     $profile->path_cv_manual = $request->file('cv')->store('profiles/cvs', 'public');
        // }

        // if ($request->hasFile('cover_letter')) {
        //     $profile->path_cover_letter = $request->file('cover_letter')->store('profiles/cover_letters', 'public');
        // }

        // if ($request->hasFile('video')) {
        //     $profile->path_cv_video = $request->file('video')->store('profiles/videos', 'public');
        // }

        // Save profile
        $profile->save();


        // Mail::to($user->email)->send(new WelcomeUserMail($user, $password));

        session(['profile_id' => $profile->id]);

        return $profile;
    }
    public function getProfilesIndex($request, $id)
    {
        // $currentSupplierId = auth()->user()->client_id;

        $profiles = Profile::select([
            'id',
            'matricule',
            'first_name',
            'last_name',
            'path_picture',
            'desired_profile',
            'profession_id',
            'is_favorite',
            'total_experience_in_years',
            'total_formation_in_months',
            'is_active',
            'is_qualified',
            'created_at',
            'updated_at'
        ])
        // ->where('client_id', $currentSupplierId)
        ->with('profession', 'formations', 'formations.diploma', 'formations.option');

        // // Define the base query
        // $profiles = Profile::select([
        //     'id',
        //     'matricule',
        //     'first_name',
        //     'last_name',
        //     'path_picture',
        //     'desired_profile',
        //     'profession_id',
        //     'is_favorite',
        //     'total_experience_in_years',
        //     'total_formation_in_months',
        //     'is_active',
        //     'is_qualified',
        //     'created_at',
        //     'updated_at'
        // ])->where("user_id", )->with('profession', 'formations', 'formations.diploma', 'formations.option');

        // Filter based on ID
        if ($id == 1) {
            $profiles->where("is_active", 1);
        } elseif ($id == 2) {
            $profiles->where("is_qualified", 1);
        } elseif ($id == 3) {
            $profiles->where("is_active", 0)->where("is_qualified", 0);
        }

        if ($request->filled(['start_date', 'end_date'])) {
            $profiles->whereBetween('created_at', [$request->start_date, $request->end_date]);
        } elseif ($request->filled('start_date')) {
            $profiles->whereDate('created_at', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $profiles->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->has('diplome') && $request->diplome !== 'Tous') {
            $profiles->whereHas('formations.diploma', function ($query) use ($request) {
                $query->where('id', $request->diplome);
            });
        }

        if ($request->has('niveau') && $request->niveau !== 'Tous') {
            $profiles->whereHas('formations.level', function ($query) use ($request) {
                $query->where('id', $request->niveau);
            });
        }

        if ($request->has('experience') && $request->experience !== 'Tous') {
            $experience = $request->experience;

            if ($experience !== null && $experience !== '') {
                $profiles->whereBetween('total_experience_in_years', [$experience, $experience + 0.99]);
            }
        }
        // $experience = $request->experience;

        // if ($experience !== null && $experience !== '' && $experience !== 'Tous') {
        //     $profiles = $profiles->filter(function ($profile) use ($experience) {
        //         return $profile->getTotalExperienceInYearsAttribute() == $experience;
        //     });
        // }

        if ($request->has('poste') && $request->poste !== 'Tous') {
            $profiles->whereHas('profession', function ($query) use ($request) {
                $query->where('id', $request->poste);
            });
        }

        if ($request->has('contract_type') && $request->contract_type !== 'Tous') {
            $profiles->where('contract_type', $request->contract_type);
        }

        if ($request->has('ville') && $request->ville !== 'Tous') {
            $profiles->where('city_id', $request->ville);
        }

        if ($request->has('pays') && $request->pays !== 'Tous' && !empty($request->pays)) {
            $profiles->whereHas('city.country', function ($query) use ($request) {
                $query->where('countries.id', $request->pays);
            });
        }

        $profiles = $profiles->get();

        return DataTables::of($profiles)
            ->addColumn('picture', function ($profile) {
                return '<img src="' . $profile->getAvatarUrl() . '" alt="Picture" class="" width="40" style="max-width:none;">';
            })
            ->addColumn('profession_label', function ($profile): mixed {
                return $profile->profession ? __($profile->profession->label) : __('generated.Non défini');
            })

            ->addColumn('diploma_label', function ($profile) {
                $formation = $profile->formations->first();
                return $formation && $formation->diploma
                    ? __($formation->diploma->label)
                    : ' - ';
            })

            ->addColumn('desired_profession', function ($profile) {
                return $profile->profession ? __($profile->profession->label) : __('generated.Non défini');
            })
            ->addColumn('tab', function ($profile) {
                return '';
            })

            ->addColumn('option', function ($profile) {
                $formation = $profile->formations->first();

                return $formation && $formation->option
                    ? __($formation->option->label)
                    : ' - ';
            })

            ->addColumn('total_experience', function ($profile) {

                return $profile->getTotalExperienceInYearsAttribute() . ' '. __('generated.ans');
            })
            
            // ->addColumn('current_profession', function ($profile) {
            //     return $profile->desired_profile ? __($profile->desired_profile) : ' - ';
            // })

            ->addColumn('current_profession', function ($profile) {
                $lastExperience = $profile->experiences->sortByDesc('finished_at')->first();
                return $lastExperience && $lastExperience->profession
                    ? __($lastExperience->profession->label)
                    : ' - ';
            })
            // ->addColumn('is_active', function ($profile) {
            //     $checked = $profile->is_active ? 'checked' : '';
            //     return '
            //         <div class="form-check form-switch text-center">
            //             <input class="form-check-input toggle-active" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
            //         </div>
            //     ';
            // })
            // ->addColumn('is_qualified', function ($profile) {
            //     $checked = $profile->is_qualified ? 'checked' : '';
            //     return '
            //         <div class="form-check form-switch text-center">
            //             <input class="form-check-input toggle-qualified" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
            //         </div>
            //     ';
            // })
            ->addColumn('is_active', function ($profile) {
                $checked = $profile->is_active ? 'checked' : '';
                return '
                    <div class="d-flex justify-content-center" style="margin-left: 30px;">
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-active" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
                        </div>
                    </div>
                ';
            })
            ->addColumn('is_qualified', function ($profile) {
                $checked = $profile->is_qualified ? 'checked' : '';
                return '
                    <div class="d-flex justify-content-center" style="margin-left: 30px;">
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-qualified" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
                        </div>
                    </div>
                ';
            })

            ->addColumn('action', function ($profile) {
                $dropdown = '
                    <div class="dropdown text-center">
                        <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">';

                if (auth()->user()->can('profile-detail')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="' . route('detail.matching.cv.preview', $profile->id) . '">' . __('generated.Détail') . '</a></li>';
                }
                if (auth()->user()->can('profile-edit')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="' . route('profile.edit', $profile->id) . '">'  . __('generated.Éditer') . '</a></li>';
                }
                if (! $profile->is_talented && auth()->user()->can('profile-ajouter-au-vivier')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="confirmAddToVivier(' . $profile->id . ')">' . __('generated.Ajouter au Vivier') . '</a></li>';
                }
                if (! $profile->is_active && auth()->user()->can('profile-activer-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="activateProfile(' . $profile->id . ')">' . __('generated.Activer le profil') . '</a></li>';
                }
                if ($profile->is_active && auth()->user()->can('profile-desactiver-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="deactivateProfile(' . $profile->id . ')">' . __('generated.Désactiver le profil') . '</a></li>';
                }
                if (! $profile->is_qualified && auth()->user()->can('profile-qualifier-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileQualified(' . $profile->id . ')">' . __('generated.Qualifier le profil') . '</a></li>';
                }
                if ($profile->is_qualified && auth()->user()->can('profile-dequalifier-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileNotQualified(' . $profile->id . ')">' . __('generated.Déqualifier le profil') . '</a></li>';
                }
                if (auth()->user()->can('profile-delete')) {
                    $dropdown .= '<li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">' . __('generated.Supprimer') . '</a></li>';
                }
                $dropdown .= '</ul></div>';

                return $dropdown;
            })

            // ->addColumn('action', function ($profile) {
            //     $dropdown = '
            //         <div class="dropdown text-center">
            //             <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
            //                 <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
            //             </a>

            //             <ul class="dropdown-menu dropdown-menu-end">
            //                 <li><a class="dropdown-item translated_text" href="' . route('detail.matching.cv.preview', $profile->id) . '" >' . __('generated.Détail') . '</a></li>
            //                 <li><a class="dropdown-item translated_text" href="' . route('profile.edit', $profile->id) . '">' . __('generated.Éditer') . '</a></li>
            //                 <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">' . __('generated.Supprimer') . '</a></li>';


            //     if (!$profile->is_talented) {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="confirmAddToVivier(' . $profile->id . ')">' . __('generated.Ajouter au Vivier') . '</a></li>';
            //     }
            //     if (!$profile->is_active) {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="activateProfile(' . $profile->id . ')">' . __('generated.Activer le profil') . '</a></li>';
            //     } else {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="deactivateProfile(' . $profile->id . ')">' . __('generated.Désactiver le profil') . '</a></li>';
            //     }

            //     if (!$profile->is_qualified) {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileQualified(' . $profile->id . ')">' . __('generated.Qualifier le profil') . '</a></li>';
            //     } else {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileNotQualified(' . $profile->id . ')">' . __('generated.Déqualifier le profil') . '</a></li>';
            //     }



            //     $dropdown .= '</ul></div>';

            //     return $dropdown;
            // })
            ->editColumn('created_at', function ($profile) {
                return $profile->created_at ? $profile->created_at->format('d/m/Y') : 'N/A';
            })
            ->editColumn('updated_at', function ($profile) {
                return $profile->updated_at ? $profile->updated_at->format('d/m/Y') : 'N/A';
            })
            ->rawColumns(['picture', 'is_active', 'is_qualified', 'action'])
            ->make(true);
    }
    public function getCustomProfilesIndex($request)
    {
        $profile_ids = explode(',',$request->input('profile_ids'));
        // $currentSupplierId = auth()->user()->client_id;
        // Define the base query
        $query = Profile::select([
            'id',
            'matricule',
            'first_name',
            'last_name',
            'path_picture',
            'profession_id',
            'total_experience_in_years',
            'total_formation_in_months',
            'is_active',
            'is_qualified',
            'created_at',
            'updated_at'
        ])
        // ->whereNot("first_name", 'like', "-")
        // ->where('client_id', $currentSupplierId)
        ->with('profession', 'formations', 'formations.diploma', 'formations.option')->whereIn("id", $profile_ids);
        
        if ($request->filled(['start_date', 'end_date'])) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        } elseif ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $profiles = $query->get();

        // $profiles = $profiles->map(function ($profile) {
        //     $formation = $profile->formations->first();
        //     $languages = json_decode($profile->languages(), true);

        //     return [
        //         'id' => $profile->id,
        //         'matricule' => $profile->matricule,
        //         'first_name' => $profile->first_name,
        //         'last_name' => $profile->last_name,
        //         'picture' => '<img src="' . $profile->getAvatarUrl() . '" alt="Picture" width="40">',
        //         'profession_label' => $profile->profession ? __($profile->profession->label) : __('generated.Non défini'),
        //         'diploma_label' => __(optional($formation?->diploma)->label) ?? ' - ',
        //         'option' => __(optional($formation?->option)->label) ?? ' - ',
        //         'total_experience' => '2ans',
        //         'languages' => is_array($languages) ? implode(', ', $languages) : '',
        //         'action' => view('profile.inc.listing.actions', ['profile' => $profile])->render(),
        //     ];
        // });
        // return DataTables::of($profiles)
        //     ->rawColumns(['picture', 'action'])
        //     ->make(true);


        
        return DataTables::of($profiles)
            ->addColumn('picture', function ($profile) {
                return '<img src="' . $profile->getAvatarUrl() . '" alt="Picture" class="" width="40" style="max-width:none;">';
            })
            ->addColumn('profession_label', function ($profile): mixed {
                return $profile->profession ? $profile->profession->label : 'Non défini';
            })

            ->addColumn('diploma_label', function ($profile) {
                $formation = $profile->formations->first();
                return $formation && $formation->diploma
                    ? __($formation->diploma->label)
                    : ' - ';
            })

            ->addColumn('total_experience', function ($profile) {

                return $profile->getTotalExperienceInYearsAttribute() . ' '. __('generated.ans');
            })

            // ->addColumn('total_experience', function ($profile) {

            //     return $profile->total_experience_in_years . ' '. __('generated.ans') . ' et ' . $profile->total_experience_in_months . ' mois';
            // })

            ->addColumn('languages', function ($profile) {
                $languages = $profile->languages();
                    $languages = json_decode($languages, true);
                return is_array($languages) ? implode(', ', $languages) : '';
            })

            ->addColumn('option', function ($profile) {
                $formation = $profile->formations->first();

                return $formation && $formation->option
                    ? __($formation->option->label)
                    : ' - ';
            })



            ->addColumn('action', function ($profile) {
                $dropdown = '
                    <div class="dropdown text-center">
                        <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                        </a>
            
                        <ul class="dropdown-menu dropdown-menu-end">';

                // Check permission for 'detail' action
                if (auth()->user()->can('profile-detail')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="' . route('detail.matching.cv.preview', $profile->id) . '">' . __('generated.Détail') . '</a></li>';
                }

                // Check permission for 'edit' action
                if (auth()->user()->can('profile-edit')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="' . route('profile.edit', $profile->id) . '">' . __('generated.Éditer') . '</a></li>';
                }

                // Check permission for 'ajouter-au-vivier' action
                if (! $profile->is_talented && auth()->user()->can('profile-ajouter-au-vivier')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="confirmAddToVivier(' . $profile->id . ')">' . __('generated.Ajouter au Vivier') . '</a></li>';
                }

                // Check permission for 'activer-profile' action
                if (! $profile->is_active && auth()->user()->can('profile-activer-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="activateProfile(' . $profile->id . ')">' . __('generated.Activer le profil') . '</a></li>';
                }

                // Check permission for 'desactiver-profile' action
                if ($profile->is_active && auth()->user()->can('profile-desactiver-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="deactivateProfile(' . $profile->id . ')">' . __('generated.Désactiver le profil') . '</a></li>';
                }

                // Check permission for 'qualifier-profile' action
                if (! $profile->is_qualified && auth()->user()->can('profile-qualifier-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileQualified(' . $profile->id . ')">' . __('generated.Qualifier le profil') . '</a></li>';
                }

                // Check permission for 'dequalifier-profile' action
                if ($profile->is_qualified && auth()->user()->can('profile-dequalifier-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileNotQualified(' . $profile->id . ')">' . __('generated.Déqualifier le profil') . '</a></li>';
                }

                // Check permission for 'delete' action
                if (auth()->user()->can('profile-delete')) {
                    $dropdown .= '<li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">' . __('generated.Supprimer') . '</a></li>';
                }
                $dropdown .= '</ul></div>';

                return $dropdown;
            })

            ->rawColumns(['picture', 'action'])
            ->make(true);
    }
    public function getPertinents($request, $matchineProfilesIds)
    {
        // $currentSupplierId = auth()->user()->client_id;
        // Define the base query
        $profiles = Profile::select([
            'id',
            'matricule',
            'first_name',
            'last_name',
            'path_picture',
            'desired_profile',
            'profession_id',
            'is_favorite',
            'total_experience_in_years',
            'total_formation_in_months',
            'is_active',
            'is_qualified',
            'created_at',
            'updated_at'
        ])
        // ->where('client_id', $currentSupplierId)
        ->with('profession', 'formations', 'formations.diploma', 'formations.option')->whereIn('id', $matchineProfilesIds);

        if ($request->filled(['start_date', 'end_date'])) {
            $profiles->whereBetween('created_at', [$request->start_date, $request->end_date]);
        } elseif ($request->filled('start_date')) {
            $profiles->whereDate('created_at', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $profiles->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->has('diplome') && $request->diplome !== 'Tous') {
            $profiles->whereHas('formations.diploma', function ($query) use ($request) {
                $query->where('id', $request->diplome);
            });
        }

        if ($request->has('niveau') && $request->niveau !== 'Tous') {
            $profiles->whereHas('formations.level', function ($query) use ($request) {
                $query->where('id', $request->niveau);
            });
        }

        if ($request->has('experience') && $request->experience !== 'Tous') {
            $experience = $request->experience;

            if ($experience !== null && $experience !== '') {
                $profiles->where('total_experience_in_years', '=', $experience);
            }
        }

        if ($request->has('poste') && $request->poste !== 'Tous') {
            $profiles->whereHas('profession', function ($query) use ($request) {
                $query->where('id', $request->poste);
            });
        }

        if ($request->has('contract_type') && $request->contract_type !== 'Tous') {
            $profiles->where('contract_type', $request->contract_type);
        }

        if ($request->has('pays') && $request->pays !== 'Tous' && !empty($request->pays)) {
            $profiles->whereHas('city.country', function ($query) use ($request) {
                $query->where('countries.id', $request->pays);
            });
        }

        if ($request->has('ville') && $request->ville !== 'Tous') {
            $profiles->where('city_id', $request->ville);
        }

        return DataTables::of($profiles)
            ->addColumn('picture', function ($profile) {
                return '<img src="' . $profile->getAvatarUrl() . '" alt="Picture" class="" width="40" style="max-width:none;">';
            })
            ->addColumn('profession_label', function ($profile): mixed {
                return $profile->profession ? $profile->profession->label : __('generated.Non défini');
            })

            ->addColumn('diploma_label', function ($profile) {
                $formation = $profile->formations->first();
                return $formation && $formation->diploma
                    ? __($formation->diploma->label)
                    : ' - ';
            })

            // ->addColumn('total_experience', function ($profile) {

            //     return $profile->total_experience_in_years . ' '. __('generated.ans') . ' et ' . $profile->total_experience_in_months . ' mois';
            // })

            ->addColumn('total_experience', function ($profile) {

                return $profile->getTotalExperienceInYearsAttribute() . ' '. __('generated.ans');
            })

            ->addColumn('desired_profession', function ($profile) {
                return $profile->profession ? __($profile->profession->label) : __('generated.Non défini');
            })
            ->addColumn('tab', function ($profile) {
                return '';
            })

            ->addColumn('option', function ($profile) {
                $formation = $profile->formations->first();

                return $formation && $formation->option
                    ? __($formation->option->label)
                    : ' - ';
            })

            // ->addColumn('desired_profession', function ($profile) {
            //     return $profile->desired_profile ? __($profile->desired_profile) : ' - ';
            // })

            ->addColumn('current_profession', function ($profile) {
                $lastExperience = $profile->experiences->sortByDesc('finished_at')->first();
                return $lastExperience && $lastExperience->profession
                    ? __($lastExperience->profession->label)
                    : ' - ';
            })
            ->addColumn('is_active', function ($profile) {
                $checked = $profile->is_active ? 'checked' : '';
                return '
                    <div class="form-check form-switch" style="margin-left: 30px;">
                        <input class="form-check-input toggle-active" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
                    </div>
                ';
            })
            ->addColumn('is_qualified', function ($profile) {
                $checked = $profile->is_qualified ? 'checked' : '';
                return '
                    <div class="form-check form-switch" style="margin-left: 30px;">
                        <input class="form-check-input toggle-qualified" disabled type="checkbox" data-id="' . $profile->id . '" ' . $checked . '>
                    </div>
                ';
            })
            ->addColumn('action', function ($profile) {
                $dropdown = '
                    <div class="dropdown text-center">
                        <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
                        </a>
            
                        <ul class="dropdown-menu dropdown-menu-end">';

                // Check permission for 'detail' action
                if (auth()->user()->can('profile-detail')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="' . route('detail.matching.cv.preview', $profile->id) . '">' . __('generated.Détail') . '</a></li>';
                }

                // Check permission for 'edit' action
                if (auth()->user()->can('profile-edit')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="' . route('profile.edit', $profile->id) . '">' . __('generated.Éditer') . '</a></li>';
                }

                // Check permission for 'ajouter-au-vivier' action
                if (! $profile->is_talented && auth()->user()->can('profile-ajouter-au-vivier')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="confirmAddToVivier(' . $profile->id . ')">' . __('generated.Ajouter au Vivier') . '</a></li>';
                }

                // Check permission for 'activer-profile' action
                if (! $profile->is_active && auth()->user()->can('profile-activer-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="activateProfile(' . $profile->id . ')">' . __('generated.Activer le profil') . '</a></li>';
                }

                // Check permission for 'desactiver-profile' action
                if ($profile->is_active && auth()->user()->can('profile-desactiver-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="deactivateProfile(' . $profile->id . ')">' . __('generated.Désactiver le profil') . '</a></li>';
                }

                // Check permission for 'qualifier-profile' action
                if (! $profile->is_qualified && auth()->user()->can('profile-qualifier-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileQualified(' . $profile->id . ')">' . __('generated.Qualifier le profil') . '</a></li>';
                }

                // Check permission for 'dequalifier-profile' action
                if ($profile->is_qualified && auth()->user()->can('profile-dequalifier-profile')) {
                    $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileNotQualified(' . $profile->id . ')">' . __('generated.Déqualifier le profil') . '</a></li>';
                }

                // Check permission for 'delete' action
                if (auth()->user()->can('profile-delete')) {
                    $dropdown .= '<li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">' . __('generated.Supprimer') . '</a></li>';
                }
                $dropdown .= '</ul></div>';

                return $dropdown;
            })


            // ->addColumn('action', function ($profile) {
            //     $dropdown = '
            //         <div class="dropdown text-center">
            //             <a class="text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
            //                 <i class="bi bi-three-dots-vertical" style="font-size: 19px;"></i>
            //             </a>

            //             <ul class="dropdown-menu dropdown-menu-end">
            //                 <li><a class="dropdown-item translated_text" href="' . route('detail.matching.cv.preview', $profile->id) . '" >' . __('generated.Détail') . '</a></li>
            //                 <li><a class="dropdown-item translated_text" href="' . route('profile.edit', $profile->id) . '">' . __('generated.Éditer') . '</a></li>
            //                 <li><a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteProfile(' . $profile->id . ')">' . __('generated.Supprimer') . '</a></li>';


            //     if (!$profile->is_talented) {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="confirmAddToVivier(' . $profile->id . ')">' . __('generated.Ajouter au Vivier') . '</a></li>';
            //     }
            //     if (!$profile->is_active) {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="activateProfile(' . $profile->id . ')">' . __('generated.Activer le profil') . '</a></li>';
            //     } else {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="deactivateProfile(' . $profile->id . ')">' . __('generated.Désactiver le profil') . '</a></li>';
            //     }

            //     if (!$profile->is_qualified) {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileQualified(' . $profile->id . ')">' . __('generated.Qualifier le profil') . '</a></li>';
            //     } else {
            //         $dropdown .= '<li><a class="dropdown-item translated_text" href="javascript:void(0)" onclick="makeProfileNotQualified(' . $profile->id . ')">' . __('generated.Déqualifier le profil') . '</a></li>';
            //     }



            //     $dropdown .= '</ul></div>';

            //     return $dropdown;
            // })
            ->editColumn('created_at', function ($profile) {
                return $profile->created_at ? $profile->created_at->format('d/m/Y') : 'N/A';
            })
            ->editColumn('updated_at', function ($profile) {
                return $profile->updated_at ? $profile->updated_at->format('d/m/Y') : 'N/A';
            })
            ->rawColumns(['picture', 'is_active', 'is_qualified', 'action'])
            ->make(true);
    }

public function getProfilesMain(Request $request)
{
    ini_set('memory_limit', '512M');
    // $currentSupplierId = auth()->user()->client_id;
    $profiles = Profile::with([
        'experiences',
        'formations.diploma',
        'formations.option'
    ])  
    // ->where('client_id', $currentSupplierId)
        ->select(['id', 'first_name', 'last_name', 'total_experience_in_years', 'created_at'])
        ->when($request->filled('start_date'), fn($q) => $q->whereDate('created_at', '>=', $request->start_date))
        ->when($request->filled('end_date'), fn($q) => $q->whereDate('created_at', '<=', $request->end_date))
        ->get();

    // First level grouping by post (profession)
    $groupedByPost = $profiles->groupBy(function ($profile) {
        $exp = $profile->experiences->sortByDesc('finished_at')->first();
        return $exp?->profession?->label ? __($exp->profession->label) : __('generated.Pas d\'experience');
    });

    $formattedData = [];
    
    foreach ($groupedByPost as $poste => $profilesInPoste) {
        // Second level grouping by diploma
        $groupedByDiploma = $profilesInPoste->groupBy(function ($profile) {
            if ($profile->formations && $profile->formations->count()) {
                return $profile->formations->first()->diploma?->label ? __($profile->formations->first()->diploma->label) : __('generated.Sans diplôme');
            }
            return __('generated.Sans diplôme');
        });

        $diplomasData = [];
        
        foreach ($groupedByDiploma as $diplomaLabel => $profilesWithDiploma) {
            // Third level grouping by option
            $groupedByOption = $profilesWithDiploma->groupBy(function ($profile) {
                if ($profile->formations && $profile->formations->count()) {
                    return $profile->formations->first()->option?->label ? __($profile->formations->first()->option->label) : '_';
                }
                return '_';
            });

            $optionsData = [];
            
            foreach ($groupedByOption as $optionLabel => $profilesWithOption) {
                // Fourth level grouping by experience range
                $groupedByExperience = $profilesWithOption->groupBy(function ($profile) {
                    $expYears = $this->calculateTotalExperience($profile->experiences);
                    return __($this->categorizeExperience($expYears));
                });

                $experiencesData = [];
                foreach ($groupedByExperience as $experienceRange => $profilesWithExperience) {
                    // Fifth level grouping by language
                    $groupedByLanguage = $profilesWithExperience->groupBy(function ($profile) {
                        $langs = $profile->languages()->toArray() ?: ['_'];
                        // Translate each language label
                        return array_map(fn($lang) => __($lang), $langs);
                    });

                    $languagesData = [];
                    
                    foreach ($groupedByLanguage as $languageLabels => $profilesWithLanguage) {
                        $languageArray = is_array($languageLabels) ? $languageLabels : [$languageLabels];
                        
                        $languagesData[] = [
                            'languages' => array_unique($languageArray),
                            'profile_count' => $profilesWithLanguage->count(),
                            'profiles' => $profilesWithLanguage->pluck('id')->unique()->toArray(),
                        ];
                    }

                    $experiencesData[] = [
                        'experience_range' => $experienceRange,
                        'languages' => $languagesData,
                        'profile_count' => $profilesWithExperience->count(),
                        'profiles' => $profilesWithExperience->pluck('id')->unique()->toArray(),
                    ];
                }

                $optionsData[] = [
                    'option' => $optionLabel,
                    'experiences' => $experiencesData,
                    'profile_count' => $profilesWithOption->count(),
                    'profiles' => $profilesWithOption->pluck('id')->unique()->toArray(),
                ];
            }

            $diplomasData[] = [
                'diploma' => $diplomaLabel,
                'options' => $optionsData,
                'profile_count' => $profilesWithDiploma->count(),
                'profiles' => $profilesWithDiploma->pluck('id')->unique()->toArray(),
            ];
        }

        $formattedData[] = [
            'poste' => $poste,
            'id' => count($formattedData) + 1,
            'diplomas' => $diplomasData,
            'profile_count' => $profilesInPoste->count(),
            'profiles' => $profilesInPoste->pluck('id')->unique()->toArray(),
        ];
    }

    // Paginate on poste level
    $perPage = (int) $request->get('perPage', 10);
    $currentPage = (int) $request->get('page', 1);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedData = array_slice($formattedData, $offset, $perPage);

    return [
        'draw' => $request->get('draw', 1),
        'recordsTotal' => count($formattedData),
        'recordsFiltered' => count($formattedData),
        'data' => $paginatedData,
        'current_page' => $currentPage,
        'last_page' => ceil(count($formattedData) / $perPage)
    ];
}

    // Helper function to categorize experience into ranges
    private function categorizeExperience($years)
    {
        if ($years < 1) return '0-1 ' . __('generated.ans');
        if ($years < 3) return '1-3 '. __('generated.ans');
        if ($years < 5) return '3-5 '. __('generated.ans');
        if ($years < 10) return '5-10 '. __('generated.ans');
        return '10+ '. __('generated.ans');
    }
    // public function getProfilesMain(Request $request)
    // {
    //     ini_set('memory_limit', '512M');
    //     $profiles = Profile::with([
    //         'experiences',
    //         'formations.diploma',
    //         'formations.option',
    //         // 'languages'
    //     ])
    //         ->select(['id', 'first_name', 'last_name', 'total_experience_in_years', 'created_at'])
    //         ->when($request->filled('start_date'), fn($q) => $q->whereDate('created_at', '>=', $request->start_date))
    //         ->when($request->filled('end_date'), fn($q) => $q->whereDate('created_at', '<=', $request->end_date))
    //         ->get();

    //     // Group by poste (based on latest experience)
    //     $grouped = $profiles->groupBy(function ($profile) {
    //         $exp = $profile->experiences->sortByDesc('finished_at')->first();
    //         return $exp?->profession?->label ?? 'Pas d\'experience';
    //     });

    //     $formattedData = [];
    //     foreach ($grouped as $poste => $profilesInPoste) {
    //         $groupedDiplomas = [];

    //         foreach ($profilesInPoste as $profile) {
    //             $experienceYears = $this->calculateTotalExperience($profile->experiences);
    //             $languages = $profile->languages()->pluck('label')->toArray(); // avoid toArray on relation

    //             if ($profile->formations && $profile->formations->count()) {
    //                 foreach ($profile->formations as $formation) {
    //                     $diplomaLabel = $formation->diploma?->label ?? generated.';
    //                     $optionLabel = $formation->option?->label ?? '_';

    //                     if (!isset($groupedDiplomas[$diplomaLabel])) {
    //                         $groupedDiplomas[$diplomaLabel] = [
    //                             'options' => [],
    //                             'experiences' => [],
    //                             'languages' => [],
    //                             'profiles' => [],
    //                         ];
    //                     }

    //                     $groupedDiplomas[$diplomaLabel]['options'][] = $optionLabel;
    //                     $groupedDiplomas[$diplomaLabel]['experiences'][] = $experienceYears;
    //                     $groupedDiplomas[$diplomaLabel]['languages'] = array_merge($groupedDiplomas[$diplomaLabel]['languages'], $languages);
    //                     $groupedDiplomas[$diplomaLabel]['profiles'][] = $profile->id;
    //                 }
    //             } else {
    //                 // No formation
    //                 $diplomaLabel = generated.';
    //                 $optionLabel = '_';

    //                 if (!isset($groupedDiplomas[$diplomaLabel])) {
    //                     $groupedDiplomas[$diplomaLabel] = [
    //                         'options' => [],
    //                         'experiences' => [],
    //                         'languages' => [],
    //                         'profiles' => [],
    //                     ];
    //                 }

    //                 $groupedDiplomas[$diplomaLabel]['options'][] = $optionLabel;
    //                 $groupedDiplomas[$diplomaLabel]['experiences'][] = $experienceYears;
    //                 $groupedDiplomas[$diplomaLabel]['languages'] = array_merge($groupedDiplomas[$diplomaLabel]['languages'], $languages);
    //                 $groupedDiplomas[$diplomaLabel]['profiles'][] = $profile->id;
    //             }
    //         }

    //         $diplomas = [];
    //         foreach ($groupedDiplomas as $diplomaLabel => $data) {
    //             $diplomas[] = [
    //                 'diploma' => $diplomaLabel,
    //                 'option' => array_unique($data['options']),
    //                 'experiences' => array_unique($data['experiences']),
    //                 'languages' => array_unique($data['languages']),
    //                 'profile_count' => count(array_unique($data['profiles'])),
    //                 'profiles_group'=> array_unique($data['profiles']),
    //             ];
    //         }

    //         $formattedData[] = [
    //             'poste' => $poste,
    //             'id' => count($formattedData) + 1,
    //             'diplomas' => $diplomas
    //         ];
    //     }

    //     // Paginate on poste level
    //     $perPage = (int) $request->get('perPage', 10);
    //     $currentPage = (int) $request->get('page', 1);
    //     $offset = ($currentPage - 1) * $perPage;
    //     $paginatedData = array_slice($formattedData, $offset, $perPage);

    //     return [
    //         'draw' => $request->get('draw', 1),
    //         'recordsTotal' => count($formattedData),
    //         'recordsFiltered' => count($formattedData),
    //         'data' => $paginatedData,
    //         'current_page' => $currentPage,
    //         'last_page' => ceil(count($formattedData) / $perPage)
    //     ];
    // }


    // public function calculateTotalExperience($experiences)
    // {
    //     $totalMonths = 0;

    //     foreach ($experiences as $exp) {
    //         $start = \Carbon\Carbon::parse($exp->finished_at);
    //         $end = $exp->ended_at ? \Carbon\Carbon::parse($exp->ended_at) : now();
    //         $totalMonths += $start->diffInMonths($end);
    //     }

    //     return round($totalMonths / 12, 1); // in years
    // }

    public function calculateTotalExperience($experiences)
    {
        $totalMonths = 0;

        foreach ($experiences as $exp) {
            // Skip if no start date
            if (!$exp->started_at) {
                continue;
            }

            try {
                $start = \Carbon\Carbon::parse($exp->started_at); // Fixed: was using finished_at
                
                // Use current date if it's ongoing, otherwise use end date
                if ($exp->current_job) {
                    $end = \Carbon\Carbon::now();
                } elseif ($exp->finished_at) { // Fixed: was using ended_at
                    $end = \Carbon\Carbon::parse($exp->finished_at);
                } else {
                    // Skip incomplete non-current experiences
                    $end = \Carbon\Carbon::now();
                }

                // Ensure end date is not before start date
                if ($end->lt($start)) {
                    continue;
                }

                $months = $start->diffInMonths($end);
                $totalMonths += $months;
                
            } catch (\Exception $e) {
                // Skip experiences with invalid dates
                continue;
            }
        }

        return round($totalMonths / 12); // Return whole numbers only (no decimals)
    }

    // function calculateTotalExperience($experiences)
    // {
    //     $totalYears = 0;
    //     $totalMonths = 0;

    //     // Loop through each experience and calculate its duration
    //     foreach ($experiences as $experience) {
    //         // Assuming each experience has a start and end date
    //         $startDate = new DateTime($experience->finished_at);
    //         $endDate = new DateTime($experience->finished_at);

    //         // Calculate the difference in months
    //         $interval = $startDate->diff($endDate);

    //         // Add the years and months to the totals
    //         $totalYears += $interval->y;
    //         $totalMonths += $interval->m;
    //     }

    //     // Convert months to years if greater than 12
    //     $totalYears += floor($totalMonths / 12);
    //     $totalMonths = $totalMonths % 12;

    //     // Now calculate the total experience in decimal years
    //     $totalExperienceInYears = $totalYears + ($totalMonths / 12);

    //     // Round to the nearest integer
    //     $totalExperienceInYears = round($totalExperienceInYears);

    //     return $totalExperienceInYears; // Return the rounded total experience in years
    // }
    public function updateProfileInformation(Profile $profile, Request $request)
    {
        $profile->sexe = $request->civility == 1 ? 'Homme' : 'Femme';
        $profile->civility = $request->civility;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->family_situation = $request->family_situation;
        $profile->birth_date = $request->birth_date;
        $profile->birth_place = $request->birth_place;
        $profile->nationality = $request->nationality;
        $profile->address = $request->address;
        $profile->postal_code = $request->postal_code;
        $profile->city_id = $request->city_id;

        if ($request->phone_primary !== $profile->phone_primary) {
            $profile->phone_primary = $request->phone_primary;
        }

        if ($request->phone_secondary !== $profile->phone_secondary) {
            $profile->phone_secondary = $request->phone_secondary;
        }

        if ($request->email !== $profile->email) {
            $profile->email = $request->email;
        }

        $profile->url_facebook = $request->url_facebook;
        $profile->url_linkedin = $request->url_linkedin;
        $profile->url_twitter = $request->url_twitter;
        $profile->salary_expectation = $request->salary_expectation;
        $profile->source = $request->source;

        $this->handleFileUploads($profile, $request);

        $profile->update();

        return $profile;
    }
    private function handleFileUploads(Profile $profile, Request $request)
    {
        if ($request->hasFile('cv')) {
            $profile->path_cv_manual = $request->file('cv')->store('profiles/cvs', 'public');
        }

        if ($request->hasFile('cover_letter')) {
            $profile->path_cover_letter = $request->file('cover_letter')->store('profiles/cover_letters', 'public');
        }

        if ($request->hasFile('video')) {
            $profile->path_cv_video = $request->file('video')->store('profiles/videos', 'public');
        }
    }
    public function deleteProfile($id)
    {
        $profile = Profile::findOrFail($id);

        $this->deleteRelatedLogos($profile);
        // Delete associated data before deleting the profile
        $profile->formations()->delete();
        $profile->certifications()->delete();
        $profile->experiences()->delete();
        $profile->skills()->delete();
        $profile->recommandations()->delete();
        $profile->coverLetters()->delete();

        // Delete the profile
        $profile->delete();
    }
    public function deleteRelatedLogos($profile)
    {
        // Example: If profile has a logo
        if ($profile->path_picture) {
            Storage::disk('public')->delete($profile->path_picture);
        }
        if ($profile->cover_photo) {
            Storage::disk('public')->delete($profile->cover_photo);
        }
        if ($profile->path_cv_parsing) {
            Storage::disk('public')->delete($profile->path_cv_parsing);
        }
        if ($profile->path_cv_manual) {
            Storage::disk('public')->delete($profile->path_cv_manual);
        }
        if ($profile->path_cover_letter) {
            Storage::disk('public')->delete($profile->path_cover_letter);
        }

        foreach ($profile->formations as $formation) {
            if ($formation->logo) {
                Storage::disk('public')->delete($formation->logo);
            }
        }
        foreach ($profile->certifications as $certification) {
            if ($certification->logo) {
                Storage::disk('public')->delete($certification->logo);
            }
        }

        foreach ($profile->experiences as $experience) {
            if ($experience->logo) {
                Storage::disk('public')->delete($experience->logo);
            }
        }
        foreach ($profile->recommandations as $recommandation) {
            if ($recommandation->photo) {
                Storage::disk('public')->delete($recommandation->photo);
            }
        }
    }
}
