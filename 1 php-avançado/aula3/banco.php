<?php

function exibeMensagem($mensagem)
{
    echo $mensagem . PHP_EOL;
};

function sacar(array $conta, float $valorASacar) : array
{
    if ($conta['saldo'] <= $valorASacar){
        exibeMensagem("Saldo insuficiente!");
    } else {
        $conta['saldo'] -= $valorASacar;
    }
    return $conta;
}

function depositar(array $conta, float $valorADepositar) : array
{
    if ($valorADepositar > 0){
        $conta['saldo'] += $valorADepositar;
    }
    return $conta;
}

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


foreach ($contasCorrentes as $cpfs => $contas) {
    exibeMensagem (
        $cpfs .' ' 
        .$contas['titular'].' '
        .$contas['saldo']
        .PHP_EOL
    );
}    