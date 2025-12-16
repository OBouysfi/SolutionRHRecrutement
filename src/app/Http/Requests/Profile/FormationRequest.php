<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
        return [
            'logo' => 'nullable|image|max:10048',
            'name' => 'required|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'secondary_phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'level_id' => 'nullable|exists:levels,id',
            'diploma_id' => 'required|exists:diplomas,id',
            'option_id' => 'required|exists:diploma_options,id',
            'description' => 'nullable|string',
            'option' => 'nullable|string|max:255',
            'mention' => 'nullable|string|max:255',
            'date' => 'required|date',
            'started_at' => 'nullable|date',
            'finished_at' => 'nullable|date',
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
            'logo.image' => __('generated_validation.logo_image'),
            'logo.max' => __('generated_validation.logo_max'),

            'name.required' => __('generated_validation.name_required'),
            'name.string' => __('generated_validation.name_string'),
            'name.max' => __('generated_validation.name_max'),

            'city_id.exists' => __('generated_validation.city_id_exists'),

            'address.string' => __('generated_validation.address_string'),
            'address.max' => __('generated_validation.address_max'),

            'phone.string' => __('generated_validation.phone_string'),
            'phone.max' => __('generated_validation.phone_max'),

            'secondary_phone.string' => __('generated_validation.secondary_phone_string'),
            'secondary_phone.max' => __('generated_validation.secondary_phone_max'),

            'email.email' => __('generated_validation.email_email'),
            'email.max' => __('generated_validation.email_max'),

            'level_id.exists' => __('generated_validation.level_id_exists'),
            'diploma_id.exists' => __('generated_validation.diploma_id_exists'),

            'option_id.exists' => __('generated_validation.option_id_exists'),
            'description.string' => __('generated_validation.description_string'),

            'option.string' => __('generated_validation.option_string'),
            'option.max' => __('generated_validation.option_max'),

            'mention.string' => __('generated_validation.mention_string'),
            'mention.max' => __('generated_validation.mention_max'),

            'date.required' => __('generated_validation.date_required'),
            'date.date' => __('generated_validation.date_date'),

            'started_at.date' => __('generated_validation.started_at_date'),
            'finished_at.date' => __('generated_validation.finished_at_date'),
        ];
    }
}
