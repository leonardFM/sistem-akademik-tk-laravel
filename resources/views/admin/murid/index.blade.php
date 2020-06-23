@extends('layout.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <table id="table_id" class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Agama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp

                @foreach ($user as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->agama["agama"] }}</td>
                    <td>{{ $row->jenis_kelamin["jenis_kelamin"] }}</td>
                    <td>{{ $row->kelas["kelas"] }}</td>
                    <td>{{ $row->ruang["ruang"] }}</td>
                    <td>  
                        <a href="/profil/edit/{{ $row->id }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection   