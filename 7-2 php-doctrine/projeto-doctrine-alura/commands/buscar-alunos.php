<?php

use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/**
 * @var Student[] $studentList
 */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "\nStudent ID: {$student->getId()}\nStudent name: {$student->getName()}\n\n";
}

$nico = $studentRepository->find(7);
echo $nico->getName() . PHP_EOL;

$sergioLopes = $studentRepository->findBy([
    'studentName' => 'Sergio Lopes'
]);
var_dump($sergioLopes);