<?php

require_once './autoload.php';

use Licao\Banco\Modelo\Cpf;
use Licao\Banco\Modelo\Funcionario\{Desenvolvedor, Diretor, Funcionario, Gerente};
use Licao\Banco\Service\ControladorDeBonificacoes;

$umFuncionario = new Desenvolvedor(
    'Vinicius da S Dias',
    new Cpf('123.444.567-02'),
    1000
);

$umaFuncionaria = new Gerente(
    'Patricia Correa',
    new Cpf('987.444.321-03'),
    3000
);

$umDiretor = new Diretor(
    'Ana Paula', 
    new Cpf('666.666.666-66'),
    5000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);

echo $controlador->recuperaTotal(). PHP_EOL;