<?php

namespace Licao\Banco\Modelo\Funcionario;

use Licao\Banco\Modelo\Pessoa;
use Licao\Banco\Modelo\Cpf;

abstract class Funcionario extends Pessoa
{
    private float $salario;
    
    public function __construct(string $nome, Cpf $cpf, float $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }
    
    public function alteraNome(string $nome): void
    {
        $this->validaNome($nome);
        $this->nome = $nome;
    }
    public function recuperaSalario(): float
    {
        return $this->salario;
    }
    abstract public function calculaBonificacao(): float;
}