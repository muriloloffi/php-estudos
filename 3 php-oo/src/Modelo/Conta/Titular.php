<?php

namespace Licao\Banco\Modelo\Conta;

use Licao\Banco\Modelo\Autenticavel;
use Licao\Banco\Modelo\Pessoa;
use Licao\Banco\Modelo\Cpf;
use Licao\Banco\Modelo\Endereco;

class Titular extends Pessoa implements Autenticavel
{
    private Endereco $endereco;

    public function __construct(Cpf $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }
    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaCpf();
    }
    public function recuperaNome(): string
    {
        return $this->nome; 
    }
    // experimentando:
    //
    // public function recuperaEndereco(): string
    // {
    //     $a = $this->endereco->recuperaCidade();
    //     $b = $this->endereco->recuperaBairro();
    //     $c = $this->endereco->recuperaRua();
    //     $d = $this->endereco->recuperaNumero();
    //     $enderecoString = "$a, $b\n$c, $d\n";
    //     return $enderecoString;
    //
    //     Para utilizar este método, comentar a função abaixo deste 
    //     e ajustar os tipos dos parâmetros nas classes que o usam.
    // }
    public function recuperaEndereco(): Endereco
    {
        return $this->endereco;
    }
    public function podeAutenticar(string $senha): bool
    {
        return $senha === 'abcd';
    }
}