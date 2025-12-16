<?php
namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ExcperienceRequest extends FormRequest
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
            'logo' => 'nullable|file|image|max:10048',
            'company' => 'required|string|max:255',
            'profession_id' => 'required|exists:professions,id',
            'started_at' => 'required|date',
            'finished_at' => 'required_unless:current_job,true|date|after_or_equal:started_at',
            'current_job' => 'nullable|boolean',
            'project_name' => 'required|string|max:255',
            'skills_tech' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
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
            'logo.file' => __('generated_validation.logo_file'),
            'logo.image' => __('generated_validation.logo_image'),
            'logo.max' => __('generated_validation.logo_max'),
            
            'company.required' => __('generated_validation.company_required'),
            'company.string' => __('generated_validation.company_string'),
            'company.max' => __('generated_validation.company_max'),
            
            'profession_id.required' => __('generated_validation.profession_id_required'),
            'profession_id.exists' => __('generated_validation.profession_id_exists'),
            
            'started_at.required' => __('generated_validation.started_at_required'),
            'started_at.date' => __('generated_validation.started_at_date'),
            
            'finished_at.date' => __('generated_validation.finished_at_date'),
            'finished_at.after_or_equal' => __('generated_validation.finished_at_after_or_equal'),
            
            'project_name.required' => __('generated_validation.project_name_required'),
            'project_name.string' => __('generated_validation.project_name_string'),
            'project_name.max' => __('generated_validation.project_name_max'),
            
            'skills_tech.required' => __('generated_validation.skills_tech_required'),
            'skills_tech.string' => __('generated_validation.skills_tech_string'),
            'skills_tech.max' => __('generated_validation.skills_tech_max'),
            
            'date.required' => __('generated_validation.date_required'),
            'date.date' => __('generated_validation.date_date'),
            
            'description.string' => __('generated_validation.description_string'),
        ];
    }
}