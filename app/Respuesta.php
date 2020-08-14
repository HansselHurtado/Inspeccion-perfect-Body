<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = "respuestas"; 
    protected $primaryKey = 'id_respuesta';

    public function registro_pregunta()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Registro_pregunta','id_respuesta');
    }
}
