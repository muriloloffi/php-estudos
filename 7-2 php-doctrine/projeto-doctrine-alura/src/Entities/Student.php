<?php

namespace Muriloloffi\Doctrine\Entities;

/**
 * @Entity
 */

class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $studentId;
    /**
     * @Column(type="string")
     */
    private $studentName;


    public function getId(): int
    {
        return $this->studentId;
    }

    public function getName(): string
    {
        return $this->studentName;
    }

    public function setName(string $thisName): self
    {
        $this->studentName = $thisName;
        return $this;
    }
}
