<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

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

  public function update(string $uuid, array $data): ?User
  {
    return DB::transaction(function () use ($uuid, $data) {
      $user = $this->repository->findByUuid($uuid);

      if (!$user) {
        throw  new NotFoundResourceException('Usuário não encontrado.');
      }

      if (isset($data['role'])) {
        $role = $data['role'];
        unset($data['role']);
        $user->syncRoles([$role]);
      }

      $this->repository->update($user, $data);

      return $user;
    });
  }
}
