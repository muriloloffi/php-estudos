<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionFactory;

require_once 'vendor/autoload.php';

$pdo = ConnectionFactory::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1,4,PDO::PARAM_INT);

var_dump($preparedStatement->execute());