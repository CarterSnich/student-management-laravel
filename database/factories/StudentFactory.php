<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
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
        $faker = Faker::create();
        return [
            'student_id' => $faker->unique(true)->numerify('#######'),
            'firstname' => $faker->firstName(),
            'lastname' => $faker->lastName(),
            'middlename' => $faker->boolean() ? $faker->lastName() : '',
            'birthdate' => $faker->date(),
            'section_id' => $faker->numberBetween(1, 3),
            'created_at' => $faker->date()
        ];
    }
}
