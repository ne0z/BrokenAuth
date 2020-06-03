<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function success_page(Request $request)
    {
        session_start();

        if (isset($_SESSION['logged_in'])) {
            return "You are successfully logged in. Click <a href='/logout'>here</a> to logout.";
        }
        return redirect('/login?id='.uniqid());
    }
}
