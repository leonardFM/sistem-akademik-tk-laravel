<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Ruang;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengumuman::all();
        $user = Auth::user();
        return view('admin.pengumuman.index', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::pluck('kelas', 'id');
        $user = Auth::user();
        return view('admin.pengumuman.add', compact('kelas', 'user'));
    }

    public function ruang($id)
    {
        $ruang = Ruang::where('kelas_id', $id)->pluck('ruang', 'id');
        return json_encode($ruang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengumuman::create([
            'kelas_id' => $request->kelas_id,
            'ruang_id' => $request->ruang_id,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/pengumuman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        $user = Auth::user();
        return view('admin.pengumuman.detail', compact('pengumuman', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        $kelas = Kelas::pluck('kelas', 'id');
        $user = Auth::user();
        return view('admin.pengumuman.edit', compact('pengumuman', 'kelas', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $data = [
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan
        ];
        Pengumuman::where('id', $pengumuman->id)->update($data);
        return redirect('/pengumuman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);
        return redirect('/pengumuman');
    }
}
