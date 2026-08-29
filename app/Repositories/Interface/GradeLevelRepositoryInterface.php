<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Collection;

interface GradeLevelRepositoryInterface
{
  public function getAll(): Collection;
}
