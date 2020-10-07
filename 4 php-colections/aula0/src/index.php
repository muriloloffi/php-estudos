<?php

require_once 'Calculadora.php';

$notas = [9, 5, 10, 8];

$calculadora = new Calculadora();
$media = $calculadora->calculaMedia($notas);

if ($media) {
    echo "<h1>A média é: {$media}</h1>";
} else {
    echo "Não foi possível calcular a média";
}