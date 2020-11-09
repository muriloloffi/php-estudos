<?php

use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];

$aluno = $entityManager->getReference(Student::class, $id);
//Monta uma referência de uma entidade que eu já sei a informação do
//campo, sem precisar ir até o banco. Não é interessante em atualização.

$entityManager->remove($aluno);
$entityManager->flush();