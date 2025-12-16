<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RecruitmentCostRequest extends FormRequest
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
        return [
            'platform' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'amount' => 'nullable|numeric|min:0',
            'invoice' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10 Mo max
            'logo' => 'nullable|image|max:5120', // 5 Mo pour les images            'ecart' => 'nullable|numeric',
            'devise' => 'nullable|string|',

            
        ];
    }

    public function messages()
    {
        return [
            'platform.required' => __('generated_validation.platform_required'),
            'platform.string' => __('generated_validation.platform_string'),
            'platform.max' => __('generated_validation.platform_max'),

            'budget.required' => __('generated_validation.budget_required'),
            'budget.numeric' => __('generated_validation.budget_numeric'),
            'budget.min' => __('generated_validation.budget_min'),

            'amount.required' => __('generated_validation.amount_required'),
            'amount.numeric' => __('generated_validation.amount_numeric'),
            'amount.min' => __('generated_validation.amount_min'),

            'invoice.file' => __('generated_validation.invoice_file'),
            'invoice.mimes' => __('generated_validation.invoice_mimes'),
            'invoice.max' => __('generated_validation.invoice_max'),

            'logo.image' => __('generated_validation.logo_image'),
            'logo.max' => __('generated_validation.logo_max'),

            'devise.required' => __('generated_validation.devise_required'),
            'devise.string' => __('generated_validation.devise_string'),
            'devise.in' => __('generated_validation.devise_in'),
        ];
    }
}
