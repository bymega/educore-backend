<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'workload',
        'status',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function classSubjects(): HasMany
    {
        return $this->hasMany(ClassSubject::class);
    }
}
