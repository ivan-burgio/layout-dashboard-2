<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Ejecuta las migraciones para crear la tabla de usuarios.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' de tipo BIGINT auto-incremental.
            $table->string('name'); // Crea una columna 'name' de tipo VARCHAR.
            $table->string('email')->unique(); // Crea una columna 'email' de tipo VARCHAR con restricción de unicidad.
            $table->string('password'); // Crea una columna 'password' de tipo VARCHAR.
            $table->string('documento')->nullable(); // Crea una columna 'documento' de tipo VARCHAR que puede ser nula.
            $table->string('token')->nullable(); // Crea una columna 'token' de tipo VARCHAR que puede ser nula.
            $table->integer('role')->default(1); // Crea una columna 'role' de tipo INTEGER con valor predeterminado 1.
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' para el seguimiento de registros.
        });
    }

    /**
     * Revertir las migraciones para eliminar la tabla de usuarios.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
