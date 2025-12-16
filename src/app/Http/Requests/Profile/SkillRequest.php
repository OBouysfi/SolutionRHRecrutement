<?php
namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'technical_skills' => 'required|array',
            'technical_skills.*.category' => 'required|string|max:250',
            'technical_skills.*.skill' => 'required|string|max:500',
            'technical_skills.*.level' => 'required|integer',
            'technical_skills.*.weight' => 'required|integer|between:1,5',
            'personal_skills' => 'required|array',
            'personal_skills.*.category' => 'required|string|max:250',
            'personal_skills.*.skill' => 'required|string|max:500',
            'personal_skills.*.level' => 'required|integer',
            'personal_skills.*.weight' => 'required|integer|between:1,5',
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
            // Technical skills
            'technical_skills.required' => __('generated_validation.technical_skills_required'),
            'technical_skills.array' => __('generated_validation.technical_skills_array'),
            'technical_skills.*.category.required' => __('generated_validation.technical_skills_category_required'),
            'technical_skills.*.category.string' => __('generated_validation.technical_skills_category_string'),
            'technical_skills.*.category.max' => __('generated_validation.technical_skills_category_max'),
            'technical_skills.*.skill.required' => __('generated_validation.technical_skills_skill_required'),
            'technical_skills.*.skill.string' => __('generated_validation.technical_skills_skill_string'),
            'technical_skills.*.skill.max' => __('generated_validation.technical_skills_skill_max'),
            'technical_skills.*.level.required' => __('generated_validation.technical_skills_level_required'),
            'technical_skills.*.level.integer' => __('generated_validation.technical_skills_level_integer'),
            'technical_skills.*.weight.required' => __('generated_validation.technical_skills_weight_required'),
            'technical_skills.*.weight.integer' => __('generated_validation.technical_skills_weight_integer'),
            'technical_skills.*.weight.between' => __('generated_validation.technical_skills_weight_between'),

            // Personal skills
            'personal_skills.required' => __('generated_validation.personal_skills_required'),
            'personal_skills.array' => __('generated_validation.personal_skills_array'),
            'personal_skills.*.category.required' => __('generated_validation.personal_skills_category_required'),
            'personal_skills.*.category.string' => __('generated_validation.personal_skills_category_string'),
            'personal_skills.*.category.max' => __('generated_validation.personal_skills_category_max'),
            'personal_skills.*.skill.required' => __('generated_validation.personal_skills_skill_required'),
            'personal_skills.*.skill.string' => __('generated_validation.personal_skills_skill_string'),
            'personal_skills.*.skill.max' => __('generated_validation.personal_skills_skill_max'),
            'personal_skills.*.level.required' => __('generated_validation.personal_skills_level_required'),
            'personal_skills.*.level.integer' => __('generated_validation.personal_skills_level_integer'),
            'personal_skills.*.weight.required' => __('generated_validation.personal_skills_weight_required'),
            'personal_skills.*.weight.integer' => __('generated_validation.personal_skills_weight_integer'),
            'personal_skills.*.weight.between' => __('generated_validation.personal_skills_weight_between'),
        ];
    }
}
