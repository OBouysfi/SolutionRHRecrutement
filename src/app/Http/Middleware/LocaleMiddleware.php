<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale');

        if (!$locale && auth()->check()) {
            $locale = auth()->user()->lang;
        }

        if (!$locale) {
            $locale = config('app.locale'); // default locale
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
