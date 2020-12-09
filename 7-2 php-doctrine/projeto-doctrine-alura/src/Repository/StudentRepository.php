<?php

namespace Muriloloffi\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Muriloloffi\Doctrine\Entities\Student;

class StudentRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $studentClass = Student::class;
        $entityManager = $this->getEntityManager();
        $dql = "SELECT student, phones, courses FROM $studentClass student JOIN student.phones phones JOIN student.subjectsEnrolled courses";
        $query = $entityManager->createQuery($dql);

        return $query->getResult();
    }
}