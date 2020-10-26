<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use DateTimeImmutable;
use DateTimeInterface;
use PDO;
use PDOStatement;

class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $query = 'SELECT * FROM students;';
        $statement = $this->connection->query($query);

        return $this->hydrateStudentList($statement);
    }

    public function studentsBirthAt(DateTimeInterface $birthDate): array
    {
        $query = 'SELECT * FROM students WHERE birth_date = ?;';
        $prepdStmt = $this->connection->prepare($query);
        $prepdStmt->bindValue(1, $birthDate->format('Y-m-d'));
        $prepdStmt->execute();

        return $this->hydrateStudentList($prepdStmt);
    }

    private function hydrateStudentList(PDOStatement $stmt): array
    {
        $studentDataList = $stmt->fetchAll();
        $studentList = [];

        foreach ($studentDataList as $studentData) {
            $student = new Student(
                $studentData['id'],
                $studentData['student_name'],
                new DateTimeImmutable($studentData['birth_date'])
            );

            // $this->fillPhonesOf($student);
            //quando a execução do método acima retornar,
            //o aluno inserido estará com o telefone relacionado.
            $studentList[] = $student;
        }

        return $studentList;
    }

    // Metódo substituído - comentado para fins de estudo
    // private function fillPhonesOf(Student $student): void
    // {
    //     $sqlQuery = 'SELECT id, area_code, number FROM phones WHERE student_id = ?';
    //     $stmt = $this->connection->prepare($sqlQuery);
    //     $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);
    //     $stmt->execute();

    //     $phoneDataList = $stmt->fetchAll();
    //     foreach ($phoneDataList as $phoneData) {
    //         $phone = new Phone(
    //             $phoneData['id'],
    //             $phoneData['area_code'],
    //             $phoneData['number']
    //         );

    //         $student->addPhone($phone);
    //     }
    // }

    public function save(Student $student): bool
    {
        if ($student->id() === null) {
            return $this->insert($student);
        }

        return $this->update($student);
    }

    private function insert(Student $student): bool
    {
        $query =
        'INSERT INTO students (student_name, birth_date) 
        VALUES (:student_name, :birth_date);';
        $stmt = $this->connection->prepare($query);

        $success = $stmt->execute([
            ':student_name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d'),
        ]);

        if ($success) {
            $student->defineId($this->connection->lastInsertId());
        }

        return $success;
    }

    private function update(Student $student): bool
    {
        $query =
        'UPDATE students 
        SET student_name = :student_name, birth_date = :birth_date 
        WHERE id = :id;';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':name', $student->name());
        $stmt->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $stmt->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function remove(Student $student): bool
    {
        $stmt = $this->connection->prepare(
            'DELETE FROM students WHERE id = ?;'
        );
        $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function studentsWithPhones(): array
    {
        $sqlQuery = 'SELECT students.id,
                            students.student_name,
                            students.birth_date,
                            phones.id AS phone_id,
                            phones.area_code,
                            phones.number
                    FROM students
                    JOIN phones 
                    ON students.id = phones.student_id;';
        $stmt = $this->connection->query($sqlQuery);
        $result = $stmt->fetchAll();
        $studentList = [];

        foreach ($result as $row) {
            if (!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] = new Student(
                    $row['id'],
                    $row['student_name'],
                    new DateTimeImmutable($row['birth_date'])
                );
            }
            $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);
        }

        return $studentList;
    }
}
