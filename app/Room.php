<?php

namespace App;

use App\Component;
use App\Floor;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms"; 
    protected $primaryKey  = 'room_id';

    public function component()
    {
        return $this->hasMany('App\Component', 'room_id');
    }

    public function floor()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Floor');
    }
}
