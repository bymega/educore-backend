<?php

namespace App\Repositories\Eloquent;

use App\Models\Subject;
use App\Repositories\Interface\SubjectRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SubjectRepository implements SubjectRepositoryInterface
{
  public function __construct(private readonly Subject $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery();

    if (!empty($data['name'])) {
      $name = mb_strtoupper($data['name']);
      $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
    }

    if (!empty($data['code'])) {
      $code = mb_strtoupper($data['code']);
      $query->whereRaw('UPPER(code) LIKE ?', ["%{$code}%"]);
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

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
