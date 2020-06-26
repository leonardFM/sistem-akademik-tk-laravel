@extends('layout_admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/jadwal/create" class="btn btn-success btn-sm mb-3">Tambah</a>
        <table id="table_id" class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>kelas</th>
                    <th>ruang</th>
                    <th>hari</th>
                    <th>kegiatan</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp

                @foreach ($jadwal as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->kelas->kelas }}</td>
                    <td>{{ $row->ruang->ruang }}</td>
                    <td>{{ $row->hari }}</td>
                    <td>
                        @foreach ($row->kegiatan as $kegiatan)
                            <ul>
                                <li>{{ $kegiatan["kegiatan"] }}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        <form action="/jadwal/delete/{{ $row->id }}" method="post">
                            @method('delete')    
                            @csrf    
                                <a href="/jadwal/edit/{{ $row->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm mr-2"><i class="fas fa-trash-alt"></i></button>
                            </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection   