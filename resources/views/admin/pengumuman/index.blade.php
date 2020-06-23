@extends('layout.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/pengumuman/create" class="btn btn-success btn-sm mb-3">Tambah</a>
        <table id="table_id" class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>judul</th>
                    <th>Keteragan</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp

                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->kelas->kelas }}</td>
                    <td>{{ $row->ruang_id }}</td>
                    <td>{{ $row->judul }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>
                        <a href="/pengumuman/detail/{{ $row->id }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection   