<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\Company;
use App\Models\PredictiveModel;
use Illuminate\Support\Facades\Log;

class CampaignService
{


    private $keyIframe;
    private $url ;


    // constructor
    public function __construct(  )
    {

        $this->keyIframe = env('ASSESSFIRST_API_KEY');
        $this->url = env('ASSESSFIRST_API_URL');

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



    // get assessfirst campaigns
    public function getAssessFirstCampaigns()
    {

        try{

            $url = $this->url . 'betty/campaign';

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
                    'AF-Token: ' . $this->keyIframe
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);

            return [
                'status' => 'success',
                'data' => $data['data']
            ];

        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    // create campaign
    public function createCampaign($data)
    {
        try {

            // create assessfirst campaign
            $assessFirstCampaign = $this->createAssessFirstCampaign($data);

            // create campaign in DB with campaign_id from assessfirst
            $campaign = Campaign::create([
                'label' => __($data['label']),
                'predictive_model_id' => $data['predictive_model_id'],
                'assessfirst_id' => $assessFirstCampaign['id'],
                'location' => $data['location'],

            ]);

            return $campaign;

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // create assessfirst campaign
    public function createAssessFirstCampaign($data)
    {

        $predictive_model = PredictiveModel::find( $data['predictive_model_id'] );

        // concat $url = $this->url with 'betty/campaign';
        $url = $this->url . 'betty/campaign';

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
        CURLOPT_POSTFIELDS => array('label' =>  $data['label'] ,'target' => $predictive_model->assessfirst_uuid ,'industry' => '7'),

        CURLOPT_HTTPHEADER => array(
                'AF-Token: ' . $this->keyIframe
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['error' => $err], 500);
        }

        $data = json_decode($response, true);

        return $data;


    }




    // update campaign
    public function updateCampaign($data)
    {
        try {

            // update assessfirst campaign
            $assessFirstCampaign = $this->updateAssessFirstCampaign($data);

            // update campaign in DB with campaign_id from assessfirst
            $campaign = Campaign::where('assessfirst_id', $data['assessfirst_id'])->update([
                'label' => __($data['label']),
                'predictive_model_id' => $data['predictive_model_id'],
                'location' => $data['location'],

            ]);

            return response()->json($campaign);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // create assessfirst campaign
    public function updateAssessFirstCampaign($data)
    {

        $predictive_model = PredictiveModel::find( $data['predictive_model_id'] );

        $url = $this->url . 'betty/campaign/' . $data['assessfirst_id'];

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
        CURLOPT_POSTFIELDS => array('label' =>  $data['label'] ,'target' => $predictive_model->assessfirst_uuid ,'industry' => '7'),

        CURLOPT_HTTPHEADER => array(
                'AF-Token: ' . $this->keyIframe
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        return $data;

    }


    // add user to campaign
    public function addUsersToCampaign($data)
    {

        $keyIframe = env('ASSESSFIRST_API_KEY');
        $url = env('ASSESSFIRST_API_URL') . 'betty/campaign/' . $data['campaign_id'] . '/user';

        $added_users = [];

        // for each $data['collaborators'] add user
        foreach ($data['collaborators'] as $collaborator) {

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
            CURLOPT_POSTFIELDS => array('user' => $collaborator),
            CURLOPT_HTTPHEADER => array(
                    'AF-Token: ' . $keyIframe
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if (!$err) {
                $added_users[] = $collaborator;
            }

        }

        return $added_users;

    }


    // getAssessFirstCampaign
    public function getAssessFirstCampaignById($campaign_id)
    {
        try{

            $url = $this->url . 'betty/campaign/' . $campaign_id;

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
                    'AF-Token: ' . $this->keyIframe
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);

            return [
                'status' => 'success',
                'data' => $data['data']
            ];

        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
