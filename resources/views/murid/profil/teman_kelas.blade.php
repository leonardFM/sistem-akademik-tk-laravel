@extends('layout_murid.layout')
@section('content')
<h2>Teman Kelas</h2>
<hr>
<div class="card">
    <div class="card-body">
        <table  class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                  @php
                      $no=1;
                  @endphp
                  @foreach ($teman_kelas as $row)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->kelas["kelas"] }}</td>
                      <td>{{ $row->ruang["ruang"] }}</td>
                      <td>
                        <a href="" class="btn btn-primary btn-sm">view</a>
                      </td>
                    </tr>
                  @endforeach
         
            </tbody>
        </table>
    </div>
</div>
@endsection   