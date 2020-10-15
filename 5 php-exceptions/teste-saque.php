<?php

use Alura\Banco\Modelo\Conta\{ContaPoupanca, ContaCorrente, SaldoInsuficienteException, Titular};
use Alura\Banco\Modelo\{CPF, Endereco};

require_once 'autoload.php';
try{
    $conta = new ContaPoupanca(
        new Titular(
            new CPF('123.456.789-10'),
            'Vinicius Dias',
            new Endereco('Petrópolis', 'bairro Teste', 'Rua lá', '37')
        )
    );
} catch (Exception $exception) {
    echo "Houve um erro ao criar a conta.";
    echo $exception->getMessage();
}

$conta->deposita(600);

try{
    $conta->saca(-100);
} catch (Exception $exception) {
    echo "Operação de saque não permitida." . PHP_EOL;
    echo $exception->getMessage();
}
echo "Saldo: {$conta->recuperaSaldo()}" . PHP_EOL;
