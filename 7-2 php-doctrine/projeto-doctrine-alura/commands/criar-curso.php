<?php

use Muriloloffi\Doctrine\Entities\Course;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course();
$course->setCourseName($argv[1]);

$entityManager->persist($course);
$entityManager->flush();
