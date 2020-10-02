<?php

namespace Licao\Banco\Modelo;

class Cpf
{
    private string $cpf;
    private static int $identidades = 0;

    public function __construct(string $cpf)
    {   
        $this->validaCpf($cpf);
        $this->cpf = $cpf;

        self::$identidades++;
    }
    public function __destruct()
    {
        self::$identidades--;
    }
    public function recuperaCpf(): string
    {
        return $this->cpf;
    }
    private function validaCpf(string $numero)
    {
        $numero = filter_var($numero, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($numero === false) {
            echo "Cpf inválido";
            exit();
        }
    }
}