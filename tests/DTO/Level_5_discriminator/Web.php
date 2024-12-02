<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_5_discriminator;


class Web extends Location implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $url = null;
    public function setUrl(?string $url) : void
    {
        $this->url = $url;
    }
    public function getUrl() : ?string
    {
        return $this->url;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('url', $this->url);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

