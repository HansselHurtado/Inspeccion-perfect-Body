<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = "respuestas"; 
    protected $primaryKey = 'id_respuesta';

    public function pregunta_respuesta()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Pregunta_Respuesta','id_respuesta');
    }
}
