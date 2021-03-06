<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ruangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ruang::all();
        $user = Auth::user();
        return view('admin.ruang.index', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kelas = Kelas::all();
        return view('admin.ruang.add', compact('kelas', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ruang::create([
            'kelas_id' => $request->kelas_id,
            'ruang' => $request->ruang
        ]);
        return redirect('/ruang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruang $ruang)
    {
        $kelas = Kelas::all();
        $user = Auth::user();
        return view('admin.ruang.edit', compact('ruang', 'kelas', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $ruang)
    {
        $data = [
            'kelas_id' => $request->kelas_id,
            'ruang' => $request->ruang
        ];

        Ruang::where('id', $ruang->id)->update($data);
        return redirect('/ruang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        Ruang::destroy($ruang->id);
        return redirect('/ruang');
    }
}
