<?php

//Sintaxe abaixo apenas para importações não essenciais:
// include 'funcoes.php';

require_once 'funcoes.php';

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Vinícius',
        'saldo' => 1000
    ], 
    '123.456.789-09' => [
        'titular' => 'Maria',
        'saldo' => 10000
    ], 
    '123.455.678-08' => [
        'titular' => 'Alberto',
        'saldo' => 300
        ]
    ];

$cpf = '123.456.789-09';

$contasCorrentes[$cpf] = sacar($contasCorrentes[$cpf], 500);

$cpf = '123.455.678-08';

$contasCorrentes[$cpf] = depositar($contasCorrentes[$cpf], 950);

unset ($contasCorrentes['123.455.678-08']);

titularComLetrasMaiusculas($contasCorrentes['123.456.789-10']); 


foreach ($contasCorrentes as $cpfs => $contas) {
    ['titular' => $titular, 'saldo' => $saldo] = $contas;
    exibeMensagem (
        "$cpfs $titular $saldo"
        //exibindo mensagem usando Strings complexas
    );
}