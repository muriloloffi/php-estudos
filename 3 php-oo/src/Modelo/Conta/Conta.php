<?php

namespace Licao\Banco\Modelo\Conta;

use Licao\Banco\Modelo\Conta\Titular;
use Licao\Banco\Modelo\Endereco;

abstract class Conta //boa prática nome de classe com letra Maiúscula
{
    //definir dados da conta
    //essencial: cpf, nome, saldo
    private Titular $titular; //declaração private ajuda a manter um estado consistente
    private float $saldo;
    private static int $numeroDeContas = 0; //static "característica da classe" objeto não recebe

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0.0;

        //Conta::$numeroDeContas++; 
        //ou pode ser como abaixo.
        self::$numeroDeContas++; //self = equivalente a $this para atributo da classe
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar) : void
    {   
        $tarifaSaque = $valorASacar*$this->percentualTarifa();
        $totalSaque = $valorASacar + $tarifaSaque;
        if ($totalSaque > $this->saldo) {
            echo "Saldo indisponível.";
            return;
        }

        $this->saldo -= $totalSaque;
    }
    public function depositar(float $valorADepositar) : void
    {
        if($valorADepositar < 0){
            echo "Valor precisa ser positivo.";
            return;
        }
        $this->saldo += $valorADepositar;
    
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }
    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }
    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }
    public function recuperaEndereco(): Endereco
    {
        return $this->titular->recuperaEndereco();
    }

    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
    abstract protected function percentualTarifa(): float;
}