<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompetencePersonnelleRequest extends FormRequest
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
            
            'label' => 'required|string|max:255',
            'skill_type_id' => 'nullable|exists:skill_types,id',

        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}