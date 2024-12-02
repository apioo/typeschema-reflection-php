<?php

declare(strict_types = 1);

namespace TypeSchema\Reflection\Tests\DTO\Level_4_generic;

/**
 * @extends Map<Student>
 */
class StudentMap extends Map implements \JsonSerializable, \PSX\Record\RecordableInterface
{
}

