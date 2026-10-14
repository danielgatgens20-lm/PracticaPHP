<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

// Clase de asociacion entre Estudiante y Grupo, aqui vive la nota
class Matricula extends Pivot
{
    protected $table = 'matriculas';

    public $incrementing = true;

    protected $casts = [
        'fecha' => 'date',
        'nota_final' => 'decimal:2',
    ];
}