<?php

namespace Muriloloffi\Doctrine\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer", name="student_id")
     */
    private int $studentId;

    /**
     * @Column(type="string")
     */
    private string $studentName;

    /**
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"})
     */
    private Collection $phones;


    public function __construct()
    {
        $this->phones = new ArrayCollection();
    }


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
    
    public function addPhone(Phone $phone): self
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
        return $this;
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

}
