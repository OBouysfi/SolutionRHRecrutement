<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        $supported = ['en', 'fr', 'ar', 'zh', 'pt', 'es'];
        if (in_array($locale, $supported)) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
            $user = auth()->user();
            if ($user) {
                $user->lang = $locale;
                $user->save();
            }
        }
        return redirect()->back();
    }
}