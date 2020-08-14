<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = "preguntas"; 
    protected $primaryKey = 'id_pregunta';

    public function registro_pregunta()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Registro_pregunta','id_pregunta');
    }
}
