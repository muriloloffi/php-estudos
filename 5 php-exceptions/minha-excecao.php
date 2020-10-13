<?php

class MinhaExcecao extends Exception
{
    public function a(): void
    {
        echo "a";
    }
}

try {
    throw new MinhaExcecao();
} catch (MinhaExcecao $e) {
    //exemplo (rudimentar) de exceção de domínio;
    //métodos criados dentro da exceção personalizada são acessíveis 
    //a partir do tratamento daquela exceção personalizada;
    $e->a();
}

