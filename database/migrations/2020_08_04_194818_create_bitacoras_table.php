<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id_bitacora');

            $table->unsignedInteger('id_registro'); 
            $table->foreign('id_registro')->references('id_registro')->on('registros')->onDelete('cascade');
            
            //responsable
            $table->unsignedInteger('user_id'); 
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            
            $table->string('fecha'); 
            $table->longText('bitacora')->nullable();
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
        Schema::dropIfExists('bitacoras');
    }
}
