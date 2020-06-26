@extends('layout_murid.layout')
@section('content')
<div class="card col-md-12 text-center">
    <div class="card-body">
        <h3>{{ $data->kelas->kelas }}</h3>
        <hr>
        <h2>{{ $data->ruang->ruang }}</h2>
        <hr>
        <h1>{{ $data->judul }}</h1>
        <hr>
        <h1>{{ $data->keterangan }}</h1>
        <hr>
        
    </div>
</div>
@endsection   