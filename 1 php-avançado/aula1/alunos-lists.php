<?php

$alunos = array("João", "Maria", "Dione", "Deivid", "Pedro", "Ana");

// unset($alunos[5]);

echo "Os nomes dos alunos são: ";

for ($i=0; $i< count($alunos); $i++){
  if ($i < count($alunos)-2){
    echo $alunos[$i].", ";
    continue;
  }
  $e = $i;
  echo $alunos[$e]." e ".$alunos[($e+1)] . "." . PHP_EOL;
break;
}
