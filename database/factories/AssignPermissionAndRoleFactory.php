<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssignPermissionAndRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assign_role' => $this->faker->numberBetween(2,2),
            'assign_permission' => $this->faker->numberBetween(1,1),
        ];
    }
}
