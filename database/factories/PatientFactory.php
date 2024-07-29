<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'gender'=>fake()->randomElement(['m', 'f']),
            'dateOfBirth'=>fake()->date(),
            'phonenumber'=> fake()->phoneNumber(),
            'NIN'=>fake()->text(),
            'marital'=>fake()->randomElement(['1', '2', '3']),
            'nextOfkin'=>fake()->name(),
            'kincontactNumber'=>fake()->phoneNumber(),
            'Relationship'=>fake()->randomElement(['mother', 'father', 'sister', 'brother'])
        ];
    }
}
