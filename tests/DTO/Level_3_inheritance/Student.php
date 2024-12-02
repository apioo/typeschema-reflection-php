<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_3_inheritance;


class Student extends Human implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $studentId = null;
    public function setStudentId(?string $studentId) : void
    {
        $this->studentId = $studentId;
    }
    public function getStudentId() : ?string
    {
        return $this->studentId;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('studentId', $this->studentId);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

