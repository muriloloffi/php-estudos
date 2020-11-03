<?php

use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$student = new Student();
$student->setName($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//método 'persist' p/ monitorar os atributos definidos no objeto student
$entityManager->persist($student);

//método 'flush' para efetivar alterações no banco
$entityManager->flush();
