<?php

namespace App\Http\Requests\Evaluator;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
            'evaluator_id' => 'required|exists:evaluators,id',
            'evaluation_type_id' => 'required|exists:evaluation_types,id',
            'profile_id' => 'required|exists:profiles,id',
            'mark' => 'required|numeric',
            'evaluation' => 'required|string|max:2000',
        ];
    }

    public function messages()
    {
        return [
          

        ];
    }
}
