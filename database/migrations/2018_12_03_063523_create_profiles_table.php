<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre',100)->nullable();
            $table->string('tipom',50)->nullable();
            $table->date('fecha_nac')->nullable();
            $table->string('sexo',50)->nullable();
            $table->string('imagen',100)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('horario',100)->nullable();
            $table->string('servicios',250)->nullable();
            $table->string('especialidad',100)->nullable();
            $table->string('tipo',20);
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
        Schema::dropIfExists('profiles');
    }
}
