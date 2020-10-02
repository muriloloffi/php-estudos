<?php

$comida = ['bolo de cenoura', 'franguinho', 'arroz', 'macarrao'];
$bebida = ['coca', 'sprite', 'suco', 'agua'];

$cardapio = [
    '1111' => $comida,
    '2222' => $bebida
];

list ($doce, , , $massa) = $comida;

echo "$doce, $massa".PHP_EOL;

[$comidas] = $cardapio['2222'];

echo $comidas . PHP_EOL;