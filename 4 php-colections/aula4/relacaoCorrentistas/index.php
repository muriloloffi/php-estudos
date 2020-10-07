<?php

namespace Alura\Colecoes1;

require_once './autoload.php';

use Alura\Colecoes1\Alura\ArrayUtils;

//ArrayMerge

$correntistas = [
    'Giovanni',
    'João',
    'Maria',
    'Luis',
    'Luisa',
    'Rafael',
];

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000
];

//  Esta funcao abaixo não serve, pois merge une o ínicio de um array ao final de
//  outro, ajustando os índices para criar a união dos arrays.

//$relacionados = array_merge($correntistas, $saldos);

//  faz um array associativo em que o primeiro parâmetro serão os valores chaves e
//  e o segundo parâmetro os dados:

$relacionados = array_combine($correntistas, $saldos);

echo "<pre>";
var_dump($relacionados);

//  Agora, ao escrever uma chave ainda inexistente no Array "$relacionados",
//  podemos passar um valor para uma nova entrada neste array, por exemplo:

//$relacionados["Matheus"] = 4500;
//var_dump($relacionados);

if (array_key_exists("João", $relacionados)){
    echo "O saldo do João é: {$relacionados["João"]}" . PHP_EOL;
} else {
    echo "Não foi encontrado" . PHP_EOL;
};

$maiores = ArrayUtils::encontrarPessoasComSaldoMaior(3000, $relacionados);

var_dump($maiores);

echo "</pre>";