<?php

//Variáveis abaixo devem ser assumidas para um ambiente de homologação
//Valores booleanos devem estar invertidos em um ambiente de produção

error_reporting(E_ALL); //sem esta variável, o PHP não mostra todos os erros
ini_set('display_errors', 1);
ini_set('log_errors', 0);
ini_set('error_log', '/var/log/minha-aplicacao-banco');

//Todas as configurações acima devem estar na configuração 'php.ini'.

echo @$arr[13]; //@ é operador de supressão de erro. NUNCA UTILIZAR!

//ao invés disto, utilizar um error_handler;

//um error_handler pode ser utilizado para tratar erros
//legados do PHP. Exemplo de utilização:

//Recebe uma função anônima como parâmetro,
//que é uma função sem nome.
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    switch ($errno) {
        case E_WARNING:
            echo "Aviso: Isso é perigoso";
        break;
        case E_NOTICE:
            echo "Melhor não fazer isso";
        break;
    }
});

echo $variavel;
echo $array[12];



echo CONSTANTE . PHP_EOL;