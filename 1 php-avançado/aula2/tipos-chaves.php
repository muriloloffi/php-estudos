<?php

$array = [ 
    1 => 'a',
    '1' => 'b',
    1.5 => 'c'
];

foreach ($array as $item){
    echo $item . PHP_EOL;
}

//PHP armazena somente inteiros e strings como índices de array.
//Qualquer coisa fora disso é convertido.
//Exceto arrays e objetos, que são ilegais.