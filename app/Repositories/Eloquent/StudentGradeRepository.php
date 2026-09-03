<?php

namespace App\Repositories\Eloquent;

use App\Models\StudentGrade;
use App\Repositories\Interface\StudentGradeRepositoryInterface;

class StudentGradeRepository implements StudentGradeRepositoryInterface
{
  public function __construct(private readonly StudentGrade $entity) {}

  public function create(array $data): StudentGrade
  {
    return $this->entity->create($data);
  }
}
