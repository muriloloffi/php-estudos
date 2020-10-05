<?php

namespace Licao\Banco\Modelo\Funcionario;

use Licao\Banco\Modelo\Funcionario\Funcionario;

class Desenvolvedor extends Funcionario
{
    public function sobeDeNivel(): void
    {
        $this->recebeAumento ($this->recuperaSalario() * 0.75);
    }

    public function recebeAumento(float $valorAumento): void
{
    if ($valorAumento < 0) {
        echo "Aumento deve ser positivo";
        return;
    }

    $this->salario += $valorAumento;
}

    public function calculaBonificacao(): float
    {
        return $this->recuperaSalario() * 0.05;
    }
}