<?php

namespace App\Modules\Users\UserManagement\Domain\Entities;

final readonly class UserProfileEntity
{
    public function __construct(
        public int $id,
        public int $address_id,
        public string $first_name,
        public string $last_name,
        public ?string $avatar,
        public ?string $bio,
        public ?string $job_title
    ) { }
}