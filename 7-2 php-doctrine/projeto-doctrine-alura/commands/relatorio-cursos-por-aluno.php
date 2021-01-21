<?php

use Doctrine\DBAL\Logging\DebugStack;
use Muriloloffi\Doctrine\Entities\Phone;
use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/*This notation enables autocompletion for the student object*/
/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach ($students as $student) {
    $phones = $student->getPhones()->map(function (Phone $phone)
    {
        return $phone->getPhoneNumber();
    })
    ->toArray();

    echo "ID: {$student->getId()}\n";
    echo "Nome: {$student->getName()}\n";
    echo "Telefones: " . implode(", ", $phones) . "\n";

    $courses = $student->getSubjectsEnrolled();

    foreach ($courses as $course) {
        echo "\tID Curso: {$course->getId()}\n";
        echo "\tCurso: {$course->getCourseName()}\n";
        echo "\n";
    }
    echo "\n";
}

echo "\n";
foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'] . "\n";
}
