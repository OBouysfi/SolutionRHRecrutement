<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


// use Socialite;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    // Les tableaux des providers autorisés
    protected $providers = ["google"];



    public function redirect(Request $request)
    {

        $scopes = [
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile',
            'openid',
            'https://www.googleapis.com/auth/calendar',
            'https://www.googleapis.com/auth/calendar.settings.readonly',
        ];

        $socialiteProvider = Socialite::driver('google');
        return $socialiteProvider->scopes($scopes)->with([
            'access_type' => 'offline',
            'approval_prompt' => 'force',
            'include_granted_scopes' => 'false',
        ])->stateless()->redirect();
    }


    // Callback du provider
    public function callbacks(Request $request)
    {


        Log::info('#Start Callback');
        $socialiteProvider = Socialite::driver('google');
        $user = $socialiteProvider->stateless()->user();
        $user_id = auth()->user()->id;
        $token = $user->token;
        $refresh_token = $user->refreshToken;

        try {

            $socialite = DB::table('socialite')->where('user_id', $user_id)->first();
            if ($socialite == null) {

                DB::table('socialite')->insert([

                    'user_id' => $user_id,
                    'token_google' => $token,
                    'refreshToken_google' => $refresh_token,
                    'status_google' => 1,

                ]);
            } else {
                DB::table('socialite')->where('user_id', $user_id)->update([

                    'user_id' => $user_id,
                    'token_google' => $token,
                    'refreshToken_google' => $refresh_token,
                    'status_google' => 1,
                ]);
            }
            Log::info($assign);
        } catch (\Throwable $th) {
            Log::info("#Error Create User from Google login " . $th->getMessage());
        }

        return redirect()->route('get.event.listing');
    }

    public function logoutGoogle()
    {

        $user_id = auth()->user()->id;

        DB::table('socialite')->where('user_id', $user_id)->update([
            'status_google' => 0,
        ]);

        return redirect()->route('get.event.listing');
    }

    public function redirectOutlook(Request $request)
    {

        return Socialite::driver('microsoft')->redirect();
        // return $socialite->with([
        //     'access_type' => 'offline',
        //     'approval_prompt' => 'force',
        //     'include_granted_scopes' => 'false',
        // ])->stateless()->redirect();

    }

    public function callbacksOutlook(Request $request)
    {


        Log::info('#Start Callback');
        $socialiteProvider = Socialite::driver('microsoft');
        $user = $socialiteProvider->stateless()->user();
        dd($user);
        // $user_id = auth()->user()->id;
        // $token = $user->token;
        // $refresh_token = $user->refreshToken;

        // try {

        //     $socialite = DB::table('socialite')->where('user_id', $user_id)->first();
        //     if( $socialite == null)
        //     {

        //         DB::table('socialite')->insert([

        //         'user_id' => $user_id,
        //         'token_google' => $token,
        //         'refreshToken_google' => $refresh_token,
        //         'status_google' => 1,

        //         ]);
        //     } else 
        //     {
        //         DB::table('socialite')->where('user_id', $user_id)->update([

        //         'user_id' => $user_id,
        //         'token_google' => $token,
        //         'refreshToken_google' => $refresh_token,
        //         'status_google' => 1,
        //         ]);
        //     }
        //     Log::info($assign);

        // } catch (\Throwable $th) {
        //     Log::info("#Error Create User from Google login " . $th->getMessage());
        // }

        // return redirect()->route('get.event.listing');


    }
}
