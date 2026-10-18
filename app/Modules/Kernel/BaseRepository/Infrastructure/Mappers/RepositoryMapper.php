<?php

namespace App\Modules\Kernel\BaseRepository\Infrastructure\Mappers;

abstract class RepositoryMapper {
    
    public abstract function toDomainEntity(object $model): object;
    public abstract function ToDomainEntitySet(object $models): object;

}