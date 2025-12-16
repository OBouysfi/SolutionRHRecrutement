<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientSiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'client_id' => 'required',
            'site_id' => 'nullable|array',
            'city_id' => 'nullable|array',
            'city_id.*' => 'nullable',
            'address' => 'nullable|array',
            'address.*' => 'nullable|string|max:255',
            'site_name' => 'nullable|array',
            'site_name.*' => 'nullable|string|max:255',
            'phone' => 'nullable|array',
            'phone.*' => 'nullable|string|max:255',
            'email' => 'nullable|array',
            'email.*' => 'nullable|string|email|max:255',
            'responsable_name' => 'nullable|array',
            'responsable_name.*' => 'nullable|string|max:255',
//            'description' => 'nullable|array',
//            'description.*' => 'nullable|string',
//            'work_days_nbr' => 'nullable|array',
//            'work_days_nbr.*' => 'nullable|integer',
//            'work_day_period' => 'nullable|array',
//            'work_day_period.*' => 'nullable',
//            'observation' => 'nullable|array',
//            'observation.*' => 'nullable|string',
//            'is_active' => 'nullable|array',
//            'is_active.*' => 'nullable|boolean',
        ];
    }
}
