<?php

namespace App\Modules\Users\UserManagement\Infrastructure\Mappers;

use App\Modules\Kernel\BaseRepository\Infrastructure\Mappers\RepositoryMapper;
use App\Modules\Users\UserManagement\Domain\Entities\UserProfileEntity;
use App\Modules\Users\UserManagement\Domain\EntitySets\UserProfileEntitySet;

class UserProfileMapper extends RepositoryMapper {

    public function toDomainEntity(object $model): UserProfileEntity {

        return new UserProfileEntity(
            id: $model->id,
            address_id: $model->address_id,
            first_name: $model->first_name,
            last_name: $model->last_name,
            avatar: $model->avatar ?? null,
            bio: $model->bio ?? null,
            job_title: $model->job_title ?? null
        );

    }
    public function ToDomainEntitySet(object $models): UserProfileEntitySet {
        $items = [];
        foreach ($models as $model) {
            $items[] = $this->toDomainEntity($model);
        }
        return new UserProfileEntitySet(
            items: $items
        );
    }

}