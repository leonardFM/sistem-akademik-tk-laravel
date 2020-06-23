<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['kelas_id', 'ruang_id', 'jadwal'];
    protected $table = 'tb_jadwal';
}
