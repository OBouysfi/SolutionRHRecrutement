<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;


class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'nullable|boolean',
            'roles' => 'nullable|integer|max:255',
            'agency_id' => 'nullable|exists:agencies,id',
            'user_image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg',
            'otp_code' => 'nullable|integer|digits:6',
            'otp_expires_at' => 'nullable|date',
            'client_id' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('generated_validation.name_required'),
            'name.string' => __('generated_validation.name_string'),
            'name.max' => __('generated_validation.name_max'),

            'email.required' => __('generated_validation.email_required'),
            'email.email' => __('generated_validation.email_email'),
            'email.max' => __('generated_validation.email_max'),
            'email.unique' => __('generated_validation.email_unique'),

            'password.min' => __('generated_validation.password_min'),
            'password.confirmed' => __('generated_validation.password_confirmed'),

            'otp_code.integer' => __('generated_validation.otp_code_integer'),
            'otp_code.digits' => __('generated_validation.otp_code_digits'),

            'otp_expires_at.date' => __('generated_validation.otp_expires_at_date'),

            'agency_id.exists' => __('generated_validation.agency_id_exists'),

            'user_image.image' => __('generated_validation.user_image_image'),
            'user_image.mimes' => __('generated_validation.user_image_mimes'),
            'user_image.max' => __('generated_validation.user_image_max'),
        ];
    }
    public function failedValidation(Validator $validator)
    {
        Log::error("Erreur de validation lors de la création de l'utilisateur :", [
            'errors' => $validator->errors()->all(),
            'données_soumises' => $this->all()
        ]);

        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }



}
