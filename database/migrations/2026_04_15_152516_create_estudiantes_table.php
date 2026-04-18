<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Se crea la estructura de la tabla estudiantes en la base de datos
        // Además que se define la relación entre la tabla carrera y estudiantes al usar una llave foranea
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompleto');
            $table->string('correo')->unique();
            $table->enum('semestre', ['1','2','3','4','5','6','7','8','9']);
            $table->foreignId('id_carrera')->constrained('carreras')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
