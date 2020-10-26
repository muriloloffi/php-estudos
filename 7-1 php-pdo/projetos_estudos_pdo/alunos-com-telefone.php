<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionFactory;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionFactory::createConnection();
$repository = new PdoStudentRepository($connection);

/** @var \Alura\Pdo\Domain\Model\Student[] $studentList */
$studentList = $repository->studentsWithPhones();

echo $studentList[1]->phones()[0]->formattedPhone();
var_dump($studentList);