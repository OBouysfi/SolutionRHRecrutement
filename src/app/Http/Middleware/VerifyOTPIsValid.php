<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\SettingService;
use Illuminate\Support\Facades\Auth;

class VerifyOTPIsValid
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $settings = $this->settingService->getSecuritySettings();
        if ($settings['two_factor_auth']) {
            if (Auth::user()->otp_code != null && Auth::user()->otp_expires_at->greaterThan(now())) {
                return redirect()->route('otp-form');
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}
