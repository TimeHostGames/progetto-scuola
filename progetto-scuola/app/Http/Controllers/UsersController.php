<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        $nome = $request->nome;
        $cognome = $request->cognome;
        $email = $request->email;
        
    }
}
