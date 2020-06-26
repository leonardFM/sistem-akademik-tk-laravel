@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <form action="/pengumuman/edit/{{ $pengumuman->id }}" method="post">
        @method('put')
        @csrf    
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas_id">
                    <option>- pilih -</option>
                    @foreach ($kelas as $id => $kelas)
                        <option value="{{ $id }}" {{ $id == $pengumuman->kelas_id ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Ruang</label>
                <select class="form-control" id="ruang" name="ruang_id">
                    <option value="{{ $pengumuman->id }}">{{ $pengumuman->ruang->ruang }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $pengumuman->judul }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">{{ $pengumuman->keterangan }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection   