<?php

namespace App\Modules\Users\UserManagement\Application\Services\BasicInformation;

use App\Modules\Kernel\Hydration\Contracts\Hydrator;
use App\Modules\Users\UserManagement\Application\Contracts\BasicInformation\UserProfileServiceContact;
use App\Modules\Users\UserManagement\Application\DTOs\BasicInformation\UserProfileDTO;
use App\Modules\Users\UserManagement\Domain\Entities\UserProfileEntity;
use App\Modules\Users\UserManagement\Domain\Repositories\UserProfileRepositoryContract;
use Illuminate\Support\Facades\DB;

class UserProfileService implements UserProfileServiceContact {
    function __construct(
        protected UserProfileRepositoryContract $user_profile_repository,
        protected Hydrator $hydrator
    ){}

    public function registerNewUserProfile(UserProfileDTO $user_profile_dto, string $email_address): UserProfileEntity {
        DB::beginTransaction();
        $user_profile_dto = $this->hydrator->hydrate($user_profile_dto);
        $user_profile = $this->user_profile_repository->create($user_profile_dto->toArray());

        // Perform creation of new account -- To be implemented once the feature it already created.
        
        DB::commit();
        
        return $user_profile;
    }

    public function updateUserProfile(int $user_profile_id, UserProfileDTO $user_profile_dto): UserProfileEntity {
        $user_profile_dto = $this->hydrator->hydrate($user_profile_dto);
        return $this->user_profile_repository->update($user_profile_id, $user_profile_dto->toArray());
    }

    public function deleteUserProfile(int $user_profile_id): bool {
        return $this->user_profile_repository->delete($user_profile_id);
    }
}