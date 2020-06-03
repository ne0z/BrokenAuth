<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function verify(Request $request)
    {
        session_start();
        $username = $request->input('username');
        $password = $request->input('password');

        if (!isset($_SESSION['logged_in'])){
            $user = User::where('username', '=', $username)
                ->where('password', '=', $password)
                ->first();
            if (!$user) {
                return redirect('/login?id='.session_id().'&error=1');
            }
            $_SESSION['logged_in'] = true;
        }
        return redirect('/panel');
    }
}
