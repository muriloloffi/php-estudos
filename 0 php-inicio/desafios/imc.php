<?php

$altura = 1.92;
$peso = 83;
$imc=$peso/($altura**2);

echo "O IMC do usuário é: ".$imc. PHP_EOL;

if ($imc < 18.5) {
  echo "abaixo";
} elseif ($imc < 25) {
  echo "dentro";
} else {
  echo "acima";
}

echo " do recomendado" . PHP_EOL;