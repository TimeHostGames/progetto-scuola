<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Log;

class LogsController extends Controller
{
    public function index(Request $request) {
        $logs = Log::orderBy("created_at", "DESC")->get();

        return view('logs', compact("logs"));
    }

    public function delete(){
        Log::truncate();

        return redirect()->goBack();
    }
}
