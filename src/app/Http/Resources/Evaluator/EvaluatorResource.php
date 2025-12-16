<?php

namespace App\Http\Resources\Evaluator;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvaluatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'client_id' => $this->client_id,
            'profession_id' => $this->profession_id,
            'company_id' => $this->company_id,
            'types_evaluations' => $this->typeCoefficients->map(function ($typeEvaluation) {
                return [
                    'id' => $typeEvaluation->id,
                    'evaluation_type_id' => $typeEvaluation->evaluation_type_id,
                    'coefficient' => $typeEvaluation->coefficient,
                ];
            }),
            
            
        ];;
    }
}
