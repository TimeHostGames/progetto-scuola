<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function view(Request $request) {
        return view("home");
    }

    public function openGate(Request $request) {
        $host = '172.20.10.5';
        $port = 6000;
        $message = 's_opengate';
        
        // $log = new Log();
        // $log->name = "Ha aperto il cancello";
        // $log->user_id = $user->id;
        // $log->save();
        
        return json_encode(["stato" => self::sendSocketMessage($host, $port, $message)]);
    }

    private function sendSocketMessage($host, $port, $message) {
        $socket = fsockopen($host, $port, $errno, $errstr, 10);
        if (!$socket) {
            echo "Errore durante l'apertura del socket: $errstr ($errno)\n";
            return false;
        }
        fwrite($socket, $message);
        fclose($socket);
        return true;
    }
}
