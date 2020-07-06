<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Element;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleTableSeeder::class);

        $this->call(UserTableSeeder::class);

        $this->call(FloorSeeder::class);

        $this->call(Componentes_principales::class);

        $this->call(States::class);

        $this->call(RoomSeeder::class);

        $this->call(ElementSeeder::class);        
    }
}
