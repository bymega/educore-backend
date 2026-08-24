<?php

namespace App\Repositories\Eloquent;

use App\Models\Subject;
use App\Repositories\Interface\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{
  public function __construct(private readonly Subject $entity) {}

  public function create(array $data): Subject
  {
    return $this->entity::create($data);
  }

  public function update(Subject $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?Subject
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }
}
