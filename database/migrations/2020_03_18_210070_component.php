<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Component extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('component_id');
            $table->string('name');
            $table->string('descripcion')->nullable();
            $table->unsignedInteger('room_id');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
            $table->unsignedInteger('component_prime_id'); 
            $table->foreign('component_prime_id')->references('component_prime_id')->on('component_primes')->onDelete('cascade');
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
        //
    }
}
