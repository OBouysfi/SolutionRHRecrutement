<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $maxMb = setting('security.max_size_mb', 20);
        $allowed = setting('security.allowed_extensions', 'pdf,docx,xlsx');
        $mimes = implode(',', array_map('trim', explode(',', $allowed)));

        return [
            'document' => "required|file|mimes:$mimes|max:" . ($maxMb * 1024),
        ];
    }

    public function messages(): array
    {
        return [
            'document.required' => __('generated_validation.document_required'),
            'document.mimes' => __('generated_validation.document_mimes', [
                'extensions' => setting('security.allowed_extensions')
            ]),
            'document.max' => __('generated_validation.document_max', [
                'max' => setting('security.max_size_mb')
            ]),
        ];
    }
}
