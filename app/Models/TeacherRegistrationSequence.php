<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeacherRegistrationSequence extends Model
{
    protected $fillable = ['year', 'last_number'];

    public $timestamps = false;

    public static function generate(): string
    {
        $year = (int) now()->format('Y');

        // A transação e o bloqueio da linha evitam números repetidos.
        DB::table('teacher_registration_sequences')->insertOrIgnore([
            'year' => $year,
            'last_number' => 0,
        ]);

        $sequence = self::query()
            ->where('year', $year)
            ->lockForUpdate()
            ->firstOrFail();

        $sequence->increment('last_number');

        return sprintf('TCH%d%04d', $year, $sequence->last_number);
    }
}
