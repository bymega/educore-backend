<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
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
            'birth_date' => fake()->dateTimeBetween('-22 years', '-6 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'cpf' => fake()->unique()->numerify('###########'),
            'address' => fake()->address(),
            'status' => fake()->randomElement(['active', 'inactive', 'blocked']),
        ];
    }
}
