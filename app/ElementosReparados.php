<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementosReparados extends Model
{
    protected $table = "elementos_reparados"; 
    protected $primaryKey = 'id_elemento_reparado';

    public function registro()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Registro');
    }

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

    public function user()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\User');
    }
    
    
}
