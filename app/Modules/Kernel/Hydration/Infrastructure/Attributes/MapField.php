<?php

namespace App\Modules\Kernel\Hydration\Infrastructure\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MapField
{
    public function __construct(
        public readonly string $field_name,
    ) {}
}