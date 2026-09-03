<?php

namespace App\Repositories\Interface;

use App\Models\StudentGrade;

interface StudentGradeRepositoryInterface
{
  public function create(array $data): StudentGrade;
}
