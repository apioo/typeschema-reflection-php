<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_2_array_reference;


class StudentProperty implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $name = null;
    protected ?string $value = null;
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setValue(?string $value) : void
    {
        $this->value = $value;
    }
    public function getValue() : ?string
    {
        return $this->value;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('name', $this->name);
        $record->put('value', $this->value);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

