<?php

namespace App\Http\Resources;

use App\Models\Profession;
use Illuminate\Http\Resources\Json\JsonResource;

class RecommendationResource extends JsonResource
{
    public function toArray($request)
    {
        $profession = Profession::where("id", $this->poste)->get()->first();
        return [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'photo' => $this->photo ? $this->photo : null,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'poste' => $this->poste,
            'profession' => $profession ? $profession->label : null,
            'message' => $this->message,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
            'company' => $this->company,
        ];
    }
}
