@extends('layout_admin.layout')
@section('content')
<div class="card col-md-8">
    <div class="card-body">
        <form action="/jadwal/edit/{{ $jadwal->id }}" method="post">
        @method('put')    
        @csrf    
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" {{ $jadwal->id == $jadwal->kelas_id ? 'selected' : '' }} id="kelas" name="kelas_id">

                    @foreach ($kelas as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Ruang</label>
                <select class="form-control" id="ruang" name="ruang_id">
                    <option value="{{ $jadwal->ruang_id }}">{{ $jadwal->ruang["ruang"] }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Hari</label>
                <select class="form-control" name="hari">
                    <option value="{{ $jadwal->hari }}">{{$jadwal->hari}}</option>
                    <option value="senin">senin</option>
                    <option value="selasa">selasa</option>
                    <option value="raabu">rabu</option>
                </select>
            </div>

            <div class="form-group">
                <label>Multiple</label>
                <div class="select2-primary">
                    <select class="select2" name="kegiatan[]" multiple="multiple" data-dropdown-css-class="select2-primary" data-placeholder="Select a State" style="width: 100%;">

                        @foreach ($kegiatan as $row)
                            <option value="{{ $row->id }}" @foreach ($jadwal->kegiatan as $item) {{ $row->id == $item->id ? 'selected' : ''}}  @endforeach>
                                {{ $row->kegiatan }}
                            </option>
                        @endforeach
                        
                    </select>
                </div>
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