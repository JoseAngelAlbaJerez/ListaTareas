<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        // Crea la tabla 'tasks' con los campos necesarios
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Campo de identificación único
            $table->string('title'); // Campo para el título de la tarea
            $table->text('description')->nullable(); // Campo para la descripción de la tarea (puede ser nulo)
            $table->tinyInteger('completed')->default(0); // Campo para indicar si la tarea está completada (valor predeterminado: 0)
            $table->unsignedBigInteger('user_id'); // Clave foránea que referencia al ID del usuario asociado
            $table->timestamps(); // Campos para las marcas de tiempo de creación y actualización
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'tasks'
        Schema::dropIfExists('tasks');
    }
};
