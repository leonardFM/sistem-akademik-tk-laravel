<?php

namespace App\Http\Controllers\murid;

use App\Agama;
use App\User;
use App\Http\Controllers\Controller;
use App\Jeniskelamin;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::pluck('kelas', 'id');
        $jenis_kelamin = Jeniskelamin::pluck('jenis_kelamin', 'id');
        $agama = Agama::pluck('agama', 'id');
        $user = Auth::user();
        $teman_kelas = User::where('ruang_id', $user->ruang_id)->paginate(5);
        return view('murid.profil.index', compact('user', 'agama', 'teman_kelas', 'jenis_kelamin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $kelas = Kelas::pluck('kelas', 'id');
        $jenis_kelamin = Jeniskelamin::pluck('jenis_kelamin', 'id');
        $agama = Agama::pluck('agama', 'id');
        $user = Auth::user();
        return view('murid.profil.index', compact('user', 'kelas', 'agama', 'jenis_kelamin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'agama_id' => $request->agama_id,
            'jenis_kelamin_id' => $request->jenis_kelamin_id
        ];

        User::where('id', $id)->update($data);
        return redirect('/profil');
    }

    public function gambar(Request $request, $id)
    {
        $gambar = $request->file('gambar');
        $new_gambar = time() . $gambar->getClientOriginalName();
        $user = Auth::user();
        $old_gambar = $user->gambar;


        User::where('id', $id)->update(['gambar' => 'public/murid/profil/' . $new_gambar]);
        $gambar->move('public/murid/profil/', $new_gambar);
        File::delete($old_gambar);

        return redirect('/profil');
    }

    public function teman_kelas()
    {
        $user = Auth::user();
        $teman_kelas = User::where('ruang_id', $user->ruang_id)->paginate(10);
        return view('murid.profil.teman_kelas', compact('teman_kelas', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
