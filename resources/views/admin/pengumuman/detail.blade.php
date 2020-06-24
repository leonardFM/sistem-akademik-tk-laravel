@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <h1>{{ $pengumuman->kelas_id }}</h1>
        <h1>{{ $pengumuman->judul }}</h1>
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