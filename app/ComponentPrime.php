<?php

namespace App;

use App\Component;
use App\State;
use Illuminate\Database\Eloquent\Model;

class ComponentPrime extends Model
{
    protected $table = "component_primes"; 
    protected $primaryKey = 'component_prime_id';
    
    public function component()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Component','component_prime_id');
    }

    public function state()
    {
        return $this->hasMany('App\State','component_prime_id');
    }

    public function registro()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\Registro','component_prime_id');
    }
}
