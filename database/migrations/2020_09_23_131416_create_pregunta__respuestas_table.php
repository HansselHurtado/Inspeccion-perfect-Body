<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_respuestas', function (Blueprint $table) {
            $table->increments('id_pregunta_respuesta');

            $table->unsignedInteger('id_registro_ronda_de_seguridad'); 
            $table->foreign('id_registro_ronda_de_seguridad')->references('id_registro_ronda_de_seguridad')->on('registro_ronda_de_seguridad')->onDelete('cascade');

            $table->unsignedInteger('id_pregunta'); 
            $table->foreign('id_pregunta')->references('id_pregunta')->on('preguntas')->onDelete('cascade');
            
            $table->unsignedInteger('id_respuesta'); 
            $table->foreign('id_respuesta')->references('id_respuesta')->on('respuestas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta__respuestas');
    }
}
