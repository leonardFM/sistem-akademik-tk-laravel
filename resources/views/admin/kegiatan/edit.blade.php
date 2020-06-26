@extends('layout_admin.layout')
@section('content')
<div class="card col-md-6">
    <div class="card-body">
        <form action="/kegiatan/edit/{{ $kegiatan->id }}" method="post">
        @method('put')
        @csrf    
            <div class="form-group">
                <label for="exampleInputEmail1">kegiatan</label>
                <input type="text" name="kegiatan" value="{{ $kegiatan->kegiatan }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection   