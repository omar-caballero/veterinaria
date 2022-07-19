<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            
            $table->string('Nombre');
            $table->string('Sexo');
            $table->string('FechaNacimiento');
            $table->string('Tamaño');
            $table->string('Foto');
            $table->string('Alergia');

            $table->foreignId('id_propietario')
                    ->nullable()
                    ->constrained('propietarios')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();

            $table->foreignId('id_raza')
                    ->nullable()
                    ->constrained('razas')
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
        Schema::dropIfExists('mascotas');
    }
}
