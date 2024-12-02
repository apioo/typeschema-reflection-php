<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_4_generic;


class Student implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?int $matricleNumber = null;
    public function setMatricleNumber(?int $matricleNumber) : void
    {
        $this->matricleNumber = $matricleNumber;
    }
    public function getMatricleNumber() : ?int
    {
        return $this->matricleNumber;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('matricleNumber', $this->matricleNumber);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

