<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasUuids, SoftDeletes;

    public $fillable = [
        'class_lesson_id',
        'enrollment_id',
        'status'
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function classLesson(): BelongsTo
    {
        return $this->belongsTo(ClassLesson::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
