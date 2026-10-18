<?php

namespace App\Modules\Kernel\Hydration\Infrastructure;

use App\Modules\Kernel\Hydration\Contracts\Hydrator;
use App\Modules\Kernel\Hydration\Enums\TransformationRule;
use Illuminate\Support\Collection;
use ReflectionClass;

/**
 * This is a hydrator that uses reflection to extract the properties of an object and apply transformation rules to them. 
 * It returns a collection of the transformed data.
 * 
 * Note: This class is final and close for modification, but open for extension through the use of transformation rules.
 */
final class ReflectionHydrator implements Hydrator
{
    public function hydrate(object $object, array $rules = []): Collection
    {
        $data = [];
        $reflection_class = new ReflectionClass($object);

        $active_rules = empty($rules)
            ? TransformationRule::implementAllRules()
            : array_map(
                fn(TransformationRule $rule) => $rule->toRule(),
                $rules
            );

        foreach ( $reflection_class->getProperties() as $property ) {
            $field_name = $property->getName();

            if ( !$property->isInitialized($object) ) {
                continue;
            }

            $key = $field_name;
            $value = $property->getValue($object);
            $should_include = true;

            foreach ( $active_rules as $rule ) {
                [$key, $value, $should_skip] = $rule->apply($key, $value, $property, $object);

                if ( $should_skip ) {
                    $should_include = false;
                    break;
                }
            }

            if ( $should_include ) {
                $data[$key] = $value;
            }

        }

        return collect($data);
    }

}