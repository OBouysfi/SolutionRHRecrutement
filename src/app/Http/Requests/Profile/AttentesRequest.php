<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class AttentesRequest extends FormRequest
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
            'profession_id' => 'required',
            'contract_type' => 'required|string|max:255',
            'activity_area_id' => 'nullable',
            'company_size' => 'nullable|string|max:255',
            'min_expected_salary' => 'required|min:0|max:99999999.99',
            'max_expected_salary' => [
                'required',
                'min:0',
                'max:99999999.99',
                'gte:min_expected_salary',
            ],
            'has_driving_license' => 'required',
            'mobility.*.is_active' => 'nullable',
            'mobility.*.weight' => 'nullable|integer|min:0|max:100',
            'work_mode.*.is_active' => 'nullable',
            'work_mode.*.weight' => 'nullable|integer|min:0|max:100',
            'work_time.*.is_active' => 'nullable',
            'work_time.*.weight' => 'nullable|integer|min:0|max:100',
            'availability.type' => 'nullable|in:immediate,notice',
            'availability.notice_duration' => 'required_if:availability.type,notice|integer|min:1|max:12',
            'license_types.*' => 'required_with:has_driving_license|nullable|string|max:50',
        ];
    }

    /**
     * Custom error messages for validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'profession_id.required' => __('generated_validation.profession_id_required'),
            'contract_type.required' => __('generated_validation.contract_type_required'),
            'contract_type.string' => __('generated_validation.contract_type_string'),
            'contract_type.max' => __('generated_validation.contract_type_max'),

            'activity_area_id.required' => __('generated_validation.activity_area_id_required'),

            'company_size.required' => __('generated_validation.company_size_required'),
            'company_size.string' => __('generated_validation.company_size_string'),
            'company_size.max' => __('generated_validation.company_size_max'),

            'has_driving_license.required' => __('generated_validation.has_driving_license_required'),

            'min_expected_salary.required' => __('generated_validation.min_expected_salary_required'),
            'min_expected_salary.min' => __('generated_validation.min_expected_salary_min'),
            'min_expected_salary.max' => __('generated_validation.min_expected_salary_max'),

            'max_expected_salary.required' => __('generated_validation.max_expected_salary_required'),
            'max_expected_salary.min' => __('generated_validation.max_expected_salary_min'),
            'max_expected_salary.max' => __('generated_validation.max_expected_salary_max'),
            'max_expected_salary.gte' => __('generated_validation.max_expected_salary_gte'),

            'license_types.required' => __('generated_validation.license_types_required'),
            'license_types.array' => __('generated_validation.license_types_array'),
            'license_types.*.string' => __('generated_validation.license_types_string'),
            'license_types.*.max' => __('generated_validation.license_types_max'),

            'mobility.*.weight.integer' => __('generated_validation.mobility_weight_integer'),
            'mobility.*.weight.min' => __('generated_validation.mobility_weight_min'),
            'mobility.*.weight.max' => __('generated_validation.mobility_weight_max'),

            'work_mode.*.weight.integer' => __('generated_validation.work_mode_weight_integer'),
            'work_mode.*.weight.min' => __('generated_validation.work_mode_weight_min'),
            'work_mode.*.weight.max' => __('generated_validation.work_mode_weight_max'),

            'work_time.*.weight.integer' => __('generated_validation.work_time_weight_integer'),
            'work_time.*.weight.min' => __('generated_validation.work_time_weight_min'),
            'work_time.*.weight.max' => __('generated_validation.work_time_weight_max'),

            'availability.type.required' => __('generated_validation.availability_type_required'),
            'availability.type.in' => __('generated_validation.availability_type_in'),
            'availability.notice_duration.required_if' => __('generated_validation.availability_notice_duration_required_if'),
            'availability.notice_duration.integer' => __('generated_validation.availability_notice_duration_integer'),
            'availability.notice_duration.min' => __('generated_validation.availability_notice_duration_min'),
            'availability.notice_duration.max' => __('generated_validation.availability_notice_duration_max'),
        ];
    }
}
