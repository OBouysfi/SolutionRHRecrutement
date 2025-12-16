<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => "{$this->first_name} {$this->last_name}",
            'email' => $this->email,
            'phone' => $this->phone_primary,
            'sexe' => $this->sexe,
            'age' => $this->age,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'nationality' => $this->nationality,
            'address' => $this->address,
            'city' => optional($this->city)->name,  // If city is a relation
            'postal_code' => $this->postal_code,
            'is_active' => (bool) $this->is_active,
            'is_qualified' => (bool) $this->is_qualified,
            'contract_type' => $this->contract_type,
            'company_size' => $this->company_size,
            'sector' => $this->sector,
            'salary_expectation' => $this->salary_expectation,
            'is_salary_monthly' => (bool) $this->is_salary_monthly,
            'has_driving_license' => (bool) $this->has_driving_license,
            'license_types' => explode(',', $this->license_types), // Convert CSV string to array
            'has_vehicle' => (bool) $this->has_vehicle,
            'is_favorite' => (bool) $this->is_favorite,
            'experience' => [
                'total_years' => $this->total_experience_in_years,
                'total_months' => $this->total_experience_in_months,
            ],
            'formations' => [
                'total_years' => $this->total_formation_in_years,
                'total_months' => $this->total_formation_in_months,
            ],
            'profile_picture' => $this->path_picture ? asset($this->path_picture) : null,
            'cover_photo' => $this->cover_photo ? asset($this->cover_photo) : null,
            'cv' => [
                'cv_manual' => $this->path_cv_manual ? asset($this->path_cv_manual) : null,
                'cv_video' => $this->path_cv_video ? asset($this->path_cv_video) : null,
                'cv_video_duration' => $this->cv_video_duration,
                'cv_link' => $this->url_cv,
            ],
            'social_links' => [
                'linkedin' => $this->url_linkedin,
                'facebook' => $this->url_facebook,
                'twitter' => $this->url_twitter,
                'other' => $this->any_url,
            ],
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
