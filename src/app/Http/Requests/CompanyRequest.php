<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompanyRequest extends FormRequest
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
            'path_logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'city_id' => 'nullable|integer|exists:cities,id',
        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}