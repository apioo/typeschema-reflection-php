<?php

namespace TypeSchema\Reflection\Tests;

use PHPUnit\Framework\TestCase;
use PSX\Schema\ObjectMapper;
use PSX\Schema\SchemaManager;
use TypeSchema\Reflection\Reflector;

class ReflectorTest extends TestCase
{
    private ObjectMapper $objectMapper;

    public function setUp(): void
    {
        $this->objectMapper = new ObjectMapper(new SchemaManager());
    }

    public function testLevel1Format(): void
    {
        $spec = (new Reflector())->build(DTO\Level_1_format\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_1_format.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel1Simple(): void
    {
        $spec = (new Reflector())->build(DTO\Level_1_simple\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_1_simple.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2ArrayInlineReference(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_array_inline_reference\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_array_inline_reference.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2ArrayInlineString(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_array_inline_string\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_array_inline_string.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2ArrayReference(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_array_reference\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_array_reference.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2ArrayString(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_array_string\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_array_string.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2MapInlineReference(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_map_inline_reference\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_map_inline_reference.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2MapInlineString(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_map_inline_string\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_map_inline_string.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2MapReference(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_map_reference\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_map_reference.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel2MapString(): void
    {
        $spec = (new Reflector())->build(DTO\Level_2_map_string\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_2_map_string.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel3Inheritance(): void
    {
        $spec = (new Reflector())->build(DTO\Level_3_inheritance\Student::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_3_inheritance.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel4Generic(): void
    {
        $spec = (new Reflector())->build(DTO\Level_4_generic\StudentMap::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_4_generic.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }

    public function testLevel5Discriminator(): void
    {
        $spec = (new Reflector())->build(DTO\Level_5_discriminator\Human::class);

        $actual = $this->objectMapper->writeJson($spec);
        $expect = file_get_contents(__DIR__ . '/resources/level_5_discriminator.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual);
    }
}
