<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\Interface\StudentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentRepository implements StudentRepositoryInterface
{

  public function __construct(private readonly Student $entity) {}

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
}
