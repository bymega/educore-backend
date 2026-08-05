<?php

namespace App\Repositories\Interface;

use App\Models\User;

interface AuthRepositoryInterface
{
  public function findByEmail(string $email): ?User;

  public function createToken(User $user): string;
}
