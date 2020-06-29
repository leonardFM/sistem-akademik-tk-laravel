<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class gantiPasswordController extends Controller
{
    public function gantiPassword()
    {
        $user = Auth::user();
        return view('murid.password.index', compact('user'));
    }

    public function prosesGantiPassword(Request $request, $id)
    {
        $user = Auth::user();
        $password_lama = $request->password_lama;
        $password_baru = $request->password_baru;
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

        if (!password_verify($password_lama, $user->password)) {
            dd('password lama salah');
        } else {
            if ($password_lama == $password_baru) {
                dd('sama harus ganti');
            } else {
                User::where('id', $id)->update(['password' => $password_hash]);
                return redirect('/profil');
            }
        }
    }
}
