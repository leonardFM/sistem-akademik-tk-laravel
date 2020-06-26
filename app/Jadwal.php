<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tb_jadwal';

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function ruang()
    {
        return $this->belongsTo('App\Ruang');
    }

    public function kegiatan()
    {
        return $this->belongsToMany('App\Kegiatan');
    }
}
