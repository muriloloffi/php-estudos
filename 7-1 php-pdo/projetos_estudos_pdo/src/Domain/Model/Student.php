<?php

namespace Alura\Pdo\Domain\Model;

use DateTimeInterface;
use DomainException;

class Student
{
    private ?int $id;
    private string $studentName;
    private DateTimeInterface $birthDate;
    /** @var Phone[] */
    private array $phones = [];

    public function __construct(?int $id, string $studentName, DateTimeInterface $birthDate)
    {
        $this->id = $id;
        $this->studentName = $studentName;
        $this->birthDate = $birthDate;
    }

    public function defineId(int $id): void
    {
        if (!is_null($this->id)) {
            throw new DomainException('Você só pode definir o ID uma vez');
        }

        $this->id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->studentName;
    }

    public function changeName(string $newName): void
    {
        $this->studentName = $newName;
    }

    public function birthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones[] = $phone;
    }

    /** @return Phone[] */
    public function phones(): array
    {
        return $this->phones;
    }

    public function age(): int
    {
        return $this->birthDate
            ->diff(new \DateTimeImmutable())
            ->y;
    }
}
