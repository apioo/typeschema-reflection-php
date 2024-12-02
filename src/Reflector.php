<?php

namespace TypeSchema\Reflection;

use PSX\Record\Record;
use PSX\Schema\Generator;
use PSX\Schema\ObjectMapper;
use PSX\Schema\Parser;
use PSX\Schema\SchemaManager;
use PSX\Schema\SchemaSource;
use TypeSchema\Model;

class Reflector implements ReflectorInterface
{
    private Parser\Popo $parser;
    private Generator\TypeSchema $generator;
    private ObjectMapper $objectMapper;

    public function __construct()
    {
        $this->parser = new Parser\Popo();
        $this->generator = new Generator\TypeSchema();
        $this->objectMapper = new ObjectMapper(new SchemaManager());
    }

    public function build(string $class): Model\TypeSchema
    {
        try {
            $schema = $this->parser->parse($class);
            $spec = (string) $this->generator->generate($schema);

            return $this->objectMapper->readJson($spec, SchemaSource::fromClass(Model\TypeSchema::class));
        } catch (\Throwable $e) {
            throw new ReflectorException($e->getMessage(), previous: $e);
        }
    }

    public function buildAll(array $classes, ?string $root): Model\TypeSchema
    {
        /** @var Record<Model\DefinitionType> $definitions */
        $definitions = new Record();

        foreach ($classes as $class) {
            $schema = $this->build($class);
            if ($root === null) {
                $root = $schema->getRoot();
            }

            $definitions->putAll($schema->getDefinitions() ?? []);
        }

        $spec = new Model\TypeSchema();
        $spec->setDefinitions($definitions);
        $spec->setRoot($root);
        return $spec;
    }
}
