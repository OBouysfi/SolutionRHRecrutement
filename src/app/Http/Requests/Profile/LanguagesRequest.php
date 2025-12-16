<?php
namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
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
            'language' => 'required|integer',
            'skills.*.skill' => 'required|string|max:250',
            'skills.*.level' => 'required|string|max:2',
            'skills.*.weight' => 'required|integer|between:1,5',
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
            'language.required' => __('generated_validation.language_required'),
            'language.integer' => __('generated_validation.language_integer'),

            'skills.*.skill.required' => __('generated_validation.skills_skill_required'),
            'skills.*.skill.string' => __('generated_validation.skills_skill_string'),
            'skills.*.skill.max' => __('generated_validation.skills_skill_max'),

            'skills.*.level.required' => __('generated_validation.skills_level_required'),
            'skills.*.level.string' => __('generated_validation.skills_level_string'),
            'skills.*.level.max' => __('generated_validation.skills_level_max'),

            'skills.*.weight.required' => __('generated_validation.skills_weight_required'),
            'skills.*.weight.integer' => __('generated_validation.skills_weight_integer'),
            'skills.*.weight.between' => __('generated_validation.skills_weight_between'),
        ];
    }
}
