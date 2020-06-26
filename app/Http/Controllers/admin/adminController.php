<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\User;
use App\Pengumuman;
use App\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function dashboard()
    {
        $pengumuman = Pengumuman::all();
        $countMurid = User::count();
        $countKelas = Kelas::count();
        $countRuang = Ruang::count();
        $user = Auth::user();
        return view('admin.dashboard', compact('user', 'countKelas', 'countRuang', 'countMurid', 'pengumuman'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
