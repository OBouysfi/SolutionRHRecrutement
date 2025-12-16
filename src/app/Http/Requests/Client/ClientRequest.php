<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'activity_area_id' => 'nullable',
            'path_logo' => 'nullable|image|mimes:jpeg,png,jpg', 
            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'juridical_form' => 'nullable|string|max:255',
            'tax_regime' => 'nullable|string|max:255',
            'workforce' => 'nullable|string|max:255',
            'activity' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:255',
            'date_creation' => 'nullable|date'
        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}
