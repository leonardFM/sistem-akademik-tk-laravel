<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tb_pengumuman';

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function ruang()
    {
        return $this->belongsTo('App\Ruang');
    }
}
