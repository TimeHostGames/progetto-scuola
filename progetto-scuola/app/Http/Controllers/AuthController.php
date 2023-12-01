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
            return view('login');
        
        return redirect('/');
    }

    public function loginUser(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if(!Auth::attempt($credentials))
            return back()->with('error', 'Credenziali di accesso non corrette');

        $user = Auth::user();

        // dd($user);
        // if(!$user->email_verified_at && !$user->magic_link) {
        //     $magic_link = (string) Str::uuid();

        //     $user->magic_link = $magic_link;

        //     $user->save();

        //     $link_conferma = "https://dashboard.andreacarlizza.com/conferma/registrazione/" . $magic_link;
        //     // SendInBlue::inviaMail($user->email,'conferma-registrazione',array('link' => $link_conferma));

        //     Auth::logout();

        //     return redirect()->route("login");
        // }

        // if(!$user->email_verified_at) {
        //     Auth::logout();

        //     return redirect()->route("login");
        // }

        return redirect('/');
    }
}
