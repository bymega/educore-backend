<?php

namespace App\Repositories\Eloquent;

use App\Models\Assessment;
use App\Repositories\Interface\AssessmentRepositoryInterface;

class AssessmentRepository implements AssessmentRepositoryInterface
{
  public function __construct(private readonly Assessment $entity) {}

  public function create(array $data): Assessment
  {
    return $this->entity::create($data);
  }
}
