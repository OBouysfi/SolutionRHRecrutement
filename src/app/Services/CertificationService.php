<?php

namespace App\Services;

use App\Models\Certification;
use Illuminate\Support\Facades\Storage;


class CertificationService
{
    public function storeCertification($request, $profile_id)
    {
        $logo = null;
        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('profiles/certification_logos', 'public');
        }
        $certification = Certification::create([
            'profile_id' => session('profile_id'),
            'organisme' => $request->organisme,
            'logo' => $logo,
            'numero_accreditation' => $request->numero_accreditation,
            'adresse' => $request->adresse,
            'city_id' => $request->city_id,
            'telephone_1' => $request->telephone_1,
            'telephone_2' => $request->telephone_2,
            'email' => $request->email,
            'nom_certification' => $request->nom_certification,
            'criteres_evaluation' => $request->criteres_evaluation,
            'theme_certification' => $request->theme_certification,
            'score_resultat' => $request->score_resultat,
            'niveau_certification' => $request->niveau_certification,
            'date_obtention' => $request->date_obtention,
            'volume_horaire' => $request->volume_horaire,
            'date_expiration' => $request->date_expiration
        ]);
        $certification->save();

        $certification->load(['city', 'city.country']);

        return $certification;
    }

    public function getCertifications($profile_id)
    {
        return Certification::where("profile_id", $profile_id)
            ->with(['city', 'city.country'])
            ->get();
    }


    public function updateCertification($request)
    {
        $certification = Certification::findOrFail($request->id);

        if ($request->hasFile('logo')) {
            if ($certification->logo) {
                Storage::disk('public')->delete($certification->logo);
            }
            $certification->logo = $request->file('logo')->store('profiles/formations/certification_logos', 'public');
        }


        // Update certification
        $certification->update([
            'profile_id' => session('profile_id'),
            'organisme' => $request->organisme,
            'numero_accreditation' => $request->numero_accreditation,
            'adresse' => $request->adresse,
            'city_id' => $request->city_id,
            'telephone_1' => $request->telephone_1,
            'telephone_2' => $request->telephone_2,
            'email' => $request->email,
            'nom_certification' => $request->nom_certification,
            'criteres_evaluation' => $request->criteres_evaluation,
            'theme_certification' => $request->theme_certification,
            'score_resultat' => $request->score_resultat,
            'niveau_certification' => $request->niveau_certification,
            'date_obtention' => $request->date_obtention,
            'volume_horaire' => $request->volume_horaire,
            'date_expiration' => $request->date_expiration
        ]);

        // Fetch updated certifications
        $certifications = $this->getCertifications(session('profile_id'));

        return [
            'message' => 'Certification updated successfully!',
            'certification' => $certification,
            'certifications' => $certifications
        ];
    }
}
