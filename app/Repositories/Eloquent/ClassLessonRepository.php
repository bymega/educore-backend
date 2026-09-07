<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassLesson;
use App\Repositories\Interface\ClassLessonRepositoryInterface;

class ClassLessonRepository implements ClassLessonRepositoryInterface
{
  public function __construct(private readonly ClassLesson $entity) {}

  public function create(array $data): ClassLesson
  {
    return $this->entity->create($data);
  }
}
