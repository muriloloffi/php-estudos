<?php

class Calculadora
{
    public function calculaMedia(array $notas) : ?float
    { 
        $quantidadeDeNotas = sizeof($notas);

        if ($quantidadeDeNotas > 0){
            $soma = 0;
            for($i = 0; $i < $quantidadeDeNotas; $i++){
                $soma = $soma + $notas[$i];
            }
            $media = $soma / $quantidadeDeNotas;
            return $media;
        } else {
            return null;
        }
    }
}