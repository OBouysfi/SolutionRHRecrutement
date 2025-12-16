<?php

namespace App\Services;

use App\Models\AssessfirstInvitationHistory;
use App\Models\Company;
use App\Models\PredictiveModel;
use App\Models\Profile;
use Yajra\DataTables\Facades\DataTables;

class PersonalityTestService
{

    private $campaignService;

    public function __construct(CampaignService $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    // get predictiveModels
    public function getPredictiveModels()
    {

        // get first company
        $company = Company::first();
        $company_id = $company ? $company->id : null;

        // get all PredictiveModel for this company
        $predictiveModels = PredictiveModel::where('company_id', $company_id)->get();

        return $predictiveModels;
    }


    // get validated predictiveModels
    public function getValidatedPredictiveModels()
    {

        // get first company
        $company = Company::first();
        $company_id = $company ? $company->id : null;

        // get all PredictiveModel for this company
        $predictiveModels = PredictiveModel::where('company_id', $company_id)->where('status', 'validated')->get();

        return $predictiveModels;
    }


    // validate
    public function validatePredictiveModel($predictiveModel)
    {

        $assessfirstPredictiveModel = $this->getAssessfirstPredictiveModelByLabel($predictiveModel->label);

        if (!$assessfirstPredictiveModel) {
            return [
                'status' => 404,
                'message' => __('PredictiveModel not found in assessfirst')
            ];
        }

        $predictiveModel->update([
            'status' => 'validated',
            'assessfirst_uuid' => $assessfirstPredictiveModel['uuid']
        ]);


        return [
            'status' => 200,
            'message' => __('PredictiveModel validated')
        ];
    }



    // get assessfirst predictiveModels
    public function getAssessfirstPredictiveModels()
    {
        // get first company
        $company = Company::first();
        $company_name = $company ? $company->business_name : null;


        $keyIframe = env('ASSESSFIRST_API_KEY');

        $url = env('ASSESSFIRST_API_URL') . 'betty/targets';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'AF-Token: ' . $keyIframe
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);


        // filter out the response data get only the data with name contain the company_name
        $data = json_decode($response, true);

        $filteredData = array_filter($data, function ($item) use ($company_name) {
            return strpos($item['name'], $company_name) !== false;
        });

        return $filteredData;
    }



    public function getAssessfirstPredictiveModelByLabel($predictiveModelLabel)
    {

        // call getAssessfirstPredictiveModels
        $predictiveModels = $this->getAssessfirstPredictiveModels();

        // find the predictiveModel where name contains predictiveModelLabel
        $predictiveModel = array_filter($predictiveModels, function ($item) use ($predictiveModelLabel) {
            return strpos($item['name'], $predictiveModelLabel) !== false;
        });

        // return the first element if exists
        if (count($predictiveModel) > 0) {
            return array_values($predictiveModel)[0];
        } else {
            return null;
        }

        return $predictiveModel;
    }


    // get assessfirst users
    public function getAssessfirstUsers()
    {

        $keyIframe = env('ASSESSFIRST_API_KEY');
        $url = env('ASSESSFIRST_API_URL') . 'betty/users';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'AF-Token: ' . $keyIframe
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);

