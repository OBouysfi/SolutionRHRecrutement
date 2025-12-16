<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\RecommandationRequest;
use App\Models\TemporaryLink;
use App\Models\Profession;
use App\Models\Profile; 
use App\Models\Recommandation;

class RecommendationFormController extends Controller
{
    public function showForm($token)
    {
        // Find the temporary link by token and check if it hasn't expired
        $temporaryLink = TemporaryLink::where('token', $token)
            // ->where('expires_at', '>', now())
            ->first();

        if (! $temporaryLink) {
            abort(404, 'Invalid or expired link.');
        }

        // Get the profile using the profile_id from the temporary link
        $profile = Profile::findOrFail($temporaryLink->profile_id);
        $posts = Profession::all();

        // Pass profile details to the view
        return view('profile.inc.formRecommandations', [
            'profile_id' => $profile->id,
            'email' => $temporaryLink->email,
            'posts' => $posts,
            'profile' => $profile,
            'token' => $token,

        ]);
    }

    public function storeRecommandationPublic(RecommandationRequest $request, $token)
    {
        $temporaryLink = TemporaryLink::where('token', $token)
            // ->where('expires_at', '>', now())
            ->first();

        if (! $temporaryLink) {
            return back()->withErrors(['token' => 'Le lien est expiré ou invalide.']);
        }

        $profile_id = $temporaryLink->profile_id;

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profiles/recommandation_photos', 'public');
        }

        $recommandation = Recommandation::create([
            'profile_id' => $profile_id,
            'photo' => $photoPath,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'poste' => $request->poste,
            'message' => $request->message,
            'company' => $request->company, 
        ]);

        // Supprimer le lien temporaire après une seule utilisation
         $temporaryLink->delete();

        return back()->with('success', 'Merci pour votre recommandation !');
    }

}
