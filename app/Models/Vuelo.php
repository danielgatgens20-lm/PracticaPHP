<?php

namespace App\Models;

use App\Exceptions\AeropuertoRepetido;

class Vuelo {
    public function __construct(private string $numero,
                                private Aeropuerto $origen,
                                private Aeropuerto $destino) {
        if ($origen === $destino) throw new AeropuertoRepetido();
    }
    public function origen(): Aeropuerto { return $this->origen; }   // unidireccional:
    public function destino(): Aeropuerto { return $this->destino; } // solo el vuelo navega
}