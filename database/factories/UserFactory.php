<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_info_id' => $this->faker->numberBetween(1,1),
            'username' => $this->faker->name(),
            'password' => '12345', // password
            'user_type' => $this->faker->numberBetween(1,1),
            'status' => $this->faker->numberBetween(1,1),
        ];
    }
}
