<?php

use Muriloloffi\Doctrine\Entities\Phone;
use Muriloloffi\Doctrine\Entities\Student;
use Muriloloffi\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT student FROM Muriloloffi\\Doctrine\\Entities\\Student student WHERE student.studentId = 1 OR student.studentName = 'Nico Steppat' ORDER BY student.studentName";
$query = $entityManager->createQuery($dql);
$studentList = $query->getResult();

foreach ($studentList as $student) {
    $studentPhones = $student
        ->getPhones()
        ->map(function (Phone $phone) {
            return $phone->getPhoneNumber();
        })
        ->toArray();
    echo "\nStudent ID: {$student->getId()}\nStudent name: {$student->getName()}\n\n";
    echo "Telefones: " . implode(', ', $studentPhones) . "\n\n";
}

// $nico = $studentRepository->find(7);
// echo $nico->getName() . PHP_EOL;

// // $sergioLopes = $studentRepository->findBy([
// //     'studentName' => 'Sergio Lopes' //critério de busca - campo => valor
// // ]);
// // var_dump($sergioLopes);

// $avadaKedavra = $studentRepository->findBy(
//     [], //critério de busca
//     ['studentName' => 'ASC'], //campo => critério de ordenação - 'ASC' crescente e 'DESC' decrescente
//     3, //número de resultados para trazer do banco
//     0 //a partir de qual dado buscar do banco
// );

// var_dump($avadaKedavra);