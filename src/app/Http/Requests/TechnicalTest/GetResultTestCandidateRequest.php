<?php

namespace App\Http\Requests\TechnicalTest;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetResultTestCandidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'id' => [
                'bail',
                'required',
            ],
            'tst_frm_id' => [
                'bail',
                'required',
            ],
            'ema' => [
                'bail',
                'required',
            ],


        ];
    }

    public function attributes(): array
    {
        return [

        ];
    }
}
