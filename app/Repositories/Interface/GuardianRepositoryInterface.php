<?php

namespace App\Repositories\Interface;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuardianRepositoryInterface
{
  public function getAll(array $data): LengthAwarePaginator;
}
