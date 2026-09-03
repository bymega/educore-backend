<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentGrade extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    public $fillable = [
        'assessment_id',
        'enrollment_id',
        'score',
        'observation',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
