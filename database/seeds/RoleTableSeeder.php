<?php

use Illuminate\Database\Seeder;
use App\Role; //incluimos el modelo que vamos a utilizar
use App\User;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();//creamos una variable de tipo Role
    	$role->name = 'admin';
    	$role->descripcion = 'Administrador';
    	$role->save(); 

    	$role = new Role();
    	$role->name = 'user';
    	$role->descripcion = 'Usuario';
        $role->save();
        
        $role = new Role();
    	$role->name = 'inspector';
    	$role->descripcion = 'Inspector';
    	$role->save();
    }
}
