<?php

namespace App\Repositories\Interface;

use Illuminate\Database\Eloquent\Collection;

interface EducationLevelRepositoryInterface
{
  public function getAll(): Collection;
}
