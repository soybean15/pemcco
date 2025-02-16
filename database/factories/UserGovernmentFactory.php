<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserGovernment>
 */
class UserGovernmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tin' => fake()->numerify('#########'), // 9-digit TIN
            'sss' => fake()->numerify('##########'), // 10-digit SSS
            'philhealth' => fake()->numerify('############'), // 12-digit PhilHealth
            'pagibig' => fake()->numerify('############'), // 12-digit Pag-IBIG
        ];

    }
}
