<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserInfoFactory extends Factory
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
            'last_name' => fake()->lastname(),
            'first_name' => fake()->firstname(),
            'tel' => fake()->phoneNumber(),
            'postal_code' => fake()->postcode(),
            'pref' => fake()->prefecture(),
            'city' => fake()->city(),
            'town' => fake()->streetAddress(),
            'building' => fake()->secondaryAddress()
        ];
    }
}
