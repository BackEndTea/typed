<?php

namespace Spatie\Typed\Types;

use Spatie\Typed\NullableType;
use Spatie\Typed\WrongType;

final class GenericType implements NullableType
{
    use IsNullable;

    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function __invoke($value)
    {
        if (
            ! $value instanceof $this->type
        ) {
            throw WrongType::fromMessage("must be of type {$this->type}");
        }

        return $value;
    }
}
