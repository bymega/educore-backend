<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermResult extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'enrollment_id',
        'class_subject_id',
        'term_id',
        'average',
        'recovery_score',
        'final_term_average',
        'status',
        'observation',
    ];

    protected function casts(): array
    {
        return [
            'average' => 'decimal:2',
            'recovery_score' => 'decimal:2',
            'final_term_average' => 'decimal:2',
        ];
    }

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class);
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }
}
