<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{

  public function __construct(private readonly User $entity) {}

  public function getAll(array $data): LengthAwarePaginator
  {
    $query = $this->entity->newQuery()->with(['roles', 'permissions']);

    if (!empty($data['name'])) {
      $name = mb_strtoupper($data['name']);

      $query->whereRaw('UPPER(name) LIKE ?', ["%{$name}%"]);
    }

    $perPage = $data['per_page'] ?? 10;

    return $query
      ->orderBy('created_at', 'desc')
      ->withTrashed()
      ->paginate($perPage);
  }

  public function store(array $data): User
  {
    return $this->entity::create($data);
  }
}
