@extends('layout.layout')
@section('content')
<div class="card col-md-6">
    <div class="card-body">
        <form action="/kelas/edit/{{ $kelas->id }}" method="post">
        @method('put')
        @csrf    
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <input type="text" name="kelas" value="{{ $kelas->kelas }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection   