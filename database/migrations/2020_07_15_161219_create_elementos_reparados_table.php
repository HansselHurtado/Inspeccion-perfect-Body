<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosReparadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos_reparados', function (Blueprint $table) {
            $table->increments('id_elemento_reparado');

            //registro
            $table->unsignedInteger('id_registro'); 
            $table->foreign('id_registro')->references('id_registro')->on('registros')->onDelete('cascade');

            //piso
            $table->unsignedInteger('floor_id'); 
            $table->foreign('floor_id')->references('floor_id')->on('floors')->onDelete('cascade');

            //habitacion
            $table->unsignedInteger('room_id'); 
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
            
            //componente
            $table->unsignedInteger('component_prime_id'); 
            $table->foreign('component_prime_id')->references('component_prime_id')->on('component_primes')->onDelete('cascade');
            
            //elemento
            $table->unsignedInteger('component_id'); 
            $table->foreign('component_id')->references('component_id')->on('components')->onDelete('cascade');
            
            //estado
            $table->unsignedInteger('state_id'); 
            $table->foreign('state_id')->references('state_id')->on('states')->onDelete('cascade');            
            
            //responsable
            $table->unsignedInteger('user_id'); 
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            
            $table->string('observaciones')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('elementos_reparados');
    }
}
