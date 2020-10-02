<?php

$contasCorrentes = [
    1234567910 => [
        'titular' => 'Vinícius',
        'saldo' => 1000
    ], 
    1234567899 => [
        'titular' => 'Maria',
        'saldo' => 10000
    ], 
    1234556788 => [
        'titular' => 'Alberto',
        'saldo' => 300
    ]
];

foreach ($contasCorrentes as $cpf => $conta) {
  echo $conta['titular'] . PHP_EOL; 
}