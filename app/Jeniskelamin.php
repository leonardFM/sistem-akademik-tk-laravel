<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
    protected $table = 'tb_jenis_kelamin';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
