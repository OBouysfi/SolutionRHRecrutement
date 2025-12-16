<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {
        $candidateId = $this->route('id') ? $this->route('id') : null;

        return [
            'civility' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sexe' => 'required|string',
            'nationality' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'family_situation' => 'required|string',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255|unique:candidates,email,' . $candidateId,
            'phone_primary' => 'required|string|max:20|unique:profiles,phone_primary,' . $candidateId,
            'status' => 'required|string',
            'language' => 'required|string',
            'path_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'user_id' => 'nullable',
            'overtime' => 'nullable|string',
            'group' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'civility.required' => __('generated_validation.civility_required'),
            'civility.string' => __('generated_validation.civility_string'),

            'first_name.required' => __('generated_validation.first_name_required'),
            'first_name.string' => __('generated_validation.first_name_string'),
            'first_name.max' => __('generated_validation.first_name_max'),

            'last_name.required' => __('generated_validation.last_name_required'),
            'last_name.string' => __('generated_validation.last_name_string'),
            'last_name.max' => __('generated_validation.last_name_max'),

            'sexe.required' => __('generated_validation.sexe_required'),
            'sexe.string' => __('generated_validation.sexe_string'),

            'nationality.required' => __('generated_validation.nationality_required'),
            'nationality.string' => __('generated_validation.nationality_string'),
            'nationality.max' => __('generated_validation.nationality_max'),

            'address.required' => __('generated_validation.address_required'),
            'address.string' => __('generated_validation.address_string'),
            'address.max' => __('generated_validation.address_max'),

            'postal_code.required' => __('generated_validation.postal_code_required'),
            'postal_code.string' => __('generated_validation.postal_code_string'),
            'postal_code.max' => __('generated_validation.postal_code_max'),

            'city_id.required' => __('generated_validation.city_id_required'),
            'city_id.exists' => __('generated_validation.city_id_exists'),

            'family_situation.required' => __('generated_validation.family_situation_required'),
            'family_situation.string' => __('generated_validation.family_situation_string'),

            'birth_place.required' => __('generated_validation.birth_place_required'),
            'birth_place.string' => __('generated_validation.birth_place_string'),
            'birth_place.max' => __('generated_validation.birth_place_max'),

            'birth_date.required' => __('generated_validation.birth_date_required'),
            'birth_date.date' => __('generated_validation.birth_date_date'),

            'email.required' => __('generated_validation.email_required'),
            'email.email' => __('generated_validation.email_email'),
            'email.max' => __('generated_validation.email_max'),
            'email.unique' => __('generated_validation.email_unique'),

            'phone_primary.required' => __('generated_validation.phone_primary_required'),
            'phone_primary.string' => __('generated_validation.phone_primary_string'),
            'phone_primary.max' => __('generated_validation.phone_primary_max'),
            'phone_primary.unique' => __('generated_validation.phone_primary_unique'),

            'status.required' => __('generated_validation.status_required'),
            'status.string' => __('generated_validation.status_string'),

            'language.required' => __('generated_validation.language_required'),
            'language.string' => __('generated_validation.language_string'),

            'path_picture.image' => __('generated_validation.path_picture_image'),
            'path_picture.mimes' => __('generated_validation.path_picture_mimes'),
            'path_picture.max' => __('generated_validation.path_picture_max'),

            'cover_photo.image' => __('generated_validation.cover_photo_image'),
            'cover_photo.mimes' => __('generated_validation.cover_photo_mimes'),
            'cover_photo.max' => __('generated_validation.cover_photo_max'),

            'user_id.nullable' => __('generated_validation.user_id_nullable'),

            'overtime.nullable' => __('generated_validation.overtime_nullable'),
            'overtime.string' => __('generated_validation.overtime_string'),

            'group.nullable' => __('generated_validation.group_nullable'),
            'group.string' => __('generated_validation.group_string'),
        ];
    }

}
