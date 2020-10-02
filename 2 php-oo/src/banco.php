<?php

require_once './Conta.php';
require_once './Titular.php';
require_once './Cpf.php';

$primeiraConta = new Conta(new Titular(new Cpf('123.456.789-01'), 'Vinicius Dias'));
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);
$segundaConta = new Conta(new Titular(new Cpf('123.456.789-11'), 'Vinicios Dias'));
$terceiraConta = new Conta(new Titular(new Cpf('123.456.789-12'), 'Vynicius Dias'));
$quartaConta = new Conta(new Titular(new Cpf('123.456.789-13'), 'Vinycius Dias'));
$quintaConta = new Conta(new Titular(new Cpf('123.456.789-14'), 'Vinicyus Dias'));
$nroContas = Conta::recuperaNumeroDeContas();

var_dump($primeiraConta);

// echo $primeiraConta->saldo . PHP_EOL;
$saldoTempo = $primeiraConta->recuperarSaldo();
echo $nroContas . PHP_EOL;
echo $saldoTempo . PHP_EOL;
echo $segundaConta->recuperaNomeTitular() . PHP_EOL;
unset($quintaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;