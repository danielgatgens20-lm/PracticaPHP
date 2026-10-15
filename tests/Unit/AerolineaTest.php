<?php

use App\Exceptions\AeropuertoRepetido;
use App\Models\Aeropuerto;
use App\Models\Avion;
use App\Models\CompaniaAerea;
use App\Models\Vuelo;

test('una compañía maneja dos aviones y cada avión conoce su compañía', function () {
    $c  = new CompaniaAerea('Aerovías Ticas');
    $a1 = new Avion('TI-BAA', $c);
    $a2 = new Avion('TI-BAB', $c);
    expect($c->aviones())->toHaveCount(2);
    expect($a1->compania())->toBe($c);
});

test('se instancia un vuelo que comienza en un aeropuerto y termina en otro', function () {
    $lir = new Aeropuerto('LIR', 'Daniel Oduber Quirós');
    $sjo = new Aeropuerto('SJO', 'Juan Santamaría');
    $v = new Vuelo('CR-101', $lir, $sjo);
    expect($v->origen()->codigo())->toBe('LIR');
    expect($v->destino()->codigo())->toBe('SJO');
});

test('un vuelo no puede salir y llegar al mismo aeropuerto', function () {
    $lir = new Aeropuerto('LIR', 'Daniel Oduber Quirós');
    new Vuelo('CR-102', $lir, $lir);
})->throws(AeropuertoRepetido::class);