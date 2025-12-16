<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    
    protected $emailTemplate;

    public function __construct(EmailTemplate $emailTemplate)
    {
        $this->emailTemplate = $emailTemplate;
        $this->middleware('permission:emails-access')->only(['index']);
    }
    // Afficher la liste des modèles d'e-mails
    public function index()
    {
        $emailTemplates = EmailTemplate::get();
        return view('setting.emailParams', compact('emailTemplates'));
    }

    public function show($id)
    {
        $template = EmailTemplate::findOrFail($id);
        return view('email_templates.show', compact('template'));
    }

    public function toggle(Request $request, $id)
    {
        $template = EmailTemplate::findOrFail($id);
        $template->is_active = !$template->is_active;
        $template->save();

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès.',
        ]);
    }
}
