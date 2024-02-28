<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserStreet>
 */
class UserStreetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName(),
            'street_nr' => $this->faker->buildingNumber(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
        ];
    }
}
