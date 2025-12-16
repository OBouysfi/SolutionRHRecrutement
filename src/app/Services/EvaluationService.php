<?php

namespace App\Services;

use App\Models\EvaluatorTypeCoefficent;
use Exception;
use GuzzleHttp\Client;

class EvaluationService
{ 
    protected $evaluatorId;
    protected $evaluationType; 
    
    public static function getCoefficient($evaluatorId, $evaluationType) : array
    {
        return EvaluatorTypeCoefficent::where([
            'evaluator_id' => $evaluatorId,
            'evaluation_type_id' => $evaluationType
         ])->get()->toArray();
    }
}