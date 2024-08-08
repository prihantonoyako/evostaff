<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'id' => (string) Str::uuid(),
            'user_id' => $this->faker->optional()->uuid(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->optional()->lastName,
            'photo' => $this->faker->optional()->imageUrl(),
            'address' => $this->faker->optional()->address,
        ];
    }
}
