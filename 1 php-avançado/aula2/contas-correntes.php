<?php

$conta1 = [
    'titular' => 'vinicius',
    'saldo' => 1000
];
$conta2 = [
    'titular' => 'Maria',
    'saldo' => 10000
];
$conta3 = [
    'titular' => 'Alberto',
    'saldo' => 300
];

$contasCorrentes = [$conta1, $conta2, $conta3];

//Arrays associativos: os índices são definidos pelo programador,
//que comumente são Strings;

for ($i = 0; $i < count($contasCorrentes); $i++){
    echo $contasCorrentes[$i]['titular'] . PHP_EOL;
}

