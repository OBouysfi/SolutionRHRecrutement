<?php

namespace App\Services;

use App\Http\Resources\ExperienceResource;
use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;


class ExperienceService
{
    public function storeExperience($request, $profile_id)
    {
        // Handle file upload for the logo
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profiles/experience_logos', 'public');
        }

        // Create a new experience instance
        $experience = new Experience($request->validated());
        $experience->profile_id = $profile_id;
        $experience->logo = $logoPath;

        // Save experience to the database
        $experience->save();

        // Load related models
        $experience->load('profession');


        $profile = Profile::where("id", $profile_id)->first();
        $profile->total_experience_in_years = $profile->getTotalExperienceInYearsAttribute();
        $profile->update();
        return $experience;
    }

    public function getExperiences($profile_id)
    {
        return Experience::where("profile_id", $profile_id)
            ->with('profession')
            ->get();
    }

    public function updateExperience($request)
    {
        $experience = Experience::findOrFail($request->id);
        // Handle logo upload
        $logoPath = $experience->logo;
        if ($request->hasFile('logo')) {
            if ($experience->logo) {
                Storage::disk('public')->delete($experience->logo);
            }
            $logoPath = $request->file('logo')->store('profiles/experience_logos', 'public');
        }

        // Update experience
        $experience->update([
            'logo' => $logoPath,
            'company' => $request->company,
            'profession_id' => $request->profession_id,
            'started_at' => $request->started_at,
            'finished_at' => $request->finished_at,
            'project_name' => $request->project_name,
            'skills_tech' => $request->skills_tech,
            'date' => $request->date,
            'description' => $request->description
        ]);

        $profile = Profile::where("id", $experience->profile_id)->first();
        $profile->total_experience_in_years = $profile->getTotalExperienceInYearsAttribute();
        $profile->update();

        // Fetch updated experiences
        $experiences = Experience::where("profile_id", session('profile_id'))
            ->with('profession')
            ->get();

        return [
            'message' => 'Experience updated successfully!',
            'experience' => new ExperienceResource($experience),
            'experiences' => ExperienceResource::collection($experiences),
        ];
    }
}
