<?php

namespace Licao\Banco\Modelo;

trait AcessoPropriedades 
{
    public function __get(string $nomeAtributo)
    {
        $metodo = 'recupera' . ucfirst($nomeAtributo);
        return $this->$metodo();
    }
}

//Para saber mais sobre Traits: //https://www.php.net/manual/en/language.oop5.traits.php