@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <form action="/ruang/edit/{{ $ruang->id }}" method="post">
        @method('put')
        @csrf    
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas_id">
                    <option>- pilih -</option>
                    @foreach ($kelas as $row)
                        <option value="{{ $row->id }}">{{ $row->kelas }}</option>
                    @endforeach
                
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ruang</label>
                <input type="text" name="ruang" class="form-control" value="{{ $ruang->ruang }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection   