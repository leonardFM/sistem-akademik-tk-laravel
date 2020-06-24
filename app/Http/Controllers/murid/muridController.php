<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class muridController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('murid.dashboard', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
