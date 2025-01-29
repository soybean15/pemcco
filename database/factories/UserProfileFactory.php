<?php

namespace Database\Factories;

use App\Models\Occupation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
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
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->randomElement([fake()->firstName(), null]),
            'last_name' => fake()->lastName(),
            'phone_number' => fake()->phoneNumber(),
            'telephone_number' => fake()->randomElement([fake()->phoneNumber(), null]),
            'address' => fake()->address(),
            'birth_date' => fake()->date(),
            'religion' => fake()->randomElement(['Christian', 'Muslim', 'None', 'Others']),
            'civil_status' => fake()->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'occupation_id' => Occupation::factory(),
            'social_affiliation' => fake()->randomElement(['None', 'Union', 'NGO', 'Others']),
            'monthly_income' => fake()->randomFloat(2, 10000, 100000),
            'annual_income' => fake()->randomFloat(2, 120000, 1200000),
        ];
    }
}
