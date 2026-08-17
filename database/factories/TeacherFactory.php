<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'registration_number' => fake()->unique()->numerify('2026#####'),
            'cpf' => fake()->unique()->numerify('###########'),
            'specialization' => fake()->randomElement([
                'Matemática',
                'Língua Portuguesa',
                'História',
                'Geografia',
                'Ciências',
                'Biologia',
                'Física',
                'Química',
                'Educação Física',
                'Pedagogia',
            ]),
            'status' => fake()->randomElement(['active', 'inactive', 'blocked']),
        ];
    }
}
