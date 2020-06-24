<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function utama()
    {
        return view('frontend.utama');
    }

    public function login()
    {
        return view('frontend.login');
    }
}
