<?php

namespace App\Repositories\Interface;

use App\Models\ClassLesson;

interface ClassLessonRepositoryInterface
{
  public function create(array $date): ClassLesson;
}
