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
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $studentName;

    /**
     * @OneToMany(targetEntity="Phone", mappedBy="Student")
     */
    private $phones; //deixar sem tipo pois o tipo do objeto 
                     //será definido depois


    public function __construct()
    {
        $this->phones = new ArrayCollection();
    }


    public function getId(): int
    {
        return $this->id;
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
    
    public function addPhone(Phone $phone)
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
