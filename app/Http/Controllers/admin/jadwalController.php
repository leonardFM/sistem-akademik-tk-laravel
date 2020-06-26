<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jadwal;
use App\Kegiatan;
use App\Ruang;
use App\Kelas;
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
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwal', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        $user = Auth::user();
        $kelas = Kelas::pluck('kelas', 'id');
        $kegiatan = Kegiatan::all();
        return view('admin.jadwal.add', compact('kelas', 'user', 'data', 'kegiatan'));
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
        $data = Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'ruang_id' => $request->ruang_id,
            'hari' => $request->hari,
        ]);

        $data->kegiatan()->attach($request->kegiatan);
        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $data = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        $user = Auth::user();
        $kelas = Kelas::pluck('kelas', 'id');
        $kegiatan = Kegiatan::all();
        return view('admin.jadwal.edit', compact('jadwal', 'data', 'user', 'kelas', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $data = [
            'kelas_id' => $request->kelas_id,
            'ruang_id' => $request->ruang_id,
            'hari' => $request->hari
        ];

        $jadwal->kegiatan()->sync($request->kegiatan);
        $jadwal->update($data);
        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);
        return redirect('/jadwal');
    }
}
