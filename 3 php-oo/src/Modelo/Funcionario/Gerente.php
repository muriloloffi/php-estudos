<?php

namespace Licao\Banco\Modelo\Funcionario;

use Licao\Banco\Modelo\Autenticavel;
use Licao\Banco\Modelo\Funcionario\Funcionario;

class Gerente extends Funcionario implements Autenticavel
{
    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario();
    }

    public function podeAutenticar(string $senha): bool
    {
        return $senha === '4321';
    }
}