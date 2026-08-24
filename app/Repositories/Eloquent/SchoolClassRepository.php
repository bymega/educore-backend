<?php

namespace App\Repositories\Eloquent;

use App\Models\SchoolClass;
use App\Repositories\Interface\SchoolClassRepositoryInterface;

class SchoolClassRepository implements SchoolClassRepositoryInterface
{
  public function __construct(private readonly SchoolClass $entity) {}

  public function create(array $data): SchoolClass
  {
    return $this->entity::create($data);
  }

  public function update(SchoolClass $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?SchoolClass
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }
}
