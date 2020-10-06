<?php

$nomes = "Giovanni, João, Maria, Pedro";

$arr_nomes = explode(", ", $nomes);

foreach ($arr_nomes as $nome){
    echo "<p>Olá {$nome}</p>";
}

$nomesJuntos = implode(", ", $arr_nomes);

echo $nomesJuntos;