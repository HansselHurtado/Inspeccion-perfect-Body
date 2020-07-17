<?php

namespace App;

use App\ComponentPriment;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states"; 
    protected $primaryKey  = 'state_id';

    public function componentPrime()
    {
        return $this->belongsTo('App\ComponentPrime');
    }

    public function registro()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Registro','state_id');
    }

    public function elementos_reparados()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\ElementosReparados','state_id');
    }
}
