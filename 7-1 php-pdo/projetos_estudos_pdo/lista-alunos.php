<?php

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionFactory;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionFactory::createConnection();
$repository = new PdoStudentRepository($pdo);
$studentList = $repository->allStudents();

var_dump($studentList);

// $statement = $pdo->query('SELECT * FROM phones;');

// // Exibe apenas os dados da coluna indicada
// // var_dump($statement->fetchColumn(1)); exit();

// $studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
// $studentList = [];

// // Caso queiramos pegar um único, podemos usar:
// // //
// // $statement = $pdo->query('SELECT * FROM students WHERE id = 1;');
// // $studentData = $statement->fetch(PDO::FETCH_ASSOC);
// // var_dump($studentData); exit();


// // Ao buscar em uma tabela muito grande, que pode esgotar a memória
// // com instâncias de objetos recuperados desta tabela, utiliza-se:
// // //
// // while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)){
// //     $student = new Student(
// //         $studentData['id'],
// //         $studentData['student_name'],
// //         new DateTimeImmutable($studentData['birth_date'])
// //     );
// // }
// // //
// // exit();


// foreach ($studentDataList as $studentData) {
//     $studentList[] = new Student(
//         $studentData['id'],
//         $studentData['student_name'],
//         new DateTimeImmutable($studentData['birth_date'])
//     );
// }

// var_dump($studentList);

// // Consulta lista de alunos.
// // $phoneDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
// // $phoneList = [];

// // foreach ($phoneDataList as $phoneData) {
// //     $phoneList[] = new Phone(
// //         $phoneData['id'],
// //         $phoneData['area_code'],
// //         $phoneData['number']
// //     );
// // }
// // var_dump($phoneList);
// // exit();
