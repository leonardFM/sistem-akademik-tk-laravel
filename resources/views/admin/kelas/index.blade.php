@extends('layout.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/kelas/create" class="btn btn-success btn-sm mb-3">Tambah</a>
        <table id="table_id" class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Kelas</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp

                @foreach ($kelas as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->kelas }}</td>
                    <td>
                        <form action="/kelas/delete/{{ $row->id }}" method="post">
                        @method('delete')    
                        @csrf    
                            <a href="/kelas/edit/{{ $row->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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