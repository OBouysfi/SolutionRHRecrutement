<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientFinanceRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'rc' => 'nullable|string|max:255',
            'unique_identifier' => 'nullable|string|max:255',
            'ice_siret' => 'nullable|string|max:255',
            'taxe' => 'nullable|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'country_id' => 'nullable|exists:countries,id',

        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}
