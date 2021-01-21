<?php

use Muriloloffi\Doctrine\Entities\Course;
use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentId = $argv[1];
$courseId = $argv[2];

$course = $entityManager->find(Course::class, $courseId);
$student = $entityManager->find(Student::class, $studentId);

$student->enrollSubject($course);

$entityManager->flush();
