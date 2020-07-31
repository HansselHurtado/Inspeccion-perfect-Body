<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable/*, HasApiTokens*/;
    

    protected $table = "users"; 
    protected $primaryKey  = 'user_id';

    public function roles(){//esta funcion devulve la relacion o resultado de la relacion, devuelve los role
        return $this->belongsTo('App\Role');
    }

    public function elementos_reparados()//funcion de relacion de unos a muchos
    {
        return $this->hasMany('App\ElementosReparados','user_id');
    }

    public static function authorizeRoles($roles){
        
        if(auth()->user()->role_id == $roles) {
            return true;
        }
        abort(401, 'No estas Autrizado para esta accion');//esto es un mensaje que le enviamos al usuario, sino se pudo validar el rol
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
