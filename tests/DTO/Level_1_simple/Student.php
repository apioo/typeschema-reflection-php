<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_1_simple;


class Student implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?int $age = null;
    protected ?bool $active = null;
    protected ?float $score = null;
    protected ?Faculty $faculty = null;
    public function setFirstName(?string $firstName) : void
    {
        $this->firstName = $firstName;
    }
    public function getFirstName() : ?string
    {
        return $this->firstName;
    }
    public function setLastName(?string $lastName) : void
    {
        $this->lastName = $lastName;
    }
    public function getLastName() : ?string
    {
        return $this->lastName;
    }
    public function setAge(?int $age) : void
    {
        $this->age = $age;
    }
    public function getAge() : ?int
    {
        return $this->age;
    }
    public function setActive(?bool $active) : void
    {
        $this->active = $active;
    }
    public function getActive() : ?bool
    {
        return $this->active;
    }
    public function setScore(?float $score) : void
    {
        $this->score = $score;
    }
    public function getScore() : ?float
    {
        return $this->score;
    }
    public function setFaculty(?Faculty $faculty) : void
    {
        $this->faculty = $faculty;
    }
    public function getFaculty() : ?Faculty
    {
        return $this->faculty;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('firstName', $this->firstName);
        $record->put('lastName', $this->lastName);
        $record->put('age', $this->age);
        $record->put('active', $this->active);
        $record->put('score', $this->score);
        $record->put('faculty', $this->faculty);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

