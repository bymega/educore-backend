<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassSubject;
use App\Models\SchoolClass;
use App\Repositories\Interface\ClassSubjectRepositoryInterface;

class ClassSubjectRepository implements ClassSubjectRepositoryInterface
{
  public function __construct(
    private readonly ClassSubject $entity
  ) {}

  public function assign(array $data): ClassSubject
  {
    return $this->entity::create($data);
  }

  public function findByUuidAndClassUuid(string $uuid, string $classUuid): ?ClassSubject
  {
    return $this->entity::withTrashed()
      ->where('uuid', $uuid)
      ->whereHas('schoolClass', function ($query) use ($classUuid) {
        $query->where('uuid', $classUuid);
      })
      ->first();
  }

  public function update(ClassSubject $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function delete(ClassSubject $entity): bool
  {
    return $entity->delete();
  }

  public function restore(ClassSubject $entity): bool
  {
    return $entity->restore();
  }
}
