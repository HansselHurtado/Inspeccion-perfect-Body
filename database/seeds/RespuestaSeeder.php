<?php

use Illuminate\Database\Seeder;
use App\Respuesta;

class RespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $respuesta = new Respuesta();
        $respuesta->respuesta = "Sí";
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "No";
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "No Aplica";
        $respuesta->save();
    }
}
