<?php

namespace App\Repositories\Interface;

use App\Models\ClassSubject;
use App\Models\SchoolClass;

interface ClassSubjectRepositoryInterface
{
  public function assign(array $data): ClassSubject;
}
