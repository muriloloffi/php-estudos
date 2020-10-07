<?php

namespace Alura\Colecoes1\Alura;


class ArrayUtils
{
    //Static pq não vai precisar instanciar a classe pra usar o método.
    public static function remover(string $elemento, array &$array) : void
    {
        $posicao = array_search($elemento, $array, true);
        if(is_int($posicao)) {
            unset($array[$posicao]);
        } else {
            echo "Não foi encontrado no array";
        }
    }
    public static function encontrarPessoasComSaldoMaior(int $saldo, array $array) : array
    {
        $correntistasComSaldoMaior = array();
        foreach($array as $key => $valor){
            if ($valor > $saldo){
                $correntistasComSaldoMaior[] = $key;
            }
        }
        return $correntistasComSaldoMaior;
    }
}