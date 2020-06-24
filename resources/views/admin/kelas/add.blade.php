@extends('layout_admin.layout')
@section('content')
<div class="card col-md-6">
    <div class="card-body">
        <form action="/kelas/create" method="post">
        @csrf    
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <input type="text" name="kelas" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection   