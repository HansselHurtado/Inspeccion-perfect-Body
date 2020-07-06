<?php

namespace App;

use App\State;
use App\Room;
use App\ComponentPrime;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $table = "components"; 
    protected $primaryKey  = 'component_id';

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function component_prime()
    {
        return $this->belongsTo('App\ComponentPrime','component_prime_id');
    }

    

}
