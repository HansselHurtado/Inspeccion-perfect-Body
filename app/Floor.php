<?php

namespace App;

use App\Room;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = "floors"; 
    protected $primaryKey = 'floor_id';
    public function room()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Room','floor_id');
    }

    public function registro()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Registro','floor_id');
    }

    public function elementos_reparados()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\ElementosReparados','floor_id');
    }

}
