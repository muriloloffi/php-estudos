<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try {
        funcao2();
    } catch (RuntimeException | DivisionByZeroError $problema) {
        echo $problema->getMessage() . PHP_EOL;
        echo $problema->getLine() . PHP_EOL;
        echo $problema->getTraceAsString() . PHP_EOL;

        throw new RuntimeException(
            'Exceção foi tratada, mas pega aí',
            1,
            $problema
        );
        echo "Na função 1, eu resolvi o problema da função 2" . PHP_EOL;
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    //Notations, como abaixo, servem para se comunicar com a IDE para
    //facilitar a manutenibilidade do código;
    /**
     * @throws Exception
     */
    echo 'Entrei na função 2' . PHP_EOL;
    $exception = new RuntimeException();
    throw $exception;
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
