<?php

namespace App\Modules\Users\UserManagement\Application\DTOs\BasicInformation;

use App\Modules\Kernel\Hydration\Enums\MissingField;

final readonly class UserProfileDTO {
    public function __construct(
        public int $id,
        public int $address_id,
        public string $first_name,
        public string $last_name,
        public ?string $avatar,
        public ?string $bio,
        public ?string $job_title
    ) {}
}