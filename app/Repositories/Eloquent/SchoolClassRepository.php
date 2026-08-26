<?php

namespace App\Repositories\Eloquent;

use App\Models\SchoolClass;
use App\Repositories\Interface\SchoolClassRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SchoolClassRepository implements SchoolClassRepositoryInterface
{
  public function __construct(private readonly SchoolClass $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery()->with('schoolYear', 'gradeLevel.educationLevel');

    if (! empty($data['name'])) {
      $name = mb_strtoupper($data['name']);
      $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
    }

    if (! empty($data['code'])) {
      $code = mb_strtoupper($data['code']);
      $query->whereRaw('UPPER(code) LIKE ?', ["%{$code}%"]);
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

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

  public function delete(SchoolClass $entity): bool
  {
    return $entity->delete();
  }

  public function restore(SchoolClass $entity): bool
  {
    return $entity->restore();
  }
}
