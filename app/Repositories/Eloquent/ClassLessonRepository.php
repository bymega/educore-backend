<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassLesson;
use App\Repositories\Interface\ClassLessonRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClassLessonRepository implements ClassLessonRepositoryInterface
{
  public function __construct(private readonly ClassLesson $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity
      ->newQuery()
      ->with('classSubject.subject');

    if (! empty($data['class_subject'])) {
      $classSubject = mb_strtoupper($data['class_subject']);

      $query->whereHas('classSubject.subject', function ($query) use ($classSubject) {
        $query->whereRaw(
          'UPPER(name) LIKE ?',
          ["%{$classSubject}%"]
        );
      });
    }

    if (! empty($data['content'])) {
      $content = mb_strtoupper($data['content']);

      $query->whereRaw(
        'UPPER(content) LIKE ?',
        ["%{$content}%"]
      );
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): ClassLesson
  {
    return $this->entity->create($data);
  }

  public function update(ClassLesson $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?ClassLesson
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function delete(ClassLesson $entity): bool
  {
    return $entity->delete();
  }

  public function restore(ClassLesson $entity): bool
  {
    return $entity->restore();
  }
}
