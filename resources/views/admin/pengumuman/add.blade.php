@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <form action="/pengumuman/create" method="post">
        @csrf    
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" name="kelas_id">
                    <option value="">- pilih -</option>
                    @foreach ($kelas as $row)
                        <option value="{{ $row->id }}">{{ $row->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ruang</label>
                <input type="text" name="ruang_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Judul</label>
                <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
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
                            url : '/jadwal/ruang/' +kelasID,
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