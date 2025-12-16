<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OTPAPIController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $otp = random_int(1000, 9999);

        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(3),
        ]);

        Mail::raw("Votre code OTP : {$otp}", function ($message) use ($user) {
            $message->to($user->email)->subject('Code OTP');
        });

        return response()->json(['message' => 'OTP envoyé avec succès.']);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp_code' => 'required|digits:4',
        ]);

        // Alternative validation if using individual fields
        // $otpCode = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
        // $request->merge(['otp_code' => $otpCode]);
        // $request->validate(['otp_code' => 'required|digits:4']);

        $user = User::where('email', $request->email)->first();

        if (
            $user->otp_code === $request->otp_code &&
            $user->otp_expires_at->greaterThan(Carbon::now())
        ) {
            $user->update(['otp_code' => null, 'otp_expires_at' => null]);

            return response()->json(['message' => 'OTP vérifié avec succès.']);
        }

        return response()->json(['message' => 'OTP invalide ou expiré.'], 400);
    }
}

