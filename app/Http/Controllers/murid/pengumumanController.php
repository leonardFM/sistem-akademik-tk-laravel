<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengumumanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pengumuman = Pengumuman::all();
        return view('murid.pengumuman.index', compact('user', 'pengumuman'));
    }

    public function detail($id)
    {
        $user = Auth::user();
        $data = Pengumuman::findorfail($id);
        return view('murid.pengumuman.detail', compact('data', 'user'));
    }
}
