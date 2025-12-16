<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class InformationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $profileId = session('profile_id');

        return [
            'civility' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'family_situation' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            'birth_place' => 'nullable|string|max:255',
            'nationality' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city_id' => 'nullable|integer|exists:cities,id',
            'phone_primary' => 'required|string|max:40|unique:profiles,phone_primary,' . $profileId,
            'phone_secondary' => 'nullable|string|max:40',
            'email' => 'required|email|max:190|unique:profiles,email,' . $profileId,
            'url_facebook' => 'nullable|url|max:255',
            'url_linkedin' => 'nullable|url|max:255',
            'url_twitter' => 'nullable|url|max:255',
            'salary_expectation' => 'nullable|numeric',
            'contract_type' => 'nullable|string|max:255',
            'profession_id' => 'nullable|integer|exists:professions,id',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:10048',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'civility.required' => __('generated_validation.civility_required'),
            'civility.integer' => __('generated_validation.civility_integer'),

            'first_name.required' => __('generated_validation.first_name_required'),
            'first_name.string' => __('generated_validation.first_name_string'),
            'first_name.max' => __('generated_validation.first_name_max'),

            'last_name.required' => __('generated_validation.last_name_required'),
            'last_name.string' => __('generated_validation.last_name_string'),
            'last_name.max' => __('generated_validation.last_name_max'),

            'family_situation.string' => __('generated_validation.family_situation_string'),
            'family_situation.max' => __('generated_validation.family_situation_max'),

            'birth_date.date' => __('generated_validation.birth_date_date'),
            'birth_date.before_or_equal' => __('generated_validation.birth_date_before_or_equal'),

            'birth_place.string' => __('generated_validation.birth_place_string'),
            'birth_place.max' => __('generated_validation.birth_place_max'),

            'nationality.string' => __('generated_validation.nationality_string'),
            'nationality.max' => __('generated_validation.nationality_max'),

            'address.string' => __('generated_validation.address_string'),
            'address.max' => __('generated_validation.address_max'),

            'postal_code.string' => __('generated_validation.postal_code_string'),
            'postal_code.max' => __('generated_validation.postal_code_max'),

            'city_id.integer' => __('generated_validation.city_id_integer'),
            'city_id.exists' => __('generated_validation.city_id_exists'),

            'phone_primary.required' => __('generated_validation.phone_primary_required'),
            'phone_primary.string' => __('generated_validation.phone_primary_string'),
            'phone_primary.max' => __('generated_validation.phone_primary_max'),
            'phone_primary.unique' => __('generated_validation.phone_primary_unique'),

            'phone_secondary.string' => __('generated_validation.phone_secondary_string'),
            'phone_secondary.max' => __('generated_validation.phone_secondary_max'),

            'email.required' => __('generated_validation.email_required'),
            'email.email' => __('generated_validation.email_email'),
            'email.max' => __('generated_validation.email_max'),
            'email.unique' => __('generated_validation.email_unique'),

            'url_facebook.url' => __('generated_validation.url_facebook_url'),
            'url_facebook.max' => __('generated_validation.url_facebook_max'),

            'url_linkedin.url' => __('generated_validation.url_linkedin_url'),
            'url_linkedin.max' => __('generated_validation.url_linkedin_max'),

            'url_twitter.url' => __('generated_validation.url_twitter_url'),
            'url_twitter.max' => __('generated_validation.url_twitter_max'),

            'salary_expectation.numeric' => __('generated_validation.salary_expectation_numeric'),

            'contract_type.string' => __('generated_validation.contract_type_string'),
            'contract_type.max' => __('generated_validation.contract_type_max'),

            'profession_id.integer' => __('generated_validation.profession_id_integer'),
            'profession_id.exists' => __('generated_validation.profession_id_exists'),

            'cv.mimes' => __('generated_validation.cv_mimes'),
            'cv.max' => __('generated_validation.cv_max'),

            'cover_letter.mimes' => __('generated_validation.cover_letter_mimes'),
            'cover_letter.max' => __('generated_validation.cover_letter_max'),

            'video.mimes' => __('generated_validation.video_mimes'),
            'video.max' => __('generated_validation.video_max'),
        ];
    }
}
