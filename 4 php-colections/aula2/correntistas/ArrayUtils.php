<?php declare(strict_types=1);


class ArrayUtils
{
    //Static pq não vai precisar instanciar a classe pra usar o método.
    public static function remover(string $elemento, array &$array)
    {
        $posicao = array_search($elemento, $array, true);
        if(is_int($posicao)) {
            unset($array[$posicao]);
        } else {
            echo "Não foi encontrado no array";
        }
    }
}