<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => __('generated_validation.first_name_required'),
            'first_name.string' => __('generated_validation.first_name_string'),
            'first_name.max' => __('generated_validation.first_name_max'),

            'last_name.required' => __('generated_validation.last_name_required'),
            'last_name.string' => __('generated_validation.last_name_string'),
            'last_name.max' => __('generated_validation.last_name_max'),

            'subject.required' => __('generated_validation.subject_required'),
            'subject.string' => __('generated_validation.subject_string'),
            'subject.max' => __('generated_validation.subject_max'),

            'email.required' => __('generated_validation.email_required'),
            'email.email' => __('generated_validation.email_email'),
            'email.max' => __('generated_validation.email_max'),

            'message.required' => __('generated_validation.message_required'),
            'message.string' => __('generated_validation.message_string'),
        ];
    }
}
