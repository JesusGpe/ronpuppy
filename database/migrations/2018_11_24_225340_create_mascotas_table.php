<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre',100);
            $table->string('tipo',50);
            $table->date('fecha_nac');
            $table->string('sexo',50);
            $table->string('foto',100);
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
        Schema::dropIfExists('mascotas');
    }
}
