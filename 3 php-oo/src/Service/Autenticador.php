<?php

namespace Licao\Banco\Service;

use Licao\Banco\Modelo\Autenticavel;

class Autenticador
{
    public function tentaLogin(Autenticavel $autenticavel, string $senha): void
    {
        if ($autenticavel->podeAutenticar($senha)){
            echo "Ok. Usuário logado no sistema";
        } else {
            echo "Ops. Senha incorreta";
        }
    }
}