<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\Profile\ContractTypeProfileEnum;

class JobOfferCandidateResource extends JsonResource
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
            'client' => $this->client ? $this->client->name : null,
            'title' => $this->title,
            'contract_type' => ContractTypeProfileEnum::getAbbrValue($this->contract_type_id) ?? ' - ',
            'city_name' => $this->city && $this->city ? $this->city->name : null,  
            'diploma_label'=> $this->diplomas && $this->diplomas ? $this->diplomas->name : null, 
            'experience_count' => $this->jobOfferExperience
            ? $this->jobOfferExperience->sum('years') . ' ans' : ' - ',
            'start_date' => $this->mission_started_at ? $this->mission_started_at->format('d/m/Y')  : ' - ',
            'end_date' => $this->mission_finished_at  ? $this->mission_finished_at->format('d/m/Y') : ' - ',
         ];
    }
}
