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

function titularComLetrasMaiusculas(array &$conta)
{
    $conta['titular'] = mb_strtoupper($conta['titular']);
}