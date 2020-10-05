<?php

namespace Licao\Banco\Modelo;

interface Autenticavel
{
    public function podeAutenticar(string $senha): bool;
}