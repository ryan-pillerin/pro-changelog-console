<?php

namespace App\Modules\Kernel\BaseRepository\Domain\Repository;

interface BaseRepositoryContract {
    public function create(array $data): object;
    public function update(int $id, array $data): ?object;
    public function delete(int $id): bool;
}