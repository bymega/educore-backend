<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolYear::query()->updateOrCreate(
            ['name' => '2026'],
            [
                'start_date' => '2026-02-12',
                'end_date' => '2026-12-18',
                'status' => 'active',
            ],
        );
    }
}
