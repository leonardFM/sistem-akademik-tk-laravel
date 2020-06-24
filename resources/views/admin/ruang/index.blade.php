@extends('layout_admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/ruang/create" class="btn btn-success btn-sm mb-3">Tambah</a>
        <table id="table_id" class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Kelas</th>
                    <th>judul</th>
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
                    <td>{{ $row->ruang }}</td>
                    <td>
                        <form action="/ruang/delete/{{ $row->id }}" method="post">
                        @method('delete')    
                        @csrf    
                            <a href="/ruang/edit/{{ $row->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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