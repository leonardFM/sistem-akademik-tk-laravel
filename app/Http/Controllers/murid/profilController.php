<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }
}
