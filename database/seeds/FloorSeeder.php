<?php

use Illuminate\Database\Seeder;
use App\Floor;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floors = new Floor();
        $floors->name = "Primer Piso";
        $floors->save();
        
        $floors = new Floor();
        $floors->name = "Segundo Piso";
        $floors->save();


        $floors = new Floor();
        $floors->name = "Tercer Piso";
        $floors->save();

        $floors = new Floor();
        $floors->name = "Cuarto Piso";
        $floors->save();

        $floors = new Floor();
        $floors->name = "Quinto Piso";
        $floors->save();
    }
}
