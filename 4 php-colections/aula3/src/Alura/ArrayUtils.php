<?php declare(strict_types=1);

namespace Alura\Colecoes0\Alura;


class ArrayUtils
{
    //Static pq não vai precisar instanciar a classe pra usar o método.
    //Experimento pessoal: se for omitido o tipo no parâmetro do método, o 
    //comportamento parece ser polimórfico;
    public static function remover($elemento, array &$array)
    {
        $posicao = array_search($elemento, $array, true);
        if(is_int($posicao)) {
            unset($array[$posicao]);
        } else {
            echo "Não foi encontrado no array";
        }
    }
}