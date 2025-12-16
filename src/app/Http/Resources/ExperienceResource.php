<?php

namespace App\Http\Resources;

use App\Models\Profession;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    public function toArray($request)
    {
        $profession = Profession::where("id", $this->profession_id)->get()->first();

        return [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'logo' => $this->logo,
            'company' => $this->company,
            'current_job' => $this->current_job,
            'profession_id' => $this->profession_id,
            'profession' => $profession ? $profession->label : null,
            'started_at' => $this->started_at ? $this->started_at->format('Y-m-d') : null,
            'finished_at' => $this->finished_at ? $this->finished_at->format('Y-m-d') : null,
            'project_name' => $this->project_name,
            'skills_tech' => $this->skills_tech,
            'date' => $this->date ? $this->date : null,
            'description' => $this->description,
            'created_at' => $this->created_at ? $this->created_at : null,
            'updated_at' => $this->updated_at ? $this->updated_at : null,
        ];
    }
}
