@extends('layout_admin.layout')
@section('content')

<!-- Small boxes (Stat box) -->

<h2>Dashboard Admin</h2>
<hr>

<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Murid</span>
        <h2 class="info-box-number">{{ $countMurid }} <small>Siswa</small></h2>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pengajar</span>
        <h2 class="info-box-number">4 <small>Guru</small></h2>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kelas</span>
        <h2 class="info-box-number">{{ $countKelas }} <small>Siswa</small></h2>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Ruang</span>
        <h2 class="info-box-number">{{ $countRuang }} <small>Siswa</small></h2>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
  <div class="col-md-8">
    <p><b>Pengumuman</b></p>
    <hr>
    <div class="card">
      <div class="card-body">
          <table class="table table-striped table-bordered text-center">
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
  
                  @foreach ($pengumuman as $row)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $row->kelas->kelas }} / {{ $row->ruang->ruang }} </td>
                      <td>{{ $row->judul }}</td>
                      <td>
                          <a href="/pengumuman/detail/{{ $row->id }}" class="btn btn-info btn-sm">Detail</a>
                      </td>
                  </tr>
                  @endforeach
                  
              </tbody>
          </table>
      </div>
  </div>
  </div>
</div>
  

@endsection   