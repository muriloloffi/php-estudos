<?php

require_once './autoload.php';

use Licao\Banco\Modelo\Cpf;
use Licao\Banco\Modelo\Funcionario\{Funcionario, Gerente};
use Licao\Banco\Service\ControladorDeBonificacoes;

$umFuncionario = new Funcionario(
    'Vinicius da S Dias',
    new Cpf('123.444.567-02'),
    'Desenvolvedor',
    1000
);

$umaFuncionaria = new Gerente(
    'Patricia Correa',
    new Cpf('987.444.321-03'),
    'Gerente',
    3000
);

$umDiretor = new Diretor(
    'Ana Paula', 
    new Cpf('666.666.666-66'),
    'Diretor', 
    5000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);

echo $controlador->recuperaTotal(). PHP_EOL;