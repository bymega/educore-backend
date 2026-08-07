<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\DB;

class UserService
{
  public function __construct(private readonly UserRepositoryInterface $repository) {}

  public function index(array $data)
  {
    return $this->repository->getAll($data);
  }

  public function store(array $data): User
  {
    return DB::transaction(function () use ($data) {
      $role = $data['role'];
      unset($data['role']);

      $user = $this->repository->store($data);
      $user->assignRole($role);

      return $user;
    });
  }
}
