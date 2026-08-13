<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'email',
        'status',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)
            ->withPivot(['relationship', 'is_primary'])
            ->withTimestamps();
    }
}
