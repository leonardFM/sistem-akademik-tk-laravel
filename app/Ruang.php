<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tb_ruang';

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
