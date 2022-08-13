<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($lang)
    {
        //session()->put('lang', $lang);
        //return back();
        session(['lang' => $lang]);

        return back();
    }
}
