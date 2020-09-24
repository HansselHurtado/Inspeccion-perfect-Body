<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = "preguntas"; 
    protected $primaryKey = 'id_pregunta';

    public function pregunta_respuesta()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Pregunta_Respuesta','id_pregunta');
    }
}
