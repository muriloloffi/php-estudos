<?php

//Não é um padrão de projeto "factory"!
//O  nome deste padrão de projeto é Static Creation Method!

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionFactory
{
    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';

        $connection = new PDO('sqlite:' . $databasePath);
        $connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        $connection->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );

        return $connection;
    }
}
