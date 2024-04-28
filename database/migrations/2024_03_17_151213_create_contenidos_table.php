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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->references('id')->on('materias')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nombre');
            // notas generales, funciones, tips, documentacion, comandos, cursos
            $table->string('titulo');
            $table->string('autor');
            // solo si es un curso
            $table->longText('notas');
            $table->boolean('oficial');
            $table->boolean('especial');
            // solo si es documentacion
            $table->float('calificacion')->nullable();
            // solo si un curso
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};
