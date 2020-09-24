<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_pregunta extends Model
{
    protected $table = "registro_ronda_de_seguridad"; 
    protected $primaryKey = 'id_registro_ronda_de_seguridad';

    public function room()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Room');
    }
}
