<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tb_kegiatan';

    public function jadwal()
    {
        return $this->belongsToMany('App\Jadwal');
    }
}
