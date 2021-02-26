<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(150),
            'cover' => '300x500.png',
            'price' => rand(100,300),
            'discount' => rand(0,2),
            'user_id' => rand(1,10),
            'status' => rand(0,1)
        ];
    }
}
