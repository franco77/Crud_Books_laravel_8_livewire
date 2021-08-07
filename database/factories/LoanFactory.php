<?php

namespace Database\Factories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition()
    {
        return [
			'id_customer' => $this->faker->name,
			'id_book' => $this->faker->name,
			'loan_date' => $this->faker->name,
			'notes' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
