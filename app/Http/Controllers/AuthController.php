<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = Auth::user();

        if(!$user)
            return view('accedi');
        
        return redirect('/');
    }

    public function loginUser(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        // dd($credentials);

        if(!Auth::attempt($credentials))
            // dd("ciaoss");
            return back()->with('error', 'Credenziali di accesso non corrette');

        $user = Auth::user();

        Auth::login($user);

        dd($user);

        return redirect('/');
    }
}
