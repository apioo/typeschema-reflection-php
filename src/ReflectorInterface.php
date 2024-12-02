<?php

namespace TypeSchema\Reflection;

use TypeSchema\Model;

interface ReflectorInterface
{
    /**
     * @param class-string $class
     * @throws ReflectorException
     */
    public function build(string $class): Model\TypeSchema;

    /**
     * @param array<class-string> $classes
     * @throws ReflectorException
     */
    public function buildAll(array $classes, ?string $root): Model\TypeSchema;
}
