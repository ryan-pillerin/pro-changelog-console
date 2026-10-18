<?php

namespace App\Modules\Kernel\Hydration\Enums;

use App\Modules\Kernel\Hydration\Contracts\PropertyRule;
use App\Modules\Kernel\Hydration\Rules\MapFieldObject;
use App\Modules\Kernel\Hydration\Rules\SkipMissingField;
// use App\Modules\Kernel\Hydration\Rules\SkipNullField;
use App\Modules\Kernel\Hydration\Rules\TrimString;

enum TransformationRule: string
{
    // Please note that the enum values are descriptive and not used as keys in the transformation process. 
    // The actual transformation logic is defined in the corresponding classes.
    case MAP_OBJECT_FIELD = 'Map field to a certain object like DTO or Value Object';
    case TRIM_STRING = 'Trim whitespace from string values';
    case SKIP_MISSING_FIELD = 'Skip fields that are missing in the source data';
    // case SKIP_NULL_FIELD = 'Skip fields whose value is null';

    public function toRule(): PropertyRule {
        return match ($this) {
            self::MAP_OBJECT_FIELD => app(MapFieldObject::class),
            self::TRIM_STRING => app(TrimString::class),
            self::SKIP_MISSING_FIELD => app(SkipMissingField::class),
            // self::SKIP_NULL_FIELD => app(SkipNullField::class),
        };
    }

    public static function implementAllRules(): array {
        return array_map(fn($rule) => $rule->toRule(), self::cases());
    }
}