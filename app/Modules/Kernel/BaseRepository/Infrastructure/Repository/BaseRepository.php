<?php

namespace App\Modules\Kernel\BaseRepository\Infrastructure\Repository;

use App\Modules\Kernel\BaseRepository\Domain\Repository\BaseRepositoryContract;
use App\Modules\Kernel\BaseRepository\Infrastructure\Mappers\RepositoryMapper;
use Illuminate\Database\Eloquent\Model;

/**
 * This class serves as a base repository and can only be extended by other repositories. 
 * It provides basic CUD operations that can be used by any repository that extends it.
 * The class uses a model and a mapper to perform the operations and map the results to domain entities.
 */
class BaseRepository implements BaseRepositoryContract {
    public function __construct(
        protected Model $model, 
        protected RepositoryMapper $mapper
    ) {}

    public function create(array $data): object {
        $model = $this->model->create($data);
        return $this->mapper->toDomainEntity($model);
    }

    public function update(int $id, array $data): ?object {
        $model = $this->model->where('id', $id)->first();
        if ( !$model ) {
            return null;
        }
        $model->update($data);
        return $this->mapper->toDomainEntity($model);
    }

    public function delete(int $id): bool {
        $model = $this->model->where('id', $id)->first();
        if ( !$model ) {
            return false;
        }
        return $model->delete();
    }
}