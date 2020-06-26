@extends('layout_admin.layout')
@section('content')
<div class="card col-md-6">
    <div class="card-body">
        <form action="/kegiatan/create" method="post">
        @csrf    
            <div class="form-group">
                <label for="exampleInputEmail1">Kegiatan</label>
                <input type="text" name="kegiatan" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection   