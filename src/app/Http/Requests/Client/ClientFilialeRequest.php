<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientFilialeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            //
            'client_id' => 'required|exists:clients,id',
            'filiale_id'=> 'nullable|array',
            'name' => 'nullable|array',
            'name.*' => 'nullable|string|max:255',
            'logo' => 'nullable|array', 
            'logo.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'city_id' => 'nullable|array',
            'city_id.*' => 'nullable|exists:cities,id',
            'juridical_form' => 'nullable|array',
            'juridical_form.*' => 'nullable|string|max:255',
            'tax_regime' => 'nullable|',
            'tax_regime.*' => 'nullable|string|max:255',
            'workforce' => 'nullable|array',
            'workforce.*' => 'nullable|string|max:255',
            'activity' => 'nullable|array',
            'activity.*' => 'nullable|string|max:255',
            'adresse' => 'nullable|array',
            'adresse.*' => 'nullable|string|max:255',
            'code_postal' => 'nullable|array',
            'code_postal.*' => 'nullable|string|max:255',
        ];
    }
}
