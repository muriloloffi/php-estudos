<?php

namespace Alura\Banco\Modelo;

use InvalidArgumentException;

final class CPF
{
    private string $numero;

    public function __construct(string $numero)
    {
        $numero = filter_var($numero, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($numero === false) {
            $mensagem = "O CPF $numero é inválido.";
            throw new InvalidArgumentException($mensagem);
        }
        $this->numero = $numero;
    }

    public function recuperaNumero(): string
    {
        return $this->numero;
    }
}
