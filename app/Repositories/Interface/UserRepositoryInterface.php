<?php

namespace App\Repositories\Interface;

use App\Models\User;

interface UserRepositoryInterface
{
  public function getAll(array $data);

  public function store(array $data): User;

  public function update(User $entity, array $data);

  public function findByUuid(string $uuid): ?User;
}
