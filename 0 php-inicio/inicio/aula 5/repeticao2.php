<?php

for ($contador = 1; $contador <= 10; $contador++){
  if ($contador <= 5){
    echo "$contador é um valor muito pequeno." . PHP_EOL;
    continue;
  }
  echo "#$contador" . PHP_EOL;
}

$saida0 = 'c';
$saida1 = intval ($saida0);

$stdin = fopen('php://stdin', 'r');
while (1){
$key = fgetc($stdin);
  if ( $key == $saida0 ){
    echo "ferrou \n";
    break;
  }
}

while ($contador <= 20){
  echo "Contador estourou. Valor: XX$contador" . PHP_EOL;
  $contador++;
}