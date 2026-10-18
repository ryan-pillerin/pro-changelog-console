<?php

namespace App\Modules\Kernel\Hydration\Rules;

use App\Modules\Kernel\Hydration\Contracts\PropertyRule;
use ReflectionProperty;

final class SkipNullField implements PropertyRule
{
    public function apply(string $key, mixed $value, ReflectionProperty $property, object $source): array
    {
        if ($value === null) {
            return [$key, $value, true];
        }

        return [$key, $value, false];
    }
}