        return $data;
    }

    // getAssessfirstCandidates
    public function getAssessfirstCandidates()
    {
        try {
            $keyIframe = env('ASSESSFIRST_API_KEY');
            $url = env('ASSESSFIRST_API_URL') . 'betty/users';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'AF-Token: ' . $keyIframe
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);

            return $data;


        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // get assessfirst user
    public function getAssessfirstUserById($user_uuid, $email = null)
    {
        if ( !$user_uuid && $email) {

            $candidate = $this->getAssessfirstUserByEmail($email);
            $user_uuid = $candidate[0]['uuid'];
            // dd($candidate);

        }


        try {
            $keyIframe = env('ASSESSFIRST_API_KEY');
            $url = env('ASSESSFIRST_API_URL') . 'betty/user/' . $user_uuid . '?locale=fr_FR&synthesis=1';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL =>  $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'AF-Token: ' . $keyIframe
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);

            return $data;

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    // get assessfirst user
    public function getAssessfirstUserByEmail($email)
    {

        try {

            $keyIframe = env('ASSESSFIRST_API_KEY');
            $url = env('ASSESSFIRST_API_URL') . 'betty/users?email=' . $email;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'AF-Token: ' . $keyIframe
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $data = json_decode($response, true);

            return $data['data'] ;

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    // inviteCondidats
    public function inviteCondidats($data)
    {
        $invalidIdCount = 0;
        $invitedIdCount = 0;
        try {
            // foreach data
            foreach ($data['collaborators'] as $collaboratorId) {

                $candidate = $this->inviteCondidat($collaboratorId);
                if (!$candidate) {
                    $invalidIdCount++;
                }else{
                    $invitedIdCount++;
                }
            }
            return ['invalidIdCount' => $invalidIdCount, 'invitedIdCount' => $invitedIdCount];

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // inviteCondidat
    public function inviteCondidat($collaboratorId)
    {

        try {

            // get Candidate by by id
            $candidate = Profile::find($collaboratorId);

            if (!!$candidate && !!$candidate->email) {

                $keyIframe = env('ASSESSFIRST_API_KEY');
                $url = env('ASSESSFIRST_API_URL') . 'betty/user/send-invitation';

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL =>  $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('email' =>  $candidate->email),
                CURLOPT_HTTPHEADER => array(
                    'AF-Token: ' . $keyIframe
                ),
                ));

                $response = curl_exec($curl);

                // err
                if (curl_errno($curl)) {
                    throw new \Exception(curl_error($curl));
                }

                $data = json_decode($response, true);

                curl_close($curl);


                // candidat assessfirstInvitationHistory 'candidate_id', 'assessfirst_uuid', 'date', 'status' if not exist cerate or update
                $assessfirstInvitationHistory = AssessfirstInvitationHistory::where('candidate_id', $candidate->id)->first();

                // get auth
                $user = auth()->user();

                if (isset($data['uuid']) && $data['uuid'] != null) {
                    if (!$assessfirstInvitationHistory) {
                        AssessfirstInvitationHistory::create([
                            'user_id' => $user->id,
                            'candidate_id' => $candidate->id,
                            'assessfirst_uuid' => $data['uuid'],
                            'date' => date('Y-m-d'),
                            'status' => $data['notification'],
                        ]);
                    }else{
                        $assessfirstInvitationHistory->update([
                            'user_id' => $user->id,
                            'candidate_id' => $candidate->id,
                            'assessfirst_uuid' => $data['uuid'],
                            'date' => date('Y-m-d'),
                            'status' => $data['notification'],
                        ]) ;
                    }

                }

                return $data;

            }else {

                return false;
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // listing candidate with pagination and filtering
    public function listingCandidate($request)
    {
        $query = AssessfirstInvitationHistory::with('candidate');

        // Apply search filter if there's a search term
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $search = $request->input('search')['value'];
            $query->whereHas('candidate', function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // Using Yajra DataTables for pagination, filtering, and ordering
        return DataTables::of($query)
            ->addColumn('image', function ($row) {
                return '<img src="' . $row->candidate->getAvatarUrl() . '" alt="Avatar" class="" width="40" height="40">';
            })
            ->addColumn('id', function ($row) {
                return $row->candidate->id;
            })
            ->addColumn('first_name', function ($row) {
                return $row->candidate->first_name;
            })
            ->addColumn('last_name', function ($row) {
                return $row->candidate->last_name;
            })
            ->addColumn('email', function ($row) {
                return $row->candidate->email;
            })
            ->addColumn('invited_at', function ($row) {
                return $row->date;
            })
            ->addColumn('actions', function ($row) { 
                $candidate = $row->candidate;
            
                $actions = '';
            
                if (auth()->user()->can('contact-test-personnelle-show')) {
                    $actions .= '<a href="' . route('personalityTest.candidate.details', ['candidate_id' => $candidate->id]) . '" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="' . __('View details') . '"><i class="bi bi-file-earmark-person" data-bs-toggle="tooltip" data-bs-placement="top" title="' . __('Preview') . '" style="font-size: 19px;margin-right: 9px;color: #2473cf;"></i></a>';
                }
            
                return $actions;
            })            
            ->rawColumns(['image', 'actions']) // This ensures the HTML content is rendered as raw HTML
            ->make(true);
    }


    // get and hydrate invited candidate by uuid
    public function getAndHydrateInvitedCandidate($candidate_id)
    {

        $invit = AssessfirstInvitationHistory::where('candidate_id', $candidate_id)->with('candidate.user')->first();

        // Check if $invit is null before attempting to access its properties
        if (!$invit) {
            // return success message and message 
            return [
                'success' => false,
                'candidate' => null,
                'message' => __('No invitation has been sent to this candidate')
            ];
        }

        $assessfirstUser = $this->getAssessfirstUserById($invit->assessfirst_uuid);
        // if data contain reports
        if (isset($assessfirstUser['reports'])) {

            // $campaign = null;
            // // if assessfirstUser campaign is not null
            // if (isset($assessfirstUser['campaign']) && $assessfirstUser['campaign'] != null && $assessfirstUser['campaign'] != "") {
            //     $campaign = $this->campaignService->getAssessFirstCampaignById($assessfirstUser['campaign']);
            // }

            // filter raport $assessfirstUser['reports'] where assessment == 'Personnalité'
            $reports['swipe'] =  array_filter($assessfirstUser['reports'], function ($report) {
                return $report['assessment'] == 'Personnalité';
            });

            $reports['drive'] =  array_filter($assessfirstUser['reports'], function ($report) {
                return $report['assessment'] == 'Motivation';
            });

            $reports['brain'] =  array_filter($assessfirstUser['reports'], function ($report) {
                return $report['assessment'] == 'Aptitudes';
            });

            $token = $assessfirstUser['token'] ?? null;
            $success = true;
            $message = __('Reports generated successfully');

        }else{
            $token = $invit->assessfirst_uuid;
            $reports =  [
                    'swipe' => null,
                    'drive' => null,
                    'brain' => null
                ];
            $success = false;
            $message = __('No report has been generated for this candidate');
        }
        
            
        $candidate = [
            'token' => $token,
            'candidate_id' => $invit->candidate_id ?? '-',
            'uuid' => $invit->assessfirst_uuid ?? '-',
            'reports' => $reports,
            'first_name' => $invit->candidate->user->first_name ?? '-',
            'last_name' => $invit->candidate->user->last_name ?? '-',
            'email' => $invit->candidate->user->email   ?? '-',
            // 'campaign' => !!$campaign && !!$campaign['label'] ? $campaign['label'] : '' ,
            'invited_at' => $invit->date ?? '-',
            'candidate_created_at' => $invit->candidate->created_at ?? '-'
        ];

        return [
            'success' => $success,
            'candidate' => $candidate,
            'message' => $message,
        ];

    }


    // get condidat matching with predictive model
    public function getCondidatMatchingWithPredictiveModels($candidate_token)
    {

        try {

            $predictiveModels = PredictiveModel::where('status', 'validated')->get();

            $targets_string = '';
            foreach ($predictiveModels as $predictiveModel) {
                if ($targets_string != '') {
                    $targets_string .= ',';
                }
                $targets_string .= $predictiveModel->assessfirst_uuid;
            }

            $keyIframe = env('ASSESSFIRST_API_KEY');
            $url = env('ASSESSFIRST_API_URL') . 'betty/adequacies/' . $candidate_token . '?targets=' . $targets_string;

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'AF-Token: ' . $keyIframe
              ),
            ));


            $response = curl_exec($curl);

            // err
            if (curl_error($curl)) {
                throw new \Exception(curl_error($curl));
            }

            $data = json_decode($response, true);

            curl_close($curl);

            return [ 'predictiveModels' => $predictiveModels, 'data' => $data];


        } catch (\Throwable $th) {
            throw $th;
        }


    }











}
