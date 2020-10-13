<?php

namespace Alura\Banco\Modelo\Conta;

use DomainException;

class SaldoInsuficienteException extends DomainException
{
    public function __construct(float $valorSaque, float $saldoAtual)
    {
        $mensagem = "Você tentou sacar {$valorSaque}, mas tem apenas"
                    ." {$saldoAtual} em conta.".PHP_EOL;
        
        parent::__construct($mensagem);
        //exception personalizada recebe o parâmetro do método que falhou
        //e devolve um tratamento personalizado. 
    }
}