<?php

namespace App\Models;

class Avion {
    public function __construct(private string $matricula, private CompaniaAerea $compania) {
        $compania->agregarAvion($this);     // bidireccional: los dos lados se conocen
    }
    public function compania(): CompaniaAerea { return $this->compania; }
}