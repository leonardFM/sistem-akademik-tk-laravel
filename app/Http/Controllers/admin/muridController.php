<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Agama;
use App\Jeniskelamin;
use App\Ruang;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class muridController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        $user = Auth::user();
        $murid = User::all();
        return view('admin.murid.index', compact('murid', 'kelas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'kelas_id' => $request->kelas_id,
            'ruang_id' => $request->ruang_id,
            'jadwal' => $request->jadwal
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $murid = User::findorfail($id);
        return view('admin.murid.detail', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agama = Agama::pluck('agama', 'id');
        $murid = User::findorfail($id);
        $kelas = Kelas::pluck('kelas', 'id');
        $jenis_kelamin = Jeniskelamin::pluck('jenis_kelamin', 'id');
        return view('admin.murid.edit', compact('kelas', 'jenis_kelamin', 'murid', 'agama'));
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
            'agama_id' => $request->agama,
            'jenis_kelamin_id' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'ruang_id' => $request->ruang_id,
        ];
        User::where('id', $id)->update($data);
        return redirect('/murid');
    }

    public function ruang($id)
    {
        $ruang = Ruang::where('kelas_id', $id)->pluck('ruang', 'id');
        return json_encode($ruang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/murid');
    }
}
