<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\City;
use App\Models\Diploma;
use App\Models\DiplomaOption;
use App\Models\Skill;
use App\Models\Formation;
use App\Models\Profession;
use App\Models\ProfileSkill;
use App\Models\SkillType;
use App\Services\ProfileService;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class ParseCvController extends Controller
{
    protected $profileService;
    public function __construct(
        ProfileService $profileService,
    ) {
        $this->profileService = $profileService;
    }

    public function testView()
    {
        return view("test");
    }
    public function get_similarity_percentage($str1, $str2)
    {
        $levenshteinDistance = levenshtein($str1, $str2);
        $maxLength = max(strlen($str1), strlen($str2));
        if ($maxLength == 0) {
            return 100; // Strings are identical
        }
        return (1 - $levenshteinDistance / $maxLength) * 100; // Return percentage similarity
    }

    public function parse(Request $request)
    {
        try {
            $minAcceptedSimilarity = 50;
            $request->validate([
                'cv' => 'required|file|mimes:pdf,doc,docx',
            ]);

            // try {
            $file = $request->file('cv');
            $filepath = $file->getPathname();
            $contents = file_get_contents($filepath);
            $modifiedDate = date("Y-m-d", filemtime($filepath));

            $base64str = base64_encode($contents);
            $data = [
                "DocumentAsBase64String" => $base64str,
                "DocumentLastModified" => $modifiedDate
            ];

            $url = env('TEXTKERNEL_API_URL');
            $client = new Client();
            $response = $client->post($url, [
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/json; charset=utf-8',
                    'tx-accountid' => env('TEXTKERNEL_ACCOUNT_ID'),
                    'tx-servicekey' => env('TEXTKERNEL_SERVICE_KEY')
                ],
                'body' => json_encode($data),
            ]);



            // if ($response->getStatusCode() === 200) {
            $parsedData = json_decode($response->getBody(), true);
            // dd($parsedData);
            $city_label = "";
            $data = $parsedData["Value"]["ResumeData"];
            // dd($data);
            if (isset($data['ContactInformation']) && isset($data['ContactInformation']['Location']) && $data['ContactInformation']['Location']['Municipality']) {
                $city_label = $data['ContactInformation']['Location']['Municipality'];
            }

            // $cities = City::get();

            // $city_closest_match = City::where("name", $city_label)->get()->first();
            // $min_distance = PHP_INT_MAX;

            // if ($city_label == "") {
            //     $city_closest_match = null;
            // }

            // if ($city_closest_match != null) {
            //     foreach ($cities as $city) {
            //         $distance = levenshtein($city_label, $city->label);
            //         if ($distance < $min_distance) {
            //             $min_distance = $distance;
            //             $city_closest_match = $city;
            //         }
            //     }
            // }

            $normalizedCityLabel = Str::slug($city_label);
            $city = null;
            $city = City::whereRaw('LOWER(REPLACE(REPLACE(name, " ", "-"), "é", "e")) = ?', [strtolower($normalizedCityLabel)])->get()->first();


            if (!$city) {
                $cities = City::all();
                $city = null;
                $max_similarity = 0;

                foreach ($cities as $existingCity) {
                    $similarity = $this->get_similarity_percentage(strtolower($city_label), strtolower($existingCity->name));
                    if ($similarity > $max_similarity) {
                        $max_similarity = $similarity;
                        if ($similarity > $minAcceptedSimilarity)
                            $city = $existingCity;
                    }
                }
            }


            if (isset($data['ContactInformation']['CandidateName']['GivenName'])) {
                $first_name = $data['ContactInformation']['CandidateName']['GivenName'] ?? "_";
                $last_name = $data['ContactInformation']['CandidateName']['FamilyName'] ?? "_";
            } else {
                $nameParts = explode(' ',  $data['ContactInformation']['CandidateName']['FormattedName'], 2);
                $first_name = $nameParts[0] ?? "_";
                $last_name = $nameParts[1] ?? "_";
            }


            $email = $data['ContactInformation']['EmailAddresses'][0] ?? null;

            $phone = "";
            // if (isset($data['ContactInformation']['Telephones']) && isset($data['ContactInformation']) && (isset($data['ContactInformation']['Location']) || $data['ContactInformation']['Telephones'][0]['Raw'] || $data['ContactInformation']["Location"]['StreetAddressLines'][0])) {
            //     $phone =  $data['ContactInformation']['Telephones'] ? $data['ContactInformation']['Telephones'][0]['Raw'] : $data['ContactInformation']["Location"]['StreetAddressLines'][0];
            //     $phone = preg_replace('/[^0-9]/', '', $phone); // Remove non-numeric characters
            //     if (substr($phone, 0, 1) !== '0') {
            //         $phone = '+' . $phone; // Add + only if it does not start with 0
            //     }
            // }

            if (!empty($data['ContactInformation'])) {
                $contactInfo = $data['ContactInformation'];

                $phone = null;

                if (!empty($contactInfo['Telephones']) && !empty($contactInfo['Telephones'][0]['Raw'])) {
                    $phone = $contactInfo['Telephones'][0]['Raw'];
                } elseif (!empty($contactInfo['Location']['StreetAddressLines'][0])) {
                    $phone = $contactInfo['Location']['StreetAddressLines'][0];
                }

                if (!empty($phone)) {
                    $phone = preg_replace('/[^0-9]/', '', $phone);

                    if (substr($phone, 0, 1) !== '0') {
                        $phone = '+' . $phone;
                    }
                }
            }


            $personnal_url =  $data['ContactInformation']['WebAddresses'][0]['Address'] ?? null;

            $profile = Profile::where("email", $email)->get()->first();
            if (!$profile)
                $profile = Profile::where("phone_primary", $phone)->get()->first();

            if ($profile) {
                // $email = time() . random_int(1, 100) . "@hj.com";
                // $phone = time() . random_int(1, 100);
                // return redirect()->route('profile.edit', $profile->id);
                return response()->json(['error' => 'L’utilisateur existe déjà', 'profile' => new ProfileResource($profile)], 422);
            }

            if (!$phone && !$email) {
                return response()->json(['error' => 'Nous ne pouvons pas analyser votre fichier. Merci d’uploader un CV valide..'], 422);
            }

            $userId = Auth::id();

            if (!Auth::check()) {
                $user = User::create([
                    'name' => $request->first_name . " " . $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                ]);
                $userId = $user->id;
            }

            $profile = new Profile();
            $profile->user_id =  $userId;
            $profile->first_name =  $first_name;
            $profile->last_name =  $last_name;
            $profile->source =  "CVthèque Humanjobs";
            $profile->email = $email;
            $profile->phone_primary = $phone;
            $profile->any_url = $personnal_url;
            if ($city)
                $profile->city_id = $city->id;
            // $profile->desired_profile = $data['Objective'] ?? null;

            if (isset($data['PersonalAttributes']) && isset($data['PersonalAttributes']['Gender'])) {
                if ($data['PersonalAttributes']['Gender'] == 'Male' || $data['PersonalAttributes']['Gender'] == 'Homme' || $data['PersonalAttributes']['Gender'] == 'Masculin' || $data['PersonalAttributes']['Gender'] == '0') {
                    $profile->sexe = 'Homme';
                    $profile->civility = '1';
                } else {
                    $profile->sexe =  'Femme';
                    $profile->civility = '2';
                }
            } else {
                $profile->sexe = 'Homme';
                $profile->civility = '1';
            }
            $profile->save();
            $profile->matricule = $this->profileService->generateMatricule($profile);
            $profile->save();



            $imageData = $parsedData['Value'];
            // dd($imageData);
            if (isset($imageData)) {
                $imageData = $imageData['Conversions'] ?? null;
                if (isset($imageData)) {
                    $imageInfo = $imageData['CandidateImage'];
                    $imageExtention = $imageData['CandidateImageExtension'];
                    $image = base64_decode($imageInfo);

                    $filename = 'profile_' . time() . $imageExtention;  // Example file name

                    $path = Storage::disk('public')->put('profiles/avatars/' . $filename, $image);

                    if ($path) {
                        // Save the path to the profile
                        $profile->path_picture = 'storage/profiles/avatars/' . $filename;
                        $profile->save();
                    }
                }
            }

            // Ajout des expériences professionnelles
            if (isset($data['EmploymentHistory']['Positions'])) {
                foreach ($data['EmploymentHistory']['Positions'] as $position) {

                    $profession_label = isset($position['JobTitle']['Normalized']) ? $position['JobTitle']['Normalized'] : null;

                    $normalizedProfession = Str::slug($profession_label);
                    $profession = null;
                    $profession = Profession::whereRaw('LOWER(REPLACE(REPLACE(label, " ", "-"), "é", "e")) = ?', [strtolower($normalizedProfession)])->get()->first();

                    if (!$profession) {
                        $professions = Profession::all();
                        $profession = null;
                        $max_similarity = 0;

                        foreach ($professions as $existingProfession) {
                            $similarity = $this->get_similarity_percentage(strtolower($profession_label), strtolower($existingProfession->label));
                            if ($similarity > $max_similarity) {
                                $max_similarity = $similarity;
                                if ($similarity > $minAcceptedSimilarity)
                                    $profession = $existingProfession;
                            }
                        }
                    }


                    if (!$profession) {
                        $profession = new Profession();
                        $profession->label = $profession_label;
                        $profession->save();
                    }
                    if ($profession) {
                        Experience::create([
                            'profile_id' => $profile->id,
                            'company' => $position['Employer']['Name']['Normalized'] ?? null,
                            'profession_id' => $profession?->id ?? null,
                            'started_at' => isset($position['StartDate']['Date']) ? Carbon::parse($position['StartDate']['Date'])->format('Y-m-d H:i:s') : null,
                            'finished_at' => isset($position['EndDate']['Date']) ? Carbon::parse($position['EndDate']['Date'])->format('Y-m-d H:i:s') : null,
                            'description' => $position['Description'] ?? null,
                        ]);
                    }
                }
            }

            if (isset($data['Education'])) {
                // Ajout des formations
                foreach ($data['Education']['EducationDetails'] as $formation) {
                    $formation_name = $formation['Degree']['Name']['Raw']  ?? null;
                    $organisme = $formation['SchoolName']['Raw'] ?? null;
                    $diplom_label = $formation['Degree']['Name']['Raw']  ?? null;
                    $started_at = isset($formation['StartDate']['Date']) ? Carbon::parse($formation['StartDate']['Date'])->format('Y-m-d H:i:s') : null;
                    $finished_at = isset($formation['EndDate']['Date']) ? Carbon::parse($formation['EndDate']['Date'])->format('Y-m-d H:i:s') : null;
                    $date = isset($formation['EndDate']['Date']) ? Carbon::parse($formation['EndDate']['Date']) : null;
                    $description = $formation['Text'] ?? null;

                    $formation = Formation::where("name", $formation_name)->where("profile_id", $profile->id)->get()->first();
                    if ($formation) continue;
                    if ($formation_name) {
                        if ($diplom_label) {

                            $normalizedDiplomOption = Str::slug($diplom_label);
                            $diplom = null;
                            $diplom = DiplomaOption::whereRaw('LOWER(REPLACE(REPLACE(label, " ", "-"), "é", "e")) = ?', [strtolower($normalizedDiplomOption)])->get()->first();


                            if (!$diplom) {
                                $diplomas = Diploma::all();
                                $diplom = null;
                                $max_similarity = 0;

                                foreach ($diplomas as $existingDiploma) {
                                    $similarity = $this->get_similarity_percentage(strtolower($diplom_label), strtolower($existingDiploma->label));
                                    if ($similarity > $max_similarity) {
                                        $max_similarity = $similarity;
                                        if ($similarity > $minAcceptedSimilarity)
                                            $diplom = $existingDiploma;
                                    }
                                }
                            }

                            if (!$diplom) {
                                $diplom = new Diploma();
                                $diplom->label = $diplom_label;
                                $diplom->save();
                            }

                            if ($diplom) {
                                $formation = Formation::where('diploma_id', $diplom->id)->where("profile_id", $profile->id)->get()->first();
                                if ($formation) {
                                    $formation->name = $organisme ?? $formation_name;
                                    $formation->started_at = $started_at;
                                    $formation->diploma_id = $diplom->id;
                                    $formation->finished_at = $finished_at;
                                    $formation->description = $description;
                                    $formation->update();
                                } else {
                                    Formation::create([
                                        'profile_id' => $profile->id,
                                        'name' => $organisme ?? $formation_name,
                                        'started_at' => $started_at,
                                        'diploma_id' => $diplom->id,
                                        'finished_at' => $finished_at,
                                        'date' => $date,
                                        'description' => $description
                                    ]);
                                }
                            }
                        }
                    }
                }
            }

            // Ajout des Certifications
            // foreach ($data['Education']['EducationDetails'] as $certification) {
            //     $certification_name = $certification['Degree']['Name']['Raw']  ?? null;
            //     $organisme = $certification['SchoolName']['Raw'] ?? null;
            //     $date_obtention = $certification['EndDate']['Date'] ?? null;

            //     if ($certification_name) {
            //         Certification::create([
            //             "profile_id" => $profile->id,
            //             'nom_certification' => $certification_name,
            //             'organisme' => $organisme,
            //             'date_obtention' => $date_obtention,
            //         ]);
            //     }
            // }
            // }

            // Ajout des compétences
            foreach ($data['Skills']['Raw'] as $skill) {
                $skill_name = $skill['Name'] ?? null;

                if ($skill_name) {

                    $normalizedSkillName = Str::slug($skill_name);

                    $skill = Skill::whereRaw('LOWER(REPLACE(label, " ", "-")) = ?', [strtolower($normalizedSkillName)])->get()->first();

                    if (!$skill) {
                        $skills = Skill::all();
                        $skill = null;
                        $max_similarity = 0;

                        foreach ($skills as $existingSkill) {
                            $similarity = $this->get_similarity_percentage(strtolower($skill_name), strtolower($existingSkill->label));
                            if ($similarity > $max_similarity) {
                                $max_similarity = $similarity;
                                if ($similarity > $minAcceptedSimilarity)
                                    $skill = $existingSkill;
                            }
                        }
                    }
                    if (!$skill && $profession) {
                        $skill_type = SkillType::where('label', $profession->label)->where("parent_id", 1)->get()->first();
                        if (!$skill_type) {
                            $skill_type = new SkillType();
                            $skill_type->parent_id = 1;
                            $skill_type->label = $profession->label;
                            $skill_type->slug = Str::slug($profession->label);
                            $skill_type->save();
                        }

                        if ($skill_type) {
                            $skill = new Skill();
                            $skill->label = $skill_name;
                            $skill->slug = $normalizedSkillName;
                            $skill->skill_type_id = $skill_type->id;
                            $skill->save();
                        }
                    }
                    // Only create a new skill if no close match is found or it's sufficiently far
                    // if (!$closest_match || $min_distance > 3) {
                    if ($skill) {
                        $profile_skill = new ProfileSkill();
                        $profile_skill->profile_id = $profile->id;
                        $profile_skill->skill_id = $skill->id;
                        $profile_skill->weight = 3;
                        $profile_skill->level = 2;
                        $profile_skill->save();
                    }
                    // }
                }
            }

            // Ajout des compétences linguistiques
            foreach ($data['LanguageCompetencies'] as $language) {
                $language_name = $language['Language'] ?? null;

                if ($language_name) {
                    $closest_match = null;
                    $min_distance = PHP_INT_MAX;
                    // $normalizedLanguageName = Str::slug($language_name);

                    $language = SkillType::whereRaw('LOWER(label) = ?', [strtolower($language_name)])->where("parent_id", 3)->get()->first();

                    if (!$language) {
                        $languages = SkillType::where('parent_id', 3)->get();
                        foreach ($languages as $existingLanguage) {
                            $distance = levenshtein($language_name, $existingLanguage->label);
                            if ($distance < $min_distance) {
                                $min_distance = $distance;
                                if ($similarity > 5)
                                    $closest_match = $existingLanguage;
                            }
                        }
                        $language = $closest_match;
                    }
                    // if (!$language) {
                    //     $language = new SkillType();
                    //     $language->label = $language_name;
                    //     $language->slug = $normalizedLanguageName;
                    //     $language->save();
                    // }
                    // Only create a new skill if no close match is found or it's sufficiently far
                    // if (!$closest_match || $min_distance > 3) {
                    if ($language) {
                        $skills = Skill::where("skill_type_id", $language->id)->get();

                        foreach ($skills as $skill) {
                            $profile_skill = new ProfileSkill();
                            $profile_skill->profile_id = $profile->id;
                            $profile_skill->skill_id = $skill->id;
                            $profile_skill->weight = 3;
                            $profile_skill->save();
                        }
                    }
                }
            }

            if (!$profile->profession_id) {
                $profession_label = $data['Objective'] ?? $profession->label;
                $_profession = Profession::whereRaw('LOWER(label) = ?', [strtolower($profession_label)])->get()->first();
                if (!$_profession) {
                    $profession = new Profession();
                    $profession->label = $profession_label;
                    $profession->save();
                } else {
                    $profession = $_profession;
                }
            }
            $profile->profession_id = $profession->id;
            $profile->save();

            return response()->json(['profile_id' => $profile->id, 'profile' => new ProfileResource($profile)]);
            // } else {
            //     Log::error('Error parsing CV: ' . $response->getBody());
            //     return response()->json(['error' => 'Error parsing CV'], 500);
            // }
            // } catch (\Exception $e) {
            //     Log::error('Exception parsing CV: ' . $e->getMessage());
            //     return response()->json(['error' => 'Exception parsing CV'], 500);
            // }

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json(['error' => 'La requête a échoué, Merci d’uploader un CV valide.', 'message' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur s\'est produite, Merci d’uploader un CV valide.', 'message' => $e->getMessage()], 422);
        }
    }
}
