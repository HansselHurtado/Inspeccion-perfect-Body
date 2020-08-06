<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    protected $table = "bitacoras"; 
    protected $primaryKey  = 'id_bitacora';

    public function elementos_reparado()//un elemento reparado tiene muchas bitacoras
    {
        return $this->belongsTo('App\Registros');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
