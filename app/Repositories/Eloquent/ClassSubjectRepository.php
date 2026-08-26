<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassSubject;
use App\Models\SchoolClass;
use App\Repositories\Interface\ClassSubjectRepositoryInterface;

class ClassSubjectRepository implements ClassSubjectRepositoryInterface
{
  public function __construct(
    private readonly ClassSubject $entity
  ) {}

  public function assign(array $data): ClassSubject
  {
    return $this->entity::create($data);
  }
}
