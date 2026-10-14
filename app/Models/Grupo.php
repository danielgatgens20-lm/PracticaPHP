<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grupo extends Model
{
    protected $fillable = ['curso_id', 'docente_id', 'numero', 'cupo'];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    // Asociacion unidireccional, solo el grupo conoce a su docente
    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }

    public function estudiantes(): BelongsToMany
    {
        return $this->belongsToMany(Estudiante::class, 'matriculas')
            ->using(Matricula::class)
            ->withPivot('fecha', 'nota_final')
            ->withTimestamps();
    }
}