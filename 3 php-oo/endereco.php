<?php

require_once 'autoload.php';

use Licao\Banco\Modelo\Endereco;

$umEndereco = new Endereco(
    'São João',
    'bairro qualquer',
    'Rua dos prazeres',
    '70a'
);

echo $umEndereco->rua . PHP_EOL;

$umEndereco->rua = "Rua dos perdizes";

echo $umEndereco->rua . PHP_EOL;

exit();