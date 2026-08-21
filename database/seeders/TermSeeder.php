<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $terms = [
            [
                'school_year_id' => 1,
                'name' => '1º Bimestre',
                'number' => 1,
                'start_date' => '2026-02-12',
                'end_date' => '2026-04-15',
                'status' => 'completed',
            ],
            [
                'school_year_id' => 2,
                'name' => '2º Bimestre',
                'number' => 2,
                'start_date' => '2026-04-16',
                'end_date' => '2026-06-16',
                'status' => 'completed',
            ],
            [
                'school_year_id' => 3,
                'name' => '3º Bimestre',
                'number' => 3,
                'start_date' => '2026-06-18',
                'end_date' => '2026-08-21',
                'status' => 'active',
            ],
        ];

        foreach ($terms as $term) {
            Term::query()->updateOrCreate(
                [
                    'school_year_id' => $term['school_year_id'],
                    'number' => $term['number'],
                ],
                $term,
            );
        }
    }
}
