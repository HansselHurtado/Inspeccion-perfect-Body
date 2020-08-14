<?php

use Illuminate\Database\Seeder;
use App\Pregunta;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tiene Manila de Identificacion";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tablero de Identificacion";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Cuenta con manilla adicional para identificar el Riesgo";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Explicacion al paciente sobre el medicamento Administrado";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Le preguntaron si era alergico algún medicamento";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Verificacion de la Venopuncion";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Verificacion de cambio de Equipos y Liquidos";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Explicacion al paciente sobre el medicamento Administrado";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Equipos y Liquidos Marcados";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tiene Manila de Identificacion de Caida(si aplica)";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Varandas Elevadas";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Le informaron sobre el riesgo de caídas";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tiene Manila de Identificacion de UPP(si aplica)";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Le informaron sobre los riesgos de ulceras por presión";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tiene firmado el consentimiento informado";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Se registro la informacion que se le brindo al paciente";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Se realizo entrega del reglamento del Servicio";
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Informacion al paciente sobre el Autocuidado";
        $pregunta->save();

    }
}
