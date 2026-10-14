<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = ['nombre'];

    // Sin metodo grupos() a proposito, al docente no le interesa saber que grupos tiene
}