<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_pregunta extends Model
{
    protected $table = "registro_preguntas"; 
    protected $primaryKey = 'id_registro_pregunta';

    public function pregunta()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Pregunta');
    }

    public function respuesta()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Respuesta');
    }

    public function room()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Room');
    }
}
