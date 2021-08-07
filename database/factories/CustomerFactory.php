<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
			'first_name' => $this->faker->name,
			'last_name' => $this->faker->name,
			'email' => $this->faker->name,
			'phone' => $this->faker->name,
			'address' => $this->faker->name,
			'gender' => $this->faker->name,
			'profile' => $this->faker->name,
        ];
    }
}
