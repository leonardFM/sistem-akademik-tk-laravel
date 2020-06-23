<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function dashboard()
    {
        $count = User::count();
        $user = Auth::user();
        return view('admin.dashboard', compact('user', 'count'));
    }
}
