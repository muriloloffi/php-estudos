<?php declare(strict_types=1);

namespace Alura\Colecoes0;

require_once './autoload.php';

use Alura\Colecoes0\Alura\ArrayUtils;

$correntistas_e_compras = [
"Giovanni",
 12,
"Maria",
 25,
"Luis",
"Luísa",
"12"
];

echo "<pre>";

var_dump ($correntistas_e_compras);


//Se no método especificar que o primeiro parâmetro é String, a IDE reclama do
//argumento passado ao método, porque percebe que o tipo de dado
//está errado, visto que declarou-se tipos estritos no início do código.

//Experimento pessoal: se for omitido o tipo no parâmetro do método, o 
//comportamento parece ser polimórfico;
ArrayUtils::remover(12, $correntistas_e_compras);

var_dump ($correntistas_e_compras);

echo "</pre>";