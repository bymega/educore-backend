<?php

namespace App\Services;

use App\Repositories\Interface\ClassLessonRepositoryInterface;

class ClassLessonService
{
  public function __construct(private readonly ClassLessonRepositoryInterface $repository) {}

  public function create(array $data)
  {
    return $this->repository->create($data);
  }
}
