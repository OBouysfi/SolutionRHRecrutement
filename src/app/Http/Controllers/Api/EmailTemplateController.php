<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    // Récupérer tous les modèles d'e-mails
    public function index()
    {
        $emailTemplates = EmailTemplate::where('is_active', true)->get();
        return response()->json($emailTemplates);
    }

    // Récupérer un modèle d'e-mail spécifique
    public function show($id)
    {
        $template = EmailTemplate::findOrFail($id);
        return response()->json($template);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            
        ]);

        EmailTemplate::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'created_at' => now(),   

        ]);

        return redirect()->back()->with('success', 'Template ajouté avec succès.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $emailTemplate = EmailTemplate::findOrFail($id);
    
        $emailTemplate->update([
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'updated_at' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Template mis à jour avec succès.');
    }
    public function destroy($id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        $emailTemplate->delete();
    
        return redirect()->back()->with('success', 'Template supprimé avec succès.');
    }

}
