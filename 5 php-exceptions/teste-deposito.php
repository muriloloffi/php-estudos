<?php

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';
try{
    $contaCorrente = new ContaCorrente(
        new Titular(
            new CPF('596.485.374-01'), 
            'Vinicius Dias', 
            new Endereco('Cidade de Sá','Centro','rua Direta', 333)
            )
        );
    } catch (Exception $exception) {
        echo "Houve um erro ao criar a conta." . PHP_EOL;
        echo $exception->getMessage();
        exit();
    }
    
    try{
        $contaCorrente->deposita(100);
    } catch (InvalidArgumentException $exception) {
        echo "Valor a depositar precisa ser positivo." . PHP_EOL;
    }