<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterStoreRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterStoreRequest $request)
    {
        if(request()->has('image')){
            $imageuploaded = request()->file('image');
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $imagepath = public_path('/upload/image/');
            $imageuploaded->move($imagepath, $imagename);
       }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => '/upload/image/' . $imagename,
        ]);

        //auth()->attempt($request->only('email', 'password'));
        
        return redirect()->route('login');
    }
}
