@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8 text-center">
    <div class="card-body">
        <h3>{{ $pengumuman->kelas->kelas }}</h3>
        <hr>
        <h2>{{ $pengumuman->ruang->ruang }}</h2>
        <hr>
        <h1>{{ $pengumuman->judul }}</h1>
        <hr>
        <h1>{{ $pengumuman->keterangan }}</h1>
        <hr>
        
        <form action="/pengumuman/delete/{{ $pengumuman->id }}" method="post">
        @method('delete')
        @csrf
        <a href="/pengumuman/edit/{{ $pengumuman->id }}" class="btn btn-sm btn-primary">Edit</a>
        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection   