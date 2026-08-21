<?php

namespace App\Repositories\Eloquent;

use App\Models\Term;
use App\Repositories\Interface\TermRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TermRepository implements TermRepositoryInterface
{
  public function __construct(private readonly Term $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery()->with('schoolYear');

    if (! empty($data['name'])) {
      $name = mb_strtoupper($data['name']);
      $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->paginate($perPage);
  }

  public function create(array $data): Term
  {
    return $this->entity::create($data);
  }

  public function update(Term $entity, array $data): bool
  {
    return $entity->update($data);
  }

  public function findByUuid(string $uuid): ?Term
  {
    return $this->entity::withTrashed()->where('uuid', $uuid)->first();
  }

  public function delete(Term $entity): bool
  {
    return $entity->delete();
  }

  public function restore(Term $entity): bool
  {
    return $entity->restore();
  }
}
