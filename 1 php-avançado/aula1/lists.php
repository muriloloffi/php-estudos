<?php

//Array é um tipo de dado abstrato: uma lista de vários dados;

$idadeList = [21, 23, 19, 25, 30, 41, 18];
$primeiraIdade = $idadeList[0];
$umaIdade = $idadeList[2];

list($idadeVinicius, $idadeJoao, $idadeMaria) = $idadeList;

echo $umaIdade . PHP_EOL;
