<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Term extends Model
{

    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'school_year_id',
        'name',
        'number',
        'start_date',
        'end_date',
        'status'
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
