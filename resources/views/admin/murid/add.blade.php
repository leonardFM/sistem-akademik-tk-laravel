@extends('layout.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <form action="/murid/create/" method="post">
        @csrf    
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kelas</label>
            <select class="form-control" id="kelas" name="kelas_id">
                <option value="">- pilih -</option>

                @foreach ($kelas as $id => $kelas)
                    <option value="{{ $id }}">{{ $kelas }}</option>
                @endforeach
            
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Ruang</label>
            <select class="form-control" id="ruang" name="ruang_id">
                <option value="">- pilih -</option>
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