<?php

namespace Muriloloffi\Doctrine\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity(repositoryClass="Muriloloffi\Doctrine\Repository\StudentRepository")
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
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private Collection $phones;

    /**
     * @ManyToMany(targetEntity="Course", inversedBy="enrolledStudents")
     * @JoinTable(name="student_courseclass", 
     *      joinColumns={@JoinColumn(name="student_id", referencedColumnName="student_id")},
     *      inverseJoinColumns={@JoinColumn(name="group_id", referencedColumnName="course_id")}
     *      )
     */
    private Collection $subjectsEnrolled;


    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->subjectsEnrolled = new ArrayCollection();
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

    public function enrollSubject(Course $course): self
    {
        if ($this->subjectsEnrolled->contains($course)){
            return $this;
        }

        $this->subjectsEnrolled->add($course);
        $course->enrollStudent($this);

        return $this;
    }

    /**
     * @return Course[]
     */
    public function getSubjectsEnrolled(): Collection
    {
        return $this->subjectsEnrolled;
    }

}
