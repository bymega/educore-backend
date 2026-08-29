<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassSubject;
use App\Repositories\Interface\ClassSubjectRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class ClassSubjectRepository implements ClassSubjectRepositoryInterface
{
  public function __construct(
    private readonly ClassSubject $entity
  ) {}

  public function getAll(string $classUuid, array $data): LengthAwarePaginator
  {
    $query = $this->entity
      ->newQuery()
      ->with('subject')
      ->whereHas('schoolClass', function ($query) use ($classUuid) {
        $query->where('uuid', $classUuid);
      });

    if (!empty($data['status'])) {
      $query->where('status', $data['status']);
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function assign(array $data): ClassSubject
  {
    return $this->entity::create($data);
  }

  public function findByUuid(string $uuid): ?ClassSubject
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
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
