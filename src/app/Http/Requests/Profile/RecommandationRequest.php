<?php
namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class RecommandationRequest extends FormRequest
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
            'photo' => 'nullable|image|max:10048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'poste' => 'required|integer|exists:professions,id',
            'message' => 'required|string',
            'company' => 'required|string',
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
            'photo.image' => __('generated_validation.photo_image'),
            'photo.mimes' => __('generated_validation.photo_mimes'),
            'photo.max' => __('generated_validation.photo_max'),

            'first_name.required' => __('generated_validation.first_name_required'),
            'first_name.string' => __('generated_validation.first_name_string'),
            'first_name.max' => __('generated_validation.first_name_max'),

            'last_name.required' => __('generated_validation.last_name_required'),
            'last_name.string' => __('generated_validation.last_name_string'),
            'last_name.max' => __('generated_validation.last_name_max'),

            'poste.required' => __('generated_validation.poste_required'),
            'poste.integer' => __('generated_validation.poste_integer'),
            'poste.exists' => __('generated_validation.poste_exists'),

            'message.required' => __('generated_validation.message_required'),
            'message.string' => __('generated_validation.message_string'),

            'company.required' => __('generated_validation.company_required'),
            'company.string' => __('generated_validation.company_string'),
        ];
    }
}
