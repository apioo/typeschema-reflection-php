<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_5_discriminator;


class World extends Location implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $lat = null;
    protected ?string $long = null;
    public function setLat(?string $lat) : void
    {
        $this->lat = $lat;
    }
    public function getLat() : ?string
    {
        return $this->lat;
    }
    public function setLong(?string $long) : void
    {
        $this->long = $long;
    }
    public function getLong() : ?string
    {
        return $this->long;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('lat', $this->lat);
        $record->put('long', $this->long);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

