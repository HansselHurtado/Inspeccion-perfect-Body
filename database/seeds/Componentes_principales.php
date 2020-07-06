<?php

use Illuminate\Database\Seeder;
use App\ComponentPrime;

class Componentes_principales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $component = new ComponentPrime();
        $component->name = "Mantenimiento";
        $component->save();

        $component = new ComponentPrime();
        $component->name = "Aseo";
        $component->save();
        
        $component = new ComponentPrime();
        $component->name = "Dotacion";
        $component->save();
    }
}
