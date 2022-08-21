<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Image;
use App\Models\Gallery;
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
        $galleries = Gallery::all();
        return view('auth.register', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageuploaded = $request->file('image');
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $imagepath = $request->image->storeAs('public/images', $imagename);

            $gallery = new Gallery();
            $gallery->image = $imagename;
            $gallery->save();
        }

        if ($request->hasFile('image')) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => "images/" . $imagename,
            ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        //auth()->login($user);
        //return redirect('/');
        return redirect()->route('login');
    }
}
