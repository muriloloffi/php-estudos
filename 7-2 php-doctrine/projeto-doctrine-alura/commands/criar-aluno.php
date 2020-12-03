<?php

use Muriloloffi\Doctrine\Entities\Phone;
use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$student = new Student();
$student->setName($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $phoneNumberInput = $argv[$i];
    $phone = new Phone();
    $phone->setPhoneNumber($phoneNumberInput);

    $student->addPhone($phone);
}

//método 'persist' p/ monitorar os atributos definidos no objeto student
$entityManager->persist($student);

//método 'flush' para efetivar alterações no banco
$entityManager->flush();
