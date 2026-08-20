<?php

namespace App\Repositories\Eloquent;

use App\Models\Term;
use App\Repositories\Interface\TermRepositoryInterface;

class TermRepository implements TermRepositoryInterface
{
  public function __construct(private readonly Term $entity) {}


  public function create(array $data): Term
  {
    return $this->entity::create($data);
  }
}
