<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internamientos', function (Blueprint $table) {
            $table->id();
            $table->string('Motivo');
            $table->string('FechaIngreso');
            $table->string('FechaSalida');
            $table->string('Peso'); 
            $table->string('Temperatura');
            $table->string('Diagnostico');
            $table->string('Comentarios');
            $table->string('Pagar');

            $table->foreignId('id_mascota')
            ->nullable()
            ->constrained('mascotas')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internamientos');
    }
}
