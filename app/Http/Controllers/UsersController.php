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

    public function modaleModifica(Request $request) {
        $user = User::whereId($request->id)->first();

        if(!$user)
            return response()->json([
                'status' => "error",
                'messagge' => "L'utente non esiste",
            ]);

        $html = view('modals.utente',compact('user'))->render();

        return response()->json([
            'status' => "success",
            'result' => $html
        ]);
    }

    public function modifica(Request $request) {
        $id = $request->id;
        $nome = $request->nome;
        $cognome = $request->cognome;
        $email = $request->email;
        $rfid = $request->rfid;

        // dd($nome);

        $user = User::whereId($id)->first();
        // $user = User::findByUuid($request->uuid);

        // dd($user);
        $user->name = $nome;
        $user->cognome = $cognome;
        $user->email = $email;
        $user->rfid_token = $rfid;

        $user->save();

        return response()->json([
            'status' => "success"
        ]);
    }
}
