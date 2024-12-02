<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_2_array_inline_reference;


class Student implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?int $age = null;
    /**
     * @var array<StudentProperty>|null
     */
    protected ?array $properties = null;
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
    /**
     * @param array<StudentProperty>|null $properties
     */
    public function setProperties(?array $properties) : void
    {
        $this->properties = $properties;
    }
    /**
     * @return array<StudentProperty>|null
     */
    public function getProperties() : ?array
    {
        return $this->properties;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('firstName', $this->firstName);
        $record->put('lastName', $this->lastName);
        $record->put('age', $this->age);
        $record->put('properties', $this->properties);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

