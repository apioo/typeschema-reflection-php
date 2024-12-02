<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_1_format;


class Student implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?\PSX\DateTime\LocalDate $date = null;
    protected ?\PSX\DateTime\LocalDateTime $dateTime = null;
    protected ?\PSX\DateTime\LocalTime $time = null;
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
    public function setDate(?\PSX\DateTime\LocalDate $date) : void
    {
        $this->date = $date;
    }
    public function getDate() : ?\PSX\DateTime\LocalDate
    {
        return $this->date;
    }
    public function setDateTime(?\PSX\DateTime\LocalDateTime $dateTime) : void
    {
        $this->dateTime = $dateTime;
    }
    public function getDateTime() : ?\PSX\DateTime\LocalDateTime
    {
        return $this->dateTime;
    }
    public function setTime(?\PSX\DateTime\LocalTime $time) : void
    {
        $this->time = $time;
    }
    public function getTime() : ?\PSX\DateTime\LocalTime
    {
        return $this->time;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('firstName', $this->firstName);
        $record->put('lastName', $this->lastName);
        $record->put('date', $this->date);
        $record->put('dateTime', $this->dateTime);
        $record->put('time', $this->time);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

