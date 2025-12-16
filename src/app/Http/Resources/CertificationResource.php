<?php
// app/Http/Resources/CertificationResource.php

namespace App\Http\Resources;

use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'logo' => $this->logo,
            'organisme' => $this->organisme,
            'numero_accreditation' => $this->numero_accreditation,
            'adresse' => $this->adresse,
            'city' => $this->city ? $this->city?->name : null,
            'city_id' => $this->city_id ? $this->city?->id : null,
            'country' => Country::where('id',  $this->city?->country?->id)->get()->first()?->name ?: null,
            'country_id' => $this->city?->country?->id ?? null,
            'telephone_1' => $this->telephone_1,
            'telephone_2' => $this->telephone_2,
            'email' => $this->email,
            'nom_certification' => $this->nom_certification,
            'criteres_evaluation' => $this->criteres_evaluation,
            'theme_certification' => $this->theme_certification,
            'score_resultat' => $this->score_resultat,
            'niveau_certification' => $this->niveau_certification,
            'date_obtention' => $this->date_obtention ? $this->date_obtention : null,
            'volume_horaire' => $this->volume_horaire,
            'date_expiration' => $this->date_expiration ? $this->date_expiration : null,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
        ];
    }
}