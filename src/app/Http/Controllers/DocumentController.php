<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
    use App\Services\FileValidationService;

class DocumentController extends Controller
{
    public function upload(Request $request, FileValidationService $service)
    {
        $service->validate($request, 'fichier');

        $file = $request->file('fichier');
        $path = $file->store('uploads', 'public');

        return response()->json(['path' => $path]);
    }

}
