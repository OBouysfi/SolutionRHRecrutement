<?php

// app/Http/Resources/FormationResource.php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Country;
use App\Models\Diploma;
use App\Models\DiplomaOption;
use Illuminate\Http\Resources\Json\JsonResource;

class FormationResource extends JsonResource
{
    public function toArray($request)
    {
        $city = City::where("id", $this->city_id)->get()->first();
        $country = Country::where("id", $city?->country->id)->get()->first();
        $diploma = Diploma::where("id", $this->diploma_id)->get()->first();
        $option = DiplomaOption::where("id", $this->option_id)->get()->first();

        return [
            'id' => $this->id,
            'logo' => $this->logo,
            'name' => $this->name,
            'profile_id' => $this->profile_id,
            'city_id' => $this->city_id,
            'city' => $city ? $city->name : null,
            'country' => $country?->name ? : null,
            'country_id' => $country?->id ?? null,
            'level' => $this->level ? $this->level->label : null,
            'level_id' => $this->level_id,
            'diploma_id' => $this->diploma_id,
            'option_id' => $this->option_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'secondary_phone' => $this->secondary_phone,
            'email' => $this->email,
            'diploma_option' => $diploma ? $diploma->label . " - " . $option?->label ?? "" : null,
            'diploma' => $this->diploma ? $this->diploma->label : null,
            'option' => $option ? $option->label : null,
            'description' => $this->description,
            'mention' => $this->mention,
            'date' => $this->date,
            'started_at' => $this->started_at ? $this->started_at->format('Y-m-d') : null,
            'finished_at' => $this->finished_at ? $this->finished_at->format('Y-m-d') : null,
            'created_at' => $this->created_at ? $this->created_at : null,
            'updated_at' => $this->updated_at ? $this->updated_at : null,
        ];
    }
}
