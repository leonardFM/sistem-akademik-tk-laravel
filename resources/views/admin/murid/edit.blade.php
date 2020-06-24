@extends('layout_admin.layout')
@section('content')
<div class="card col-md-6">
    <div class="card-body">
        <form action="/murid/edit/{{ $murid->id }}" method="post">
        @method('put')
        @csrf    
            
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" value="{{ $murid->name }}" class="form-control form-control-sm" readonly>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" value="{{ $murid->email }}" class="form-control form-control-sm" readonly>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Agama</label>
                <select class="form-control form-control-sm" name="agama">
                    <option>- pilih -</option>
                    @foreach ($agama as $id => $agama)
                        <option value="{{ $id }}" {{ ($id == $murid->agama_id) ? 'selected' : '' }}>{{ $agama }}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select class="form-control form-control-sm" name="jenis_kelamin">
                    <option>- pilih -</option>
                    @foreach ($jenis_kelamin as $id => $jenis_kelamin)
                        <option value="{{ $id }}" {{ ($id == $murid->jenis_kelamin_id) ? 'selected' : '' }}>{{ $jenis_kelamin }}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control form-control-sm" name="kelas_id">
                    <option>- pilih -</option>
                    @foreach ($kelas as $id => $kelas)
                        <option value="{{ $id }}" {{ $id == $murid->kelas_id ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Ruang</label>
                <select class="form-control form-control-sm" name="ruang_id">
                    <option value="{{ $murid->ruang_id }}" >{{ $murid->ruang["ruang"] }}</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        {{-- dependent dropdown --}}
        <script type="text/javascript">
            jQuery(document).ready(function ()
            {
                jQuery('select[name="kelas_id"]').on('change',function(){
                    var kelasID = jQuery(this).val();
                    if(kelasID)
                    {
                        jQuery.ajax({
                            url : '/murid/ruang/' +kelasID,
                            type : "GET",
                            dataType : "json",
                            success:function(data)
                            {
                            console.log(data);
                            jQuery('select[name="ruang_id"]').empty();
                            jQuery.each(data, function(id,ruang){
                                $('select[name="ruang_id"]').append('<option value="'+ id +'">'+ ruang +'</option>');
                            });
                            }
                        });
                    } else {
                        $('select[name="ruang_id"]').empty();
                    }
                });
            });
            </script>
    </div>
</div>
@endsection   