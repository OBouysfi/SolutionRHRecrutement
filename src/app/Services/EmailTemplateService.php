<?php

namespace App\Services;

use App\Models\EmailTemplate;

class EmailTemplateService
{
    public function getActiveTemplates()
    {
        return EmailTemplate::where('is_active', true)->get();
    }

    public function getTemplateById($id)
    {
        return EmailTemplate::findOrFail($id);
    }
}
