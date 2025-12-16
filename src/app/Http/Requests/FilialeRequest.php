<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FilialeRequest extends FormRequest
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
            'city_id' => 'required|integer|exists:cities,id'
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => __('generated_validation.city_id_required'),
            'city_id.integer' => __('generated_validation.city_id_integer'),
            'city_id.exists' => __('generated_validation.city_id_exists'),

            'name.required' => __('generated_validation.name_required'),
            'name.string' => __('generated_validation.name_string'),
            'name.max' => __('generated_validation.name_max'),
        ];
    }
}
