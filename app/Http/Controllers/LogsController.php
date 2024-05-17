<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Log;

class LogsController extends Controller
{
    public function index(Request $request) {
        $logs = Log::get();

        return view('logs', compact("logs"));
    }
}
