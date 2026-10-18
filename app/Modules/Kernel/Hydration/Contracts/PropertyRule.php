<?php

namespace App\Modules\Kernel\Hydration\Contracts;

use ReflectionProperty;

interface PropertyRule
{
    public function apply(string $key, mixed $value, ReflectionProperty $property, object $source): array;
}