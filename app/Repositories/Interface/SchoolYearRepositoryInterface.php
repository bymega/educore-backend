<?php

namespace App\Repositories\Interface;

use App\Models\SchoolYear;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SchoolYearRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function create(array $data): SchoolYear;

  public function update(SchoolYear $entity, array $data): bool;

  public function findByUuid(string $uuid): ?SchoolYear;

  public function delete(SchoolYear $entity): bool;

  public function restore(SchoolYear $entity): bool;
}
