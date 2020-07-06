<?php

use Illuminate\Database\Seeder;
use App\Component;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //habitacion 1
        $component = new Component();
        $component->name = "Silla";
        $component->room_id = "1";
        $component->component_prime_id = "1";
        $component->save();


        $component = new Component();
        $component->name = "Abanico";
        $component->room_id = "1";
        $component->component_prime_id = "1";
        $component->save();

        //habitacion 2
        $component = new Component();
        $component->name = "Piso";
        $component->room_id = "2";
        $component->component_prime_id = "2";
        $component->save();

        $component = new Component();
        $component->name = "Paredes";
        $component->room_id = "2";
        $component->component_prime_id = "2";
        $component->save();

        //habitacion 3
        $component = new Component();
        $component->name = "Silla";
        $component->room_id = "3";
        $component->component_prime_id = "3";
        $component->save();

        $component = new Component();
        $component->name = "Abanico";
        $component->room_id = "3";
        $component->component_prime_id = "3";
        $component->save();

        //habitacion 4
        $component = new Component();
        $component->name = "Mesa";
        $component->room_id = "4";
        $component->component_prime_id = "1";
        $component->save();

        $component = new Component();
        $component->name = "Ventana";
        $component->room_id = "4";
        $component->component_prime_id = "1";
        $component->save();

        //habitacion 5
        $component = new Component();
        $component->name = "Sabanas";
        $component->room_id = "5";
        $component->component_prime_id = "2";
        $component->save();

        $component = new Component();
        $component->name = "Camilla";
        $component->room_id = "5";
        $component->component_prime_id = "2";
        $component->save();

        //habitacion 6
        $component = new Component();
        $component->name = "Sabanas";
        $component->room_id = "6";
        $component->component_prime_id = "3";
        $component->save();

        $component = new Component();
        $component->name = "Computador";
        $component->room_id = "6";
        $component->component_prime_id = "3";
        $component->save();

        //habitacion 7
        $component = new Component();
        $component->name = "Sabanas";
        $component->room_id = "7";
        $component->component_prime_id = "1";
        $component->save();

        $component = new Component();
        $component->name = "Computador";
        $component->room_id = "7";
        $component->component_prime_id = "1";
        $component->save();

        //habitacion 8
        $component = new Component();
        $component->name = "Mesa";
        $component->room_id = "8";
        $component->component_prime_id = "2";
        $component->save();

        $component = new Component();
        $component->name = "Baño";
        $component->room_id = "8";
        $component->component_prime_id = "2";
        $component->save();


        //habitacion 9
         $component = new Component();
         $component->name = "Sabanas";
         $component->room_id = "9";
         $component->component_prime_id = "3";
         $component->save();
 
         $component = new Component();
         $component->name = "Computador";
         $component->room_id = "9";
         $component->component_prime_id = "3";
         $component->save();

        //habitacion 10
        $component = new Component();
        $component->name = "Televisor";
        $component->room_id = "10";
        $component->component_prime_id = "1";
        $component->save();

        $component = new Component();
        $component->name = "Abanico";
        $component->room_id = "10";
        $component->component_prime_id = "1";
        $component->save();

    }
}
