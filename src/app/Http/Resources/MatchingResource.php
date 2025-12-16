<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function toArray($request)
    {
        // $this représente le modèle Matching
        // $this->profile représente le profil relié
        return [
            'id' => $this->id,
            // Exemple d’avatar (ou photo de profil)
            'avatar' => $this->profile && $this->profile->path_picture
                ? asset($this->profile->path_picture)
                : asset('assets/img/icon/default-user.png'),

            'reference'   => $this->profile->matricule ?? '-',
            'first_name'  => $this->profile->first_name ?? '-',
            'last_name'   => $this->profile->last_name ?? '-',
            'diplome'     => 'Master', // exemple statique, ou $this->profile->diplome
            'option'      => 'Systèmes d’information', // idem
            'experience'  => '4 ans',  // idem
            'poste_actuel'    => 'Chef de projet senior',   // exemple
            'poste_souhaite'  => 'Chef de projet IT',       // exemple

            // Dates (exemple : on reprend created_at / updated_at du Profile ou du Matching)
            'date_depot'        => optional($this->profile)->created_at
                ? $this->profile->created_at->format('d/m/Y')
                : null,
            'date_modification' => optional($this->profile)->updated_at
                ? $this->profile->updated_at->format('d/m/Y')
                : null,

            // Le ratio de matching (0 -> 1), transformé si besoin en pourcentage
            'ratio' => $this->ratio,  // ex : 0.88 => 88%
        ];
    }
}
