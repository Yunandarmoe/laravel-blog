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
        $lang = $request->query('lang');
        //if(in_array($lang, config('app.available_locales'))) {
        //    session()->put('lang', $lang);
        //    app()->setLocale($request->query('lang', session('lang', 'en')));
        //}
        if ($lang && in_array($lang, config('app.available_locales'))) {
            session(['lang' => $lang]);
            app()->setLocale($lang);
        }

        $lang = session('lang');
        if ($lang && in_array($lang, config('app.available_locales'))) {
            app()->setLocale($lang);
        }
        
        return $next($request);
    }
}
