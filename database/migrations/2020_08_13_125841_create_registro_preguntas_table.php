<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_ronda_de_seguridad', function (Blueprint $table) {
            $table->increments('id_registro_ronda_de_seguridad');            
            
            $table->unsignedInteger('room_id'); 
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');

            $table->string('nombre_de_paciente');
            $table->string('observaciones')->nullable();
            $table->string('fecha');
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
        Schema::dropIfExists('registro_preguntas');
    }
}
