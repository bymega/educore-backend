<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassSubjectTeacher;
use App\Repositories\Interface\ClassSubjectTeacherRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClassSubjectTeacherRepository implements ClassSubjectTeacherRepositoryInterface
{
  public function __construct(private readonly ClassSubjectTeacher $entity) {}

  public function getAll(string $classUuid, array $data): LengthAwarePaginator
  {
    $query = $this->entity
      ->newQuery()
      ->with(
        'teacher.user',
        'classSubject.subject',
      )
      ->whereHas('classSubject', function ($query) use ($classUuid) {
        $query->where('uuid', $classUuid);
      });

    if (!empty($data['name'])) {
      $name = mb_strtoupper($data['name']);

      $query->whereHas(
        'teacher.user',
        function ($query) use ($name) {
          $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
        }
      );
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function assign(array $data): ClassSubjectTeacher
  {
    return $this->entity::create($data);
  }

  public function findByUuidAndClassUuid(string $uuid, string $classUuid): ?ClassSubjectTeacher
  {
    return $this->entity::withTrashed()
      ->where('uuid', $uuid)
      ->whereHas('classSubject', function ($query) use ($classUuid) {
        $query->where('uuid', $classUuid);
      })
      ->first();
  }

  public function update(ClassSubjectTeacher $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function delete(ClassSubjectTeacher $entity): bool
  {
    return $entity->delete();
  }

  public function restore(ClassSubjectTeacher $entity): bool
  {
    return $entity->restore();
  }
}
