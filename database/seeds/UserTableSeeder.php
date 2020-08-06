<?php

use Illuminate\Database\Seeder;
use App\Role; //incluimos el modelo que vamos a utilizar
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user = new User();//creamos un nuevo usuario de tipo admin
    	$user->name = "Admin principal";
    	$user->apellido = "super admin";
    	$user->username = "Admin";
    	$user->email = "Admin@email.com";
		$user->password = bcrypt('perfect');//aqui incriptamos la contraseña
		$user->role_id = '1';
		$user->save();

		$user = new User();//creamos un nuevo usuario
		$user->name = "User Normal";
		$user->apellido = "super user";
    	$user->username = "user";
    	$user->email = "user@email.com";
		$user->password = bcrypt('perfect');//aqui incriptamos la contraseña
		$user->role_id = '2';
		$user->save();
		
		//$user->roles()->sync([$rolUser->id]);   
		
    	//$user->roles()->sync([$role_user]);//este metodo relaciona al usuario con el rol que debe llevar


    	
		//$user->roles()->sync([$rolAdmin->role_id]);   
		
        //$role_user = Role::where('role_id',2)->first();//hacemos un query para que nos traiga la informacion de este rol
		//$role_admin = Role::where('role_id',1)->first();

		/*$rolAdmin = Role::create([
			'name' => 'admin',
			'descripcion' => 'administrador'
		]);
		$rolUser = Role::create([
			'name' => 'user',
			'descripcion' => 'usuario'
		]);
		
		$User = User::create([
			'name' => 'admin',
			'email' => 'admin@email.com',
			'password' => Hash::make('perfect')

		]);
		//$User->roles()->attach($rolAdmin->id);

		$User = User::create([
			'name' => 'user',
			'email' => 'user@email.com',
			'password' => Hash::make('perfect')

		]);
		

		$users = User::find(1);
		$users->roles()->attach(2);*/

 	   	
		//$user->roles()->sync([$role_admin]);//este metodo relaciona al usuario con el rol    



    }
}
