<?php

use Illuminate\Database\Seeder;
use App\State;

class States extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //MANTENIMIENTO
        $state = new State();
        $state->name = "Bueno";
        $state->component_prime_id = "1";
        $state->save();

        $state = new State();
        $state->name = "Malo";
        $state->component_prime_id = "1";
        $state->save();

        $state = new State();
        $state->name = "No aplica";
        $state->component_prime_id = "1";
        $state->save();


        //ASEO
        $state = new State();
        $state->name = "Limpio";
        $state->component_prime_id = "2";
        $state->save();

        $state = new State();
        $state->name = "Sucio";
        $state->component_prime_id = "2";
        $state->save();

        $state = new State();
        $state->name = "No aplica";
        $state->component_prime_id = "2";
        $state->save();


        //DOTACION
        $state = new State();
        $state->name = "Si";
        $state->component_prime_id = "3";
        $state->save();

        $state = new State();
        $state->name = "No";
        $state->component_prime_id = "3";
        $state->save();

        $state = new State();
        $state->name = "No aplica";
        $state->component_prime_id = "3";
        $state->save();
    }
}
