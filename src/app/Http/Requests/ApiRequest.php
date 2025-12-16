<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'system_name' => 'required|string',
            'type' => 'required|string',
            'connection_port' => 'nullable|string',
            'protocol' => 'required|string',
            'access_identifier' => 'required|string',
            'access_password' => 'required|string',
            'api_token' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
