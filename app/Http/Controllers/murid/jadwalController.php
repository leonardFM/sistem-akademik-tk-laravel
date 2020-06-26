<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $jadwal = Jadwal::where('ruang_id', $user->ruang->id)->get();
        return view('murid.jadwal.index', compact('jadwal', 'user'));
    }
}
