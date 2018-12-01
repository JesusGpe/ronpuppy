<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeterinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinarias', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre',100);
            $table->string('logo',100);
            $table->string('direccion',100);
            $table->string('telefono',10);
            $table->string('horario',100);
            $table->string('servicios',250);
            $table->string('especialidad',100);

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
        Schema::dropIfExists('veterinarias');
    }
}
