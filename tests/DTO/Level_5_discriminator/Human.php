<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_5_discriminator;


class Human implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?Location $location = null;
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
    public function setLocation(?Location $location) : void
    {
        $this->location = $location;
    }
    public function getLocation() : ?Location
    {
        return $this->location;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('firstName', $this->firstName);
        $record->put('lastName', $this->lastName);
        $record->put('location', $this->location);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

