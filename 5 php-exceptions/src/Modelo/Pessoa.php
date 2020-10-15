<?php

namespace Alura\Banco\Modelo;

use Alura\Banco\Modelo\Conta\NomeInvalidoException;

abstract class Pessoa
{
    use AcessoPropriedades;

    protected string $nome;
    private CPF $cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        $this->defineNome($nome);
        $this->cpf = $cpf;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumero();
    }

    final protected function defineNome(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            throw new NomeInvalidoException($nomeTitular);
        }
        $this->nome = $nomeTitular;
    }
}
