<?php

namespace App\Modules\Users\UserManagement\Infrastructure\Repositories;

use App\Modules\Kernel\BaseRepository\Infrastructure\Repository\BaseRepository;
use App\Modules\Users\UserManagement\Domain\Repositories\UserProfileRepositoryContract;
use App\Modules\Users\UserManagement\Infrastructure\Mappers\UserProfileMapper;
use App\Modules\Users\UserManagement\Infrastructure\Models\UserProfile;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryContract {
    
    function __construct(
        protected UserProfile $user_profile_model,
        protected UserProfileMapper $user_profile_mapper
    ) {}
    
}