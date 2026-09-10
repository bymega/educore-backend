<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassLesson extends Model
{
    use HasUuids, SoftDeletes;

    public $fillable = [
        'class_subject_id',
        'lesson_date',
        'content',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class);
    }
}
