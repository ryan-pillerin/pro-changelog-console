<?php

namespace App\Modules\Kernel\Hydration\Rules;

use App\Modules\Kernel\Hydration\Contracts\PropertyRule;
use ReflectionProperty;

final class TrimString implements PropertyRule
{
    public function apply(string $key, mixed $value, ReflectionProperty $property, object $source): array
    {
        if (is_string($value)) {
            $value = preg_replace('/\s+/', ' ', trim($value));
        }

        return [$key, $value, false];
    }
}