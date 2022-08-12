<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //dd(auth()->user()->posts);
        return view('dashboard');
    }
}
