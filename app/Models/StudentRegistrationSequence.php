<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentRegistrationSequence extends Model
{
    protected $fillable = ['year', 'last_number'];

    public $timestamps = false;

    public static function generate(): string
    {
        $year = (int) now()->format('Y');

        // The caller must be inside a transaction. The unique year and row lock
        // serialize registrations, including simultaneous requests.
        DB::table('student_registration_sequences')->insertOrIgnore([
            'year' => $year,
            'last_number' => 0,
        ]);

        $sequence = self::query()
            ->where('year', $year)
            ->lockForUpdate()
            ->firstOrFail();

        $sequence->increment('last_number');

        return sprintf('STD%d%04d', $year, $sequence->last_number);
    }
}
