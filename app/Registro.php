<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{

    protected $table = "registros"; 
    protected $primaryKey = 'id_registro';

    public function floor()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Floor');
    }

    public function component()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Component');
    }

    public function componentPrime()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\ComponentPrime');
    }

    public function room()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Room');
    }

    public function state()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\State');
    }
}
