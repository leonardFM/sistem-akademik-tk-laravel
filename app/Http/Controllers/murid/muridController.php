<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class muridController extends Controller
{
    public function dashboard()
    {
        $pengumuman = Pengumuman::all();
        $user = Auth::user();
        return view('murid.dashboard', compact('user', 'pengumuman'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
