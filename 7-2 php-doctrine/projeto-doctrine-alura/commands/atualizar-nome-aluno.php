<?php

use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$newNome = $argv[2];

//Usando apenas o find, o Doctrine já mantém a instância da classe
//em observação. Caso alterarmos algum atributo, basta chamar o método
//flush, que a alteração será persistida no BD. P.s. Isso é mto bom!
$student = $entityManager->find(Student::class, $id);
$student->setName($newNome);

$entityManager->flush();
