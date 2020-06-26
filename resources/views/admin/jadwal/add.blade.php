@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <form action="/jadwal/create" method="post">
        @csrf    
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="kelas" name="kelas_id">
                    <option value="">- pilih -</option>

                    @foreach ($kelas as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Ruang</label>
                <select class="form-control" id="ruang" name="ruang_id">
                    <option value="">- pilih -</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Hari</label>
                <select class="form-control"  name="hari">
                    <option value="">- pilih -</option>
                    <option value="senin">senin</option>
                    <option value="selasa">selasa</option>
                    <option value="rabu">rabu</option>
                    <option value="kamis">kamis</option>
                </select>
            </div>

            <div class="form-group">
                <label>Multiple</label>
                <div class="select2-primary">
                    <select class="select2" name="kegiatan[]" multiple="multiple" data-dropdown-css-class="select2-primary" data-placeholder="Select a State" style="width: 100%;">
                        <option value="">- pilih -</option>

                        @foreach ($kegiatan as $row)
                            <option value="{{ $row->id }}">{{ $row->kegiatan }}</option>
                        @endforeach
                        
                    </select>
                </div>
              </div>

            <div class="form-group">
                <label for="exampleInputEmail1">jadwal</label>
                <input type="text" name="jadwal" class="form-control">
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