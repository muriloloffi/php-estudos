<?php

require_once './autoload.php';

// Movido para './autoload.php':
//
// spl_autoload_register(function(string $nomeCompletoDaClasse){
//     $caminhoArquivo = str_replace('Licao\\Banco', 'src', $nomeCompletoDaClasse);
//     $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
//     $caminhoArquivo .= '.php';
//     /**
//      * echo $caminhoArquivo;
//      * exit();
//      */
//     echo $caminhoArquivo;
//     exit();
//     if(file_exists($caminhoArquivo)) {
//         require_once $caminhoArquivo;
//     }
// });

use Licao\Banco\Modelo\Conta\{Titular, Conta, ContaCorrente, ContaPoupanca};
use Licao\Banco\Modelo\{Cpf, Endereco};

$endereco = new Endereco('Tubarão', 'Centro', 'Vidal Ramos', '364');
$primeiraConta = new ContaCorrente(new Titular(new Cpf('123.456.789-01'), 'Vinicius Dias', $endereco));
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);
$segundaConta = new ContaCorrente(new Titular(new Cpf('123.456.789-11'), 'Vinicios Dias', $endereco));
$terceiraConta = new ContaCorrente(new Titular(new Cpf('123.456.789-12'), 'Vynicius Dias', $endereco));
$quartaConta = new ContaCorrente(new Titular(new Cpf('123.456.789-13'), 'Vinycius Dias', $endereco));
$quintaConta = new ContaCorrente(new Titular(new Cpf('123.456.789-14'), 'Vinicyus Dias', $endereco));
$sextaConta = new ContaPoupanca(new Titular(new Cpf('999.888.777-12'), 'Lofferson', $endereco));
$nroContas = ContaCorrente::recuperaNumeroDeContas();

var_dump($primeiraConta);

// echo $primeiraConta->saldo . PHP_EOL;
$saldoTempo = $primeiraConta->recuperaSaldo();
echo $nroContas . PHP_EOL;
echo $saldoTempo . PHP_EOL;
echo $segundaConta->recuperaNomeTitular() . PHP_EOL;
unset($quintaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
var_dump($primeiraConta->recuperaEndereco());
$segundaConta->depositar(1000);
$sextaConta->depositar(2000);
$sextaConta->sacar(400);
echo $sextaConta->recuperaSaldo() . PHP_EOL;