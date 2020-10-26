<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionFactory;

require_once 'vendor/autoload.php';

$pdo = ConnectionFactory::createConnection();

$student = new Student(
    null, 
    'Vinicius Dias', 
    new DateTimeImmutable('1997-10-15'));

$sqlInsert = "INSERT INTO students (
    student_name, 
    birth_date) VALUES (
        '{$student->name()}',
        '{$student->birthDate()->format('Y-m-d')}');";

var_dump($pdo->exec($sqlInsert)); 
//retornará o número de registros 'manipulados'
