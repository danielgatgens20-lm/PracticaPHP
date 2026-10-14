<?php

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('crea un grupo con dos estudiantes matriculados', function () {
    $curso = Curso::create(['codigo' => 'IF6100', 'nombre' => 'Análisis y Diseño de Sistemas']);
    $docente = Docente::create(['nombre' => 'Ana Rojas']);

    $grupo = $curso->grupos()->create([
        'numero' => 1,
        'cupo' => 30,
        'docente_id' => $docente->id,
    ]);

    $laura = Estudiante::create(['carne' => 'C10001', 'nombre' => 'Laura Mora']);
    $luis = Estudiante::create(['carne' => 'C10002', 'nombre' => 'Luis Vargas']);

    $grupo->estudiantes()->attach([
        $laura->id => ['fecha' => '2026-08-10', 'nota_final' => 85],
        $luis->id => ['fecha' => '2026-08-11', 'nota_final' => 92],
    ]);

    $grupo->refresh();

    expect($grupo->estudiantes)->toHaveCount(2)
        ->and($grupo->curso->is($curso))->toBeTrue()
        ->and($grupo->docente->is($docente))->toBeTrue()
        ->and($grupo->estudiantes->firstWhere('id', $laura->id)->pivot->nota_final)->toEqual('85.00');

    $this->assertDatabaseHas('matriculas', [
        'grupo_id' => $grupo->id,
        'estudiante_id' => $luis->id,
        'nota_final' => 92,
    ]);
});