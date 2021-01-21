<?php

use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentClass = Student::class;
$dql = "SELECT COUNT(a) FROM $studentClass a";
$query = $entityManager->createQuery($dql);
$totalStudents = $query->getSingleScalarResult();

echo "Total de alunos: " . $totalStudents . PHP_EOL;

