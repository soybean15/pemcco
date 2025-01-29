<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMembership>
 */
class UserMembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'membership_id' => fake()->uuid(),
            'membership_date' => fake()->date(),
            'membership_type' => fake()->randomElement(['Regular', 'Gold', 'Platinum']),
            'status' => fake()->randomElement(['Active', 'Inactive', 'Suspended']),
        ];
    }
}
