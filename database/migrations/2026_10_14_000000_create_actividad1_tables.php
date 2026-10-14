<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('carne')->unique();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained()->cascadeOnDelete();
            $table->foreignId('docente_id')->constrained();
            $table->unsignedInteger('numero');
            $table->unsignedInteger('cupo');
            $table->timestamps();
            $table->unique(['curso_id', 'numero']);
        });

        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained()->cascadeOnDelete();
            $table->foreignId('grupo_id')->constrained()->cascadeOnDelete();
            $table->date('fecha');
            $table->decimal('nota_final', 5, 2)->nullable();
            $table->timestamps();
            $table->unique(['estudiante_id', 'grupo_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('cursos');
    }
};