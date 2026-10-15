<?php

namespace App\Models;

class Aeropuerto {
    public function __construct(private string $codigo, private string $nombre) {}
    public function codigo(): string { return $this->codigo; }
    // sin lista de vuelos: el aeropuerto no conoce sus vuelos
}