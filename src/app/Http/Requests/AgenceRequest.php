<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AgenceRequest extends FormRequest
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
            'filiale_id' => 'required|integer|exists:filiales,id'
        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}