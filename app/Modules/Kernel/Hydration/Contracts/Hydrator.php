<?php

namespace App\Modules\Kernel\Hydration\Contracts;

use Illuminate\Support\Collection;

interface Hydrator
{
    public function hydrate(object $object, array $rules = []): Collection;
}