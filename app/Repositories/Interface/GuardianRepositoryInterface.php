<?php

namespace App\Repositories\Interface;

use App\Models\Guardian;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuardianRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;

  public function findByUuid(string $uuid): ?Guardian;

  public function update(Guardian $entity, array $data): bool;
}
