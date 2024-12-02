<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_5_discriminator;

use PSX\Schema\Attribute\DerivedType;
use PSX\Schema\Attribute\Discriminator;

#[Discriminator('type')]
#[DerivedType(Web::class, 'web')]
#[DerivedType(World::class, 'world')]
abstract class Location implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $type = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('type', $this->type);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

