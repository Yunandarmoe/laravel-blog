<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = ['en', 'my'];
        $lang = $request->query('lang', session('lang', 'en'));
        if(in_array($lang, $language)) {
            session(['lang' => $lang]);
            app()->setLocale($request->query('lang', session('lang', 'en')));
        }
//        $locale = $request->query('lang');
//        if ($locale && in_array($locale, config('app.available_locales'))) {
//            session(['lang' => $locale]);
//            app()->setLocale($locale);
//        }
//
//        $locale = session('lang');
//        if ($locale && in_array($locale, config('app.available_locales'))) {
//            app()->setLocale($locale);
//        }
        return $next($request);
    }
}
