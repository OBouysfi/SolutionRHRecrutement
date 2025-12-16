<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\TemporaryLink;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecommendationLinkMail;

class RecommendationLinkController extends Controller
{
    public function sendRecommendationLink(Request $request)
    {
        
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'email' => 'required|email',
            'contactName' => 'required|string',
        ]);

       
        $profile = Profile::findOrFail($request->profile_id);
        $nomDuContact = $request->input('contactName');

        // Generate a random unique token
        $token = Str::uuid();

        // Store the temporary link with profile_id, email, token and expiration time
        $temporaryLink = TemporaryLink::create([
            'profile_id' => $profile->id,
            'email' => $request->email,
            'token' => $token,
            'expires_at' => now()->addHours(168)->addMinutes(30), 
        ]);

        // Generate the full URL containing the token
        $url = route('recommendation.form', ['token' => $token]);

        
         Mail::to($request->email)->send(new RecommendationLinkMail($profile, $url ,$nomDuContact));

        // Return a JSON response with success message and the generated link
        return response()->json([
            'message' => __('generated.Le lien temporaire a été généré avec succès.'),
            'link' => $url,
        ]);
    }
}
