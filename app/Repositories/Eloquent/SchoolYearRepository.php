<?php

namespace App\Repositories\Eloquent;

use App\Models\SchoolYear;
use App\Repositories\Interface\SchoolYearRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class SchoolYearRepository implements SchoolYearRepositoryInterface
{
  public function __construct(private readonly SchoolYear $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery();

    if (! empty($data['name'])) {
      $name = mb_strtoupper($data['name']);
      $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): SchoolYear
  {
    return $this->entity::create($data);
  }

  public function update(SchoolYear $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?SchoolYear
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function delete(SchoolYear $entity): bool
  {
    return $entity->delete();
  }

  public function restore(SchoolYear $entity): bool
  {
    return $entity->restore();
  }
}
