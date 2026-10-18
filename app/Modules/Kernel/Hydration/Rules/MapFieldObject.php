<?php

namespace App\Modules\Kernel\Hydration\Rules;

use App\Modules\Kernel\Hydration\Contracts\PropertyRule;
use App\Modules\Kernel\Hydration\Infrastructure\Attributes\MapField;
use ReflectionProperty;

final class MapFieldObject implements PropertyRule
{
    public function apply(string $key, mixed $value, ReflectionProperty $property, object $source): array
    {
        $attributes = $property->getAttributes(MapField::class);

        if ( !empty($attributes) ) {
            $key = $attributes[0]->newInstance()->field_name;
        }

        return [$key, $value, false];
    }
}