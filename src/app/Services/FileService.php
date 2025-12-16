<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * Upload a file and delete the old one if exists.
     *
     * @param object $file The uploaded file.
     * @param string $directory The storage directory.
     * @param string|null $existingPath The existing file path.
     * @return string The new file path.
     */
    public function uploadFile($file, $directory, $existingPath = null)
    {
        // Delete old file if exists
        if ($existingPath) {
            Storage::disk('public')->delete($existingPath);
        }

        // Store the new file
        return $file->store($directory, 'public');
    }
}
