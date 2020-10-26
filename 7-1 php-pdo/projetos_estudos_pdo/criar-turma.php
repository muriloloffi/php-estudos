<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionFactory;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionFactory::createConnection();
$studentRepository = new PdoStudentRepository($connection);

// realizo processos de definição da turma: matéria, curso, ch

// insiro os alunos da turma: alunos (apenas se todos forem com sucesso)


$connection->beginTransaction();

try {
    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeImmutable('1985-05-01')
    );

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeImmutable('1985-05-01'),
    );

    $studentRepository->save($anotherStudent);
    
} catch (PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}

$connection->commit(); // ->rollback(); // para cancelar as alterações;
