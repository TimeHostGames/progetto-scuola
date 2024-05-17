<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Log;

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

        $log = new Log();
        $log->name = "L'utente ha effettuato l'accesso";
        $log->user_id = $user->id;
        $log->save();

        // dd($user);

        return redirect('/');
    }
}
