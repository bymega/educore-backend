<?php

namespace App\Repositories\Interface;

use App\Models\User;

interface UserRepositoryInterface
{
  public function getAll(array $data);

  public function store(array $data): User;
}
