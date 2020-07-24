<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('room_id');
            $table->string('name');
            $table->string('descripcion')->nullable();
            $table->string('estado_de_inspeccion');
            $table->integer('floor_id')->unsigned(); 
            $table->foreign('floor_id')->references('floor_id')->on('floors')->onDelete('cascade');
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
