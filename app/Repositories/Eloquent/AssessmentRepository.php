<?php

namespace App\Repositories\Eloquent;

use App\Models\Assessment;
use App\Repositories\Interface\AssessmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AssessmentRepository implements AssessmentRepositoryInterface
{
  public function __construct(private readonly Assessment $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity
      ->newQuery()
      ->with(['classSubject.subject', 'term']);

    if (!empty($data['name'])) {
      $name = mb_strtoupper($data['name']);
      $query->whereRaw(
        'UPPER(name) LIKE ?',
        ["%{$name}%"]
      );
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): Assessment
  {
    return $this->entity::create($data);
  }

  public function update(Assessment $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?Assessment
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function delete(Assessment $entity): bool
  {
    return $entity->delete();
  }

  public function restore(Assessment $entity): bool
  {
    return $entity->restore();
  }
}
