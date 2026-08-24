<?php

namespace App\Repositories\Interface;

use App\Models\SchoolClass;

interface SchoolClassRepositoryInterface
{
  public function create(array $data): SchoolClass;

  public function update(SchoolClass $entity, array $data): bool;

  public function findByUuid(string $uuid): ?SchoolClass;
}
