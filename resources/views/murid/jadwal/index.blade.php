@extends('layout_murid.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <table id="table_id" class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
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
                    <td>{{ $row->hari }}</td>
                    <td>
                        @foreach ($row->kegiatan as $kegiatan)
                            <ul>
                                <li>{{ $kegiatan["kegiatan"] }}</li>
                            </ul>
                        @endforeach
                    </td>
                    <td>
                        <p>aksi</p>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection   