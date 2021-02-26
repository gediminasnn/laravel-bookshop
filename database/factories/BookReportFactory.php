<?php

namespace Database\Factories;

use App\Models\BookReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'book_id' => rand(1,50),
            'report' => $this->faker->text(100)
        ];
    }
}
