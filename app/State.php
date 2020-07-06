<?php

namespace App;

use App\ComponentPriment;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states"; 
    protected $primaryKey  = 'state_id';

    public function componentPrime()
    {
        return $this->belongsTo('App\ComponentPrime');
    }
}
