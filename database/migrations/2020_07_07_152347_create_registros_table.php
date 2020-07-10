<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id_registro');
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
            
            
            $table->string('observaciones')->nullable();            
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
        Schema::dropIfExists('registros');
    }
}
