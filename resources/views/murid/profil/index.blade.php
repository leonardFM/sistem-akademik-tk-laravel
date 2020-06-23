@extends('layout.layout')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <h2>Profil Saya</h2>
        <hr>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-dark card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="/assets/dist/img/user4-128x128.jpg"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">{{ $user->email }}</p>

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

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-dark card-outline">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#teman" data-toggle="tab">Teman Kelas</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <table class="table table-striped table-bordered text-center" style="float: left">
                        <tr>
                            <td>Nama</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Nama Orangtua</td>
                            <td>{{ $user->nama_orangtua }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>{{ $user->kelas["kelas"] }}</td>
                        </tr>
                        <tr>
                            <td>Ruang</td>
                            <td>{{ $user->ruang["ruang"] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $user->alamat }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>{{ $user->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{ $user->jenis_kelamin["jenis_kelamin"] }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>{{ $user->agama["agama"] }}</td>
                        </tr>
                    </table>
                </div>

                <div class="tab-pane" id="teman">
                    <table id="table_id" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th style="width: 20px">No</th>
                                <th>Nama</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $no=1;
                            @endphp --}}
            
                            
                            <tr>
                                <td>1</td>
                                <td>teman</td>
                                <td>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" action="/profil/edit/{{ $user->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nama Orangtua</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{ $user->nama_orangtua }}" class="form-control" id="inputName">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="agama_id">
                                @foreach ($agama as $id => $agama)
                                    <option value="{{ $id }}" {{ ($id == $user->agama_id) ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach        
                            </select>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="jenis_kelamin_id">
                            <option>- pilih -</option>
                            @foreach ($jenis_kelamin as $id => $jenis_kelamin)
                                <option value="{{ $id }}" {{ ($id == $user->jenis_kelamin_id) ? 'selected' : '' }}>{{ $jenis_kelamin }}</option>
                            @endforeach
                            
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="alamat" id="inputExperience">{{ $user->alamat }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">No telepon</label>
                      <div class="col-sm-10">
                        <input type="text" name="no_telepon" value="{{ $user->no_telepon }}"  class="form-control" id="inputSkills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger btn-block">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection   