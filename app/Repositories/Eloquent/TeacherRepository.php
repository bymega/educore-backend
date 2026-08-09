<?php

namespace App\Repositories\Eloquent;

use App\Models\Teacher;
use App\Repositories\Interface\TeacherRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TeacherRepository implements TeacherRepositoryInterface
{

  public function __construct(private readonly Teacher $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery()->with('user');

    if (!empty($data['name'])) {
      $name = mb_strtoupper($data['name']);
      $query->whereHas('user', function ($query) use ($name) {
        $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
      });
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): Teacher
  {
    return $this->entity::create($data);
  }

  public function update(Teacher $entity, array $data)
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?Teacher
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function delete(Teacher $entity): bool
  {
    return $entity->delete();
  }

  public function restore(Teacher $entity): bool
  {
    return $entity->restore();
  }
}
