<?php

namespace App\Modules\Kernel\Hydration\Rules;

use App\Modules\Kernel\Hydration\Contracts\PropertyRule;
use App\Modules\Kernel\Hydration\Enums\MissingField;
use ReflectionProperty;

class SkipMissingField implements PropertyRule
{
    public function apply(string $key, mixed $value, ReflectionProperty $property, object $source): array
    {
        if ( $value instanceof MissingField || $value === MissingField::FIELD ) {
            return [$key, $value, true];
        }
        return [$key, $value, false];
    }
}