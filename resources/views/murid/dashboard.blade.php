@extends('layout_murid.layout')
@section('content')
<h2>Dashboard</h2>
<hr>
<div class="row">
    <div class="col-md-3">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-user"></i>
            Profil Saya
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid" style="height: 200px" width="170px" src="{{ $user->gambar }}" alt="User profile picture"> 
            </div>

            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Kelas</b> <a class="float-right">{{ $user->kelas["kelas"] }}</a>
              </li>
              <li class="list-group-item">
                <b>Ruang</b> <a class="float-right">{{ $user->ruang["ruang"] }}</a>
              </li>
            </ul>
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-9">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
            Pengumuman
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @foreach ($pengumuman as $row)
            <div class="callout callout-info">
                <h5>{{ $row->kelas->kelas }} ({{ $row->ruang->ruang }})</p></h5>
                <hr>
                <p>{{ $row->judul }}</p>
              </div>
            @endforeach
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

@endsection   