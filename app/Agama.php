<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'tb_agama';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
