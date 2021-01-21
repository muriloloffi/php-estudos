<?php

namespace Muriloloffi\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Muriloloffi\Doctrine\Entities\Student;

class StudentRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $query = $this->createQueryBuilder('a')
            ->join('a.phones', 't')
            ->join('a.subjectsEnrolled', 'c')
            ->addSelect('t')
            ->addSelect('c')
            ->getQuery();

        return $query->getResult();
    }
}