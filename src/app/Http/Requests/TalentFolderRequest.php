<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TalentFolderRequest extends FormRequest
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
            'parent_id' => 'nullable|exists:talent_folders,id',
            
        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}