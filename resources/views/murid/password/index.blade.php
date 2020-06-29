@extends('layout_murid.layout')
@section('content')

<h1>ganti password</h1>

<div class="card col-md-6">
    <div class="card-body">
        <form action="/murid/ganti_password/{{ $user->id }}" method="post">
        @method('put')
        @csrf    
            <div class="form-group">
                <label for="exampleInputEmail1">Password lama</label>
                <input type="password" name="password_lama" class="form-control">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">password baru</label>
                <input type="password" name="password_baru" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection   