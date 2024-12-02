<?php

namespace TypeSchema\Reflection;

class ReflectorException extends \Exception
{
    public function __construct(string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
