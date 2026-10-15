<?php

namespace App\Models;

class CompaniaAerea {
    private array $aviones = [];
    public function __construct(private string $nombre) {}
    public function agregarAvion(Avion $a): void { $this->aviones[] = $a; }
    public function aviones(): array { return $this->aviones; }
}