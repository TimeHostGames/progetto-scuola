<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $users = User::get();

        return view('utenti', compact("users"));
    }

    public function create(Request $request) {
        $user = new User();

        $user->uuid = Str::uuid();
        $user->name = $request->nome;
        $user->cognome = $request->cognome;
        $user->email = $request->email;
        $user->rfid_token = $request->rfid;
        $user->password = Hash::make($request->password);

        $user->save();
        
        return response()->json([
            'status' => "success"
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
