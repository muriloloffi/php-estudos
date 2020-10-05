<?php

namespace Licao\Banco\Modelo\Funcionario;

use Licao\Banco\Modelo\Funcionario\Funcionario;

class Desenvolvedor extends Funcionario
{
    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario() * 0.05;
    }
}