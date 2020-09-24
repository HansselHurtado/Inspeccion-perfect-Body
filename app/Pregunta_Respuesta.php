<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta_Respuesta extends Model
{

    protected $table = "pregunta_respuestas"; 
    protected $primaryKey = 'id_pregunta_respuesta';

    public function pregunta()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Pregunta');
    }

    public function respuesta()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Respuesta');
    }

    public function registro_ronda_de_seguridad()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Registro_pregunta','id_pregunta_respuesta');
    }
}
