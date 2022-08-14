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
            session()->put('lang', $lang);
            app()->setLocale($request->query('lang', session('lang', 'en')));
        }
        
        return $next($request);
    }
}
