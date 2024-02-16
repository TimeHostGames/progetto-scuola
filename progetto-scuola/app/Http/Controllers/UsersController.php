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
        $user = Auth::user();
        $users = User::get();

        // $users = $users->toArray();

        // foreach($users as $i => $u) {
        //     echo "<pre>";
        //     print_r($u[$i]);
        // }
        // exit;

        return view('utenti', compact("user"));
    }
}
