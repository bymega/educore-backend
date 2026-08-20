<?php

namespace App\Repositories\Interface;

use App\Models\Term;

interface TermRepositoryInterface
{
    public function create(array $data): Term;
}
