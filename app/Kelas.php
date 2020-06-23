<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tb_kelas';

    public function pengumuman()
    {
        return $this->belongsTo('App\Pengumuman');
    }

    public function ruang()
    {
        return $this->belongsTo('App\Ruang');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
