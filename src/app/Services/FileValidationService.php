<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileValidationService
{
    public function validate(Request $request, string $field = 'document'): void
    {
        $maxMb = setting('security.max_size_mb', 20);
        $mimes = setting('security.allowed_extensions', 'pdf,docx,xlsx');

        $rules = [
            $field => 'required|file|mimes:' . $mimes . '|max:' . ($maxMb * 1024),
        ];

        Validator::make($request->all(), $rules)->validate();
    }
}
