<?php

namespace App\Repositories\Interface;

use App\Models\Assessment;

interface AssessmentRepositoryInterface
{
  public function create(array $data): Assessment;
}
