<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
			'code' => $this->faker->name,
			'name' => $this->faker->name,
			'image' => $this->faker->name,
			'author' => $this->faker->name,
			'price' => $this->faker->name,
			'year' => $this->faker->name,
			'description' => $this->faker->name,
			'n_pages' => $this->faker->name,
			'format_b' => $this->faker->name,
			'editorial' => $this->faker->name,
        ];
    }
}
