@extends('layout_admin.layout')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
        <table  class="table table-striped">
            <tr>
                <td><b>Nama</b></td>
                <td>:</td>
                <td><b>{{ $murid->name }}</b></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>:</td>
                <td><b>{{ $murid->email }}</b></td>
            </tr>
            <tr>
                <td><b>Agama</b></td>
                <td>:</td>
                <td><b>{{ $murid->agama["agama"] }}</b></td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td>:</td>
                <td><b>{{ $murid->alamat }}</b></td>
            </tr>
            <tr>
                <td><b>No Telepon</b></td>
                <td>:</td>
                <td><b>{{ $murid->no_telepon }}</b></td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>:</td>
                <td><b>{{ $murid->jenis_kelamin["jenis_kelamin"] }}</b></td>
            </tr>
            <tr>
                <td><b>Kelas</b></td>
                <td>:</td>
                <td><b>{{ $murid->kelas['kelas'] }}</b></td>
            </tr>
            <tr>
                <td><b>Ruang</b></td>
                <td>:</td>
                <td><b>{{ $murid->ruang['ruang'] }}</b></td>
            </tr>
        </table>
        
        <form action="/murid/delete/{{ $murid->id }}" method="post">
        @method('delete')
        @csrf
        <a href="/murid/edit/{{ $murid->id }}" class="btn btn-sm btn-primary">Sunting</a>
        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection   