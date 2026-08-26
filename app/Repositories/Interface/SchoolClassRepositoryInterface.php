<?php

namespace App\Repositories\Interface;

use App\Models\SchoolClass;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SchoolClassRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): SchoolClass;

  public function update(SchoolClass $entity, array $data): bool;

  public function findByUuid(string $uuid): ?SchoolClass;

  public function delete(SchoolClass $entity): bool;

  public function restore(SchoolClass $entity): bool;
}
