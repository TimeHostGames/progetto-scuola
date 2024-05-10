<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class DebugController extends Controller
{
    public function password(Request $request) {
        $password = Hash::make($request->pass);

        dd($password);
    }
}
