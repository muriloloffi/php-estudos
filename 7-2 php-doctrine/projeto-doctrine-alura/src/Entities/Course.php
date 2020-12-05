<?php

namespace Muriloloffi\Doctrine\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Course 
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer", name="course_id")
     */
    private int $courseId;

    /**
     * @Column(type="string")
     */
    private string $courseName;

    /**
     * @ManyToMany(targetEntity="Student", inversedBy="subjectsEnrolled")
     */
    private Collection $enrolledStudents;

    public function __construct()
    {
        $this->enrolledStudents = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->courseId;
    }

    public function getCourseName(): string
    {
        return $this->courseName;
    }

    public function setCourseName(string $name): self
    {
        $this->courseName = $name;
        return $this;
    }

    public function enrollStudent(Student $student): self
    {
        if ($this->enrolledStudents->contains($student)){
            return $this;
        }

        $this->enrolledStudents->add($student);
        $student->enrollSubject($this);

        return $this;
    }

    public function getEnrolledStudents(): ArrayCollection
    {
        return $this->enrolledStudents;
    }

}
