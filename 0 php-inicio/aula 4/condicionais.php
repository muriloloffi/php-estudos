<?php

$idade = 18;
$pessoas = 2;

echo "Você só pode entrar se tiver mais do que 18 anos." . PHP_EOL;

if ($idade >= 18){
  echo "Você tem $idade anos. Pode entrar." . PHP_EOL;
} elseif ($pessoas >= 2 && $idade >= 16){
  echo "Você está acompanhado, pode entrar!";
  } else {
  echo "Você é de menor, não pode entrar!" . PHP_EOL;
}