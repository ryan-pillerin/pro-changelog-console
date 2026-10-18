<?php

namespace App\Modules\Users\UserManagement\Domain\EntitySets;

use App\Modules\Users\UserManagement\Domain\Entities\UserProfileEntity;

final readonly class UserProfileEntitySet
{
    /**
     * @param UserProfileEntity[] $items
     */
    public function __construct(
        public array $items 
    ) { }
}