<?php

$contador_impares=1;
$inicioIntervalo = 0;
$fimIntervalo = 100;
echo "Seguem os números ímpares de $inicioIntervalo até $fimIntervalo:" . PHP_EOL;
for ($numero=0; $numero<=100; $numero++){
  if($numero%2==0){
    continue;
  }
  echo "O $contador_impares"."º"." número ímpar é: $numero" . PHP_EOL;
  $contador_impares++;
}