<?php

namespace App\Modules\Users\UserManagement\Application\Contracts\BasicInformation;

use App\Modules\Users\UserManagement\Application\DTOs\BasicInformation\UserProfileDTO;
use App\Modules\Users\UserManagement\Domain\Entities\UserProfileEntity;

interface UserProfileServiceContact {
    public function registerNewUserProfile(UserProfileDTO $user_profile_dto, string $email_address): UserProfileEntity;
    public function updateUserProfile(int $user_profile_id, UserProfileDTO $user_profile_dto): UserProfileEntity;
    public function deleteUserProfile(int $user_profile_id): bool;
}