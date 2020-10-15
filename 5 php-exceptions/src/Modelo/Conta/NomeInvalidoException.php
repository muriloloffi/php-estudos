<?php

namespace Alura\Banco\Modelo\Conta;

use DomainException;

class NomeInvalidoException extends DomainException
{
    public function __construct(string $nome)
    {
        $mensagem = "O nome {$nome} é muito curto.".PHP_EOL;

        parent::__construct($mensagem);
    }
